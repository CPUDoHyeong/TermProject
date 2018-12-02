<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

    public function create_survey() {
        return view('surveyBoard.create_survey');
    }
}
