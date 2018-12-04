<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Validation\ValidatesRequests;

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

        $rules = [
            'thema' => 'bail|required',
            'title' => 'bail|required|max:100',
            'start_date' => 'bail|required|timezone',
            'end_date' => 'bail|required|timezone',
            'point' => 'bail|required|integer',
            'limit' => 'bail|required',
            'limit_count' => 'bail|required',
            'img_url' => 'bail|required',
            'item_type' => 'bail|reqruied',
            // 항목들 처리는 어떻게 ??
        ];

        $validator = \Validator::make($request->all(), $rules);

        // fails는 유효성 검사를 통과하지 못하면 true를 반환한다.
        if($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        } else {
            return $request->all();
        }
    }
}
