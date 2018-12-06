<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Validation\ValidatesRequests;
use App\Survey;
use Illuminate\Http\UploadedFile;
use DB;

class SurveyController extends Controller
{
    // 설문 작성은 로그인 회원만 볼 수 있도록 하기 위해 auth 추가.
    public function __construct() {
        $this->middleware('auth', ['except' => ['whole_survey', 'on_survey', 'off_survey', 'make_survey']]);
    }


    public function whole_survey() {
        return view('surveyBoard.whole_survey');
    }

    public function on_survey() {
        return view('surveyBoard.on_survey');
    }

    public function off_survey() {
        return view('surveyBoard.off_survey');
    }

    public function make_survey() {
        return view('surveyBoard.make_survey');
    }

    public function create_survey_form() {
        return view('surveyBoard.create_survey_form');
    }

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
        date_default_timezone_set("Asia/Seoul"); // 타임존 한국시간으로
        $end_date = $request->end_date;
        $start_date = $request->start_date;
        $regtime = date("Y-m-d H:i:s");          // 현재 date

        $start_date_target = strtotime($start_date);
        $end_date_target = strtotime($end_date);
        $regtime_ymd = date("Y-m-d");    // 비교를 위해 년월일만 가지는 것을 하나 더 만듬.

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
        // 먼저 end_date에 하루를 더하고 다시 날짜형식으로 바꿔준다.
        $end_date = date("Y-m-d", strtotime("$end_date +1 days"));
                
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


        $item_type = $request->item_type;
        // 체크하여 0과 1로 구분
        if($item_type == 'single') {
            // 단수 즉 radio
            $item_type = 0;
        } else if($item_type == 'plural') {
            // 복수 즉 checkbox 
            $item_type = 1;
        }

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

    public function surveyView(Request $request) {
        $id = 6;
        $list = DB::table('surveys')->where('survey_id', $id)->first();
        $item_list = $list->item_list;

        
        // 슬래쉬(/) 로 된 string을 배열로 나누어 저장한다.
        $item_list_arr = explode('/', $item_list);
        
        return view('surveyBoard.surveyView')->with('list', $list)->with('item_list', $item_list_arr);
    }
}
