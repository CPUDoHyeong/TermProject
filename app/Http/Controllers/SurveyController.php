<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Validation\ValidatesRequests;
use App\Survey;
use App\Answer;
use App\User;
use Illuminate\Http\UploadedFile;
use DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class SurveyController extends Controller
{
    // 설문 작성은 로그인 회원만 볼 수 있도록 하기 위해 auth 추가.
    public function __construct() {
        $this->middleware('auth', ['except' => ['whole_survey', 'search_survey', 'on_survey', 'off_survey', 'surveyView', 'result', 'page_ajax']]);
    }

    // 설문조사 목록을 보여주는 게시판
    public function whole_survey() {
        $survey_list = null;

        /**
         * DB에 있는 목록을 들고 온다
         * 게시 순서는 먼저 end_date로 종료일이 얼마남지 않은 것을 보여주고
         * 두번째로 start_date를 해서 시작일이 빠른순으로 보여준다.
         * 아직 시작되지 않은 설문(시작일이 현재시간보다 나중인 것)은 보여주지 않는다.
         */
        
        // 먼저 where 절로 start_date가 현재시간보다 크다면 뺸다.
        // $survey_list = DB::table('surveys')->where('start_date', '<=', Carbon::now())->orderBy('start_date')->orderBy('end_date')->get();

        $survey_list = Survey::where('start_date', '<=', Carbon::now())->orderBy('end_date')->orderBy('start_date')->paginate(6);

        return view('surveyBoard.whole_survey')->with('list', $survey_list);
    }

    // 설문조사 목록에서 페이지번호누르면 ajax로 처리하는 부분
    public function page_ajax(Request $request) {
        $survey_list = null;

        $survey_list = Survey::where('start_date', '<=', Carbon::now())->orderBy('end_date')->orderBy('start_date')->paginate(6);

        /**
         * return을 게시판을 보여주는 div에 줌으로써 그 div파일에서는
         * list를 보여준다. 그리고 jqeury는 그 화면 자체를 기존의
         * 게시판 div에다가 넣어주면 되는 것이다.
         */
        return view('surveyBoard.ajax_return')->with('list', $survey_list);
    }

    // 검색버튼 눌렀을 때 ajax처리
    public function search_survey(Request $request) {
        $list = null;

        // 넘어온 값 받기
        $thema = $request->thema;           // 분류
        $search_val = $request->search_val; // 검색 값

        if($thema) {
            
            $list = Survey::where('start_date', '<=', Carbon::now())->where('thema', '=', $thema)->where('title', 'Like', '%'. $search_val .'%')->orderBy('end_date')->orderBy('start_date')->paginate(6);
        } else {

            // 분류 값이 없으면 where에서 제외
            $list = Survey::where('start_date', '<=', Carbon::now())->where('title', 'Like', '%'. $search_val .'%')->orderBy('end_date')->orderBy('start_date')->paginate(6);
        }

        // 이것도 마찬가지 게시판을 보여주는 div 템플릿에다가 list를 준다.
        return view('surveyBoard.ajax_return')->with('list', $list);
    }

    // 진행중인 설문조사
    public function on_survey() {
        $survey_list = null;

        $survey_list = Survey::where('start_date', '<=', Carbon::now())->where('end_date', ">=", Carbon::now())->orderBy('end_date')->orderBy('start_date')->paginate(6);

        return view('surveyBoard.on_survey')->with('list', $survey_list);
    }

    // 종료된 설문조사
    public function off_survey() {
        $survey_list = null;

        $survey_list = Survey::where('end_date', '<', Carbon::now())->orderBy('start_date')->orderBy('end_date')->paginate(6);

        return view('surveyBoard.off_survey')->with('list', $survey_list);
    }

    // 내가 작성한 설문조사를 보여준다.
    public function my_survey() {
        $survey_list = null;
        $user_email = Auth::user()->email; // 현재 접속 유저 이메일 가지고온다.

        // 예정인 것도 여기서는 보여준다.
        $survey_list = Survey::where('reg_user', '=' ,$user_email)->orderBy('end_date')->orderBy('start_date')->paginate(6);

        return view('surveyBoard.my_survey')->with('list', $survey_list);
    }

    // 설문조사 작성 페이지
    public function create_survey_form() {
        return view('surveyBoard.create_survey_form');
    }

    // 설문조사 작성 처리
    public function create_survey(Request $request) {

        // 라라벨 유효성 검사
        // bail은 해당 입력이 유효성 검사에 통과하지 못하면
        // break 거는 것과 같다.
        $rules = [
            'thema' => 'bail|required',
            'title' => 'bail|required|max:100',
            'start_date' => 'bail|required',
            'end_date' => 'bail|required',
            'point' => 'bail|required|integer',
            'limit' => 'bail|required',
            'limit_count' => 'bail|required',
            'img_url' => 'bail|required',
            'item_type' => 'bail|required'
        ];
/*
        $validator = \Validator::make($request->all(), $rules);

        // fails는 유효성 검사를 통과하지 못하면 true를 반환한다.
        if($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
*/
        // 이 방법도 있음.
        $this->validate($request, $rules);
        
        $thema = $request->thema;
        $title = $request->title;
        /**
         * html 의 input date를 사용하면 오전 00시를 기준으로 가져온다.
         * 시작일은 그대로 사용하고
         * 종료일 같은 경우는 24:00 즉 다음날 00시로 끝나야 하므로
         * 종료일에다가 하루를 더 더해서 저장하여아한다
         * 그 때 사용하는 것이 strtotime 이라는 함수 
         * 시간을 비교 할때와 시간을 빼고 더할 때 사용한다.
         * 이 함수는 날짜 형식의 문자열을 1970년 1우러 1일 0시 부터 시작하는
         * 유닉스 타임스탬프로 변화시키는 함수이다.
         */
        $end_date = $request->end_date;
        $start_date = $request->start_date;
        $regtime = date("Y-m-d H:i:s");          // 현재 date

        $start_date_target = strtotime($start_date);
        $end_date_target = strtotime($end_date);
        $regtime_ymd = date("Y-m-d");            // 비교를 위해 년월일만 가지는 것을 하나 더 만듬.
        $regtime_target = strtotime($regtime_ymd);

        // $test = date("Y-m-d H:i:s", $start_date_target);
        // $test2 = date("Y-m-d H:i:s", $regtime_target);
        // $test3 = date("Y-m-d H:i:s", $end_date_target);

        // return $test . '/' . $test2;
        
        /**
         * 시작일과 종료일 체크.
         * 1. start_date와 end_date가 같을 경우
         * 2. start_date or end_date 둘 중 하나라도 현재 시간보다 과거일 경우
         * 3. start_date가 end_date보다 후일일 경우
         *    3-1. start_date와 end_date를 바꾼다.
         */
        if($start_date == $end_date) {
            // 1의 경우
            return back()->with('date_err', '시작일과 종료일이 같습니다')->withInput();
        
        } else if($start_date_target < $regtime_target || $end_date_target < $regtime_target) {
            // 2의 경우
            return back()->with('date_err', '현재시간보다 작을수는 없습니다')->withInput();

        } else if($start_date_target > $end_date_target) {
            // 3의 경우
            $temp = $end_date;
            $end_date = $start_date;
            $start_date = $temp;
        }

        // 체크가 됐으면 end date를 바꿔준다.
        // 위 과정을 거쳐야 확실한 end_date가 되므로 위 과정후에 한다.
        // 먼저 end_date에 23시간 59분을 더하고 다시 날짜형식으로 바꿔준다.
        $end_date = date("Y-m-d", strtotime("$end_date +23 hours +59 minutes"));
                
        $point = $request->point;
        // 포인트 체크
        if($point < 0) {
            $point = 0;
        }

        /**
         * limit_count는 사용자가 제한없음을 했는지 안했는지 확인한다.
        */
        $limit = $request->limit;
        if($limit == 'non_limit') {
            // 제한없음이 체크되어 있으면.
            $limit_count = -1;

        } else if($limit == 'entry') {
            // 직접입력으로 되어있는것도 0 미만인지 확인.
            $limit_count = $request->limit_count;   

            // 인원수 입력값이 0보다 작으면 return back 한다.
            if($limit_count <= 0) {
                return back()->with('limit_err', '올바른 인원수를 입력해주세요')->withInput();
            }
        }

        // 파일 저장하기.
        $file = $request->file('img_url');
        $taget_dir = 'uploads';
        // 파일을 이동시킨다. 원래의 이름으로
        $file->move($taget_dir, $file->getClientOriginalName());
        $img_url = $file->getClientOriginalName();

        // 사용자에 설문을 요청할때 답변을 단수로 받을 것인지 복수로 받을 것인지 정한다.
        $item_type = $request->item_type;
        // 체크하여 0과 1로 구분
        if($item_type == 'single') {
            // 단수 즉 radio
            $item_type = 0;

        } else if($item_type == 'plural') {
            // 복수 즉 checkbox
            $item_type = 1;
        }

        // 보기를 설정하는데 배열값을 string으로 바꾸기 위해 implode를 사용 그리고 /로 보기를 구분한다.
        $item_list = implode("/", $request->item);
        $reg_user = $request->email;
        
        // DB 삽입
        Survey::create([
            'thema' => $thema,
            'title' => $title,
            'start_date' => $start_date,
            'end_date' => $end_date,
            'regtime' => $regtime,
            'point' => $point,
            'limit_count' => $limit_count,
            'img_url' => $img_url,
            'item_type' => $item_type,
            'item_list' => $item_list,
            'reg_user' => $reg_user
        ]);

        return redirect()->route('surveyBoard.whole_survey')->with('msg', '정상적으로 등록 되었습니다.');
    }

    // 설문조사 게시글 상세보기.
    public function surveyView(Request $request) {
        $survey_id = $request->survey_id;

        $list = DB::table('surveys')->where('survey_id', $survey_id)->first();

        $item_list = $list->item_list;

        
        // 슬래쉬(/) 로 된 string을 배열로 나누어 저장한다.
        $item_list_arr = explode('/', $item_list);
        
        return view('surveyBoard.surveyView')->with('list', $list)->with('item_list', $item_list_arr);
    }

    // 사용자 설문조사 참여 처리
    public function join_survey(Request $request) {

        $survey_id = $request->survey_id;
        $answer = $request->answer;
        $point = $request->point;

        $list = DB::table('surveys')->where('survey_id', $survey_id)->first();

        // 기간이 지났으면 back
        if($list->end_date < Carbon::now()) {
            return back()->with('answer_err', '종료된 설문입니다.');
        }

        // 답변선택을 안했으면 back
        if(!$answer) {
            return back()->with('answer_err', '답을 체크해 주세요.')->withInput();
        }

        $user_answers = implode("/", $request->answer);
        $submit_date = date("Y-m-d H:i:s");
        $user_email = $request->email;


        // 이미 참여한 경우 back
        // survey_id로 answer data 를 가져오고 user_eamil컬럼에
        // 현재 답변 제출한 email과 중복되는 경우 return하면된다.
        $answers = DB::table('answers')->where('survey_id', '=', $survey_id)->where('user_email', '=', $user_email)->get();
        
        // DB에서 가져온 값이 있다면 back
        if(count($answers) != 0) {
            return back()->with('answer_err', '이미 설문에 참여하였습니다.');
        }

        // DB 삽입
        Answer::create([
            'survey_id' => $survey_id,
            'user_answers' => $user_answers,
            'submit_date' => $submit_date,
            'user_email' => $user_email
        ]);

        // 포인트 적립 -> user 테이블 update
        $user = DB::table('users')->where('email', '=', $user_email)->first();
        $add_point = $user->point + $point;
        DB::table('users')->where('email', $user_email)->update(['point' => $add_point]);
        
        return redirect('surveyView/'.$survey_id)->with('success_msg', '설문에 참여해 주셔서 감사합니다.\n'.$point.'포인트가 적립되었습니다.');
    }

    // 설문결과 보여주기
    public function result(Request $request) {
        $survey_id = $request->survey_id;

        // 먼저 survey_id로 surveys 테이블에서 원래의 목록을 가져온다.
        $list = DB::table('surveys')->where('survey_id', $survey_id)->first();

        // 답안 테이블에서 survey_id에 답변한 목록을 가져온다.
        $answers = DB::table('answers')->where('survey_id', $survey_id)->get();

        // 각각의 요소의 %를 구하기 위해 필요한 전체 답변의 수
        // 사용자 답변을 카운트할떄마다 하나씩 더한다.
        $answer_count = 0;
        
        // 보기들의 리스트를 가져온다.
        // 슬래쉬(/) 로 된 string을 배열로 나누어 저장한다.
        $item_list = explode('/', $list->item_list);
        
        // 각각의 아이템의 카운트를 지정하기 위해 연관배열로 만든다.
        $item_count_arr = array();
        foreach($item_list as $item) {
            $item_count_arr[$item] = 0;
        }

        // foreach($item_count_arr as $key => $value) {
        //     $item_count_arr[$key] = 1;
        // }
            
        /**
         * 이 temp array는 사용자가 답변한 것을 임시 저장해 놓는 배열이다.
         * 사용자 답안 컬럼에서 /(슬래쉬)를 기준으로 답변을 나누고 
         * 이 temp에 저장해 놓는다.
         * 그리고 그 temp를 반복하면서 사용자의 답변이
         * 선택지 항목들에 포함되는지 확인(array_key_exists)한다.
         * 포함된다면 그 포함된 값을 이용하여 item_count_arr의 그 항목을 +1한다.
         * 이런식으로 사용자가 답한 것을 모두 카운트 할 수 있다.
         * 또한 위에 언급하였듯이 사용자의 답변을 이때 카운트한다.
         */
        $temp = array();
        foreach($answers as $key => $answer) {
            if($key = 'user_answers') {
                $temp = explode('/', $answer->user_answers);
            }

            foreach($temp as $value) {
                if(array_key_exists($value, $item_count_arr)) {
                    $item_count_arr[$value] += 1;
                    $answer_count++;
                }
            }
        }

        // 위의 과정을 거쳤으면 answer_count값으로 각 항목들의 %를 구한다
        // 소수점 첫째자리까지 나타낸다.
        // 투표수가 0인 값은 게산하지 않고 넘어간다.
        // 이 과정을 거치면 item_count_arr 배열에는 %값들이 자리하게 된다.
        foreach($item_count_arr as $key => $value) {
            if($item_count_arr[$key] != 0) {
                $item_count_arr[$key] = round(($value / $answer_count) * 100, 1);
            }
        }
        

        return view('surveyBoard.result_survey')->with('list', $list)->with('item_list', $item_count_arr);
    }
}
