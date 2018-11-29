<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function __construct() {
        $this->middleware('guest');
    }
    
    public function form() {
        return view('member.login_form');
    }

    public function login() {
        
    }

    public function logout() {

    }

    public function password_update() {

    }

    public function member_join() {

    }

    public function member_exit() {

    }
}
