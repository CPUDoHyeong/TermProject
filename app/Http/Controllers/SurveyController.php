<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SurveyController extends Controller
{
    
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
}
