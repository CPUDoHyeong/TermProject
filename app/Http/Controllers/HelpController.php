<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Help;
use Illuminate\Support\Facades\Auth;

class HelpController extends Controller
{
    public function __construct() {

        // delete와 update에 대해서는 권한을 지정한다.
        $this->middleware('auth', ['except' => ['index', 'notices', 'contact', 'about_company', 'terms', 'privacy', 'view']]);
    }

    // 기본 화면은 notices 화면임.
    public function index(Request $request) {
        return $this->notices($request);
        
    }

    // 공지사항
    public function notices(Request $request) {
        $list = null;

        // DB에 있는 값을 id순서로 오름차순으로 한후 한 페이지당 5개씩 보여주도록 처리.
        $list = Help::orderBy('id', 'desc')->paginate(5);
        
        return view('help.notices')->with('list', $list);
    }

    // 연락하기
    public function contact() {
        return view('help.contact');
    }

    // 회사소개
    public function about_company() {
        return view('help.about_company');
    }

    // 이용약관
    public function terms() {
        return view('help.terms');
    }

    // 개인정보처리방침
    public function privacy() {
        return view('help.privacy');
    }

    // 글 작성 화면으로 연결
    public function write_form() {
        return view('help.write_form');
    }

    // 글 작성 submit 버튼 클릭 시
    public function write(Request $request) {
        // 값 가져오기
        $writer = $request->writer;
        $title = $request->title;
        $content = $request->content;
        $regtime = date("Y-m-d H:i:s");

        // 빈값인지 확인
        $this->validate($request, [
            'title' => 'required' ,
            'writer' => 'required',
            'content' => 'required'
        ]);

        // 데이터 생성
        Help::create([
            'writer' => $writer,
            'title' => $title,
            'content' => $content,
            'regtime' => $regtime,
        ]);

        return redirect()->route('help.notice')->with('msg', '정상적으로 등록 되었습니다.');
    }

    // 글 상세 보기
    public function view(Request $request) {
        $id = $request->id;

        // 현재 작성된 글을 보여주기 위해서 DB값을 가져온다.
        $list = DB::table('helps')->where('id', $id)->first();
        
        return view('help.view')->with('list', $list);
    }

    // 글 수정 화면
    public function update_form(Request $request) {
        $id = $request->id;

        // 현재 작성된 글을 보여주기 위해서 DB값을 가져온다.
        $list = DB::table('helps')->where('id', $id)->first();

        return view('help.update_form')->with('list', $list);
    }

    // 글 수정
    public function update(Request $request) {
        $id = $request->id;
        $title = $request->title;
        $content = $request->content;

        // 업데이트 실행
        $list = Help::find($id);
        $list->update([
            'title' => $title,
            'content' => $content,
        ]);
        
        return redirect()->route('help.notice')->with('msg', "정상적으로 수정되었습니다.");
    }

    // 글 삭제
    public function delete(Request $request) {
        $id = $request->id;
        $user_email = Auth::user()->email;

        // id를 통해 DB에서 글 작성자 불러오기
        // $msg = DB::table('helps')->where('id', $id)->first();
        $msg = Help::find($id);
        
        // 현재 접속한 사람과 글 작성자가 같은지 확인.
        if($user_email == $msg["writer"]) {
            // 같으면 글 삭제
            
            $msg->delete();   
            return redirect()->route('help.notice')->with('msg', "정상적으로 삭제되었습니다.");
        } else { 
            return redirect()->back()->with('msg', "글 작성자만 삭제할 수 있습니다.");
        }   
    }
}
