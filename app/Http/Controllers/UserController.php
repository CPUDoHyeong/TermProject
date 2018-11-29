<?php

namespace App\Http\Controllers;
use DB;
use App\Help;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function __construct() {
        $this->middleware('auth');
    }
    
    public function index() {
        return view('user.index');
    }

    public function pwUpdate_form() {
        return view('user.pwUpdate_form');
    }

    public function userUpdate(Request $request) {
        $name = $request->name;
        $email = $request->email;

        // 기존의 있는 것 가져온다.
        $user = DB::table('users')->where('email', $email)->first();
        
        // 빈 값이 아닐 때 수정 진행
        if($name) {
            if($user->name == $name) {
                // 변동 사항이 없을 때
                session()->flash('msg', '변동사항이 없습니다.');

            } else {
                // 변동사항이 있었을 때 수정       
                DB::table('users')->where('email', $email)->update(['name' => $name]);           
                session()->flash('msg', '정상적으로 수정되었습니다.');
            }
        } else {
            // 빈 값이면 입력해달라고 하고 return
            session()->flash('msg', '값을 입력해주세요.');
        }
        
        return redirect()->route('user');
    }

    public function pwUpdate(Request $request) {
        $email = $request->email;
        $new_pw = $request->new_pw;
        $new_pw_check = $request->new_pw_check;

		// 새로입력한 패스워드를 적합하게 작성하기 위한 정규식ㄴ
		$pwPattern = '/^.*(?=^.{8,15}$)(?=.*\d)(?=.*[a-zA-Z])(?=.*[!@#$%^&+=]).*$/';

        // email을 통해 db값을 가져오기.
		$user = DB::table('users')->where('email', $email)->first();

		// 조건확인
		if($new_pw && $new_pw_check) {

            if(preg_match($pwPattern, "$new_pw")) {
                if($new_pw == $new_pw_check) {

                    // 새로운 비밀번호를 암호화하여 입력한다.
                    DB::table('users')->where('email', $email)->update(['password' => Hash::make($new_pw)]);
                    session()->flash('msg', '비밀번호가 수정되었습니다.');

                } else {
                    session()->flash('msg', '비밀번호의 확인 값이 일치하지 않습니다.');
                }
            } else {
                session()->flash('msg', '비밀번호는 8~15자 사이, 영문, 숫자, 특수문자가 포함되어야 합니다.');
            }
		} else {
			session()->flash('msg', '모든 입력란을 채워주세요.');
        }
        
        return redirect()->route('user.pwUpdate_form');
        
    }
}
