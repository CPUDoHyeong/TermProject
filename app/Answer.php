<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    // 화이트 리스트
    // 아래 목록안에있는것만 지정가능
    protected $fillable = ["survey_id", "user_answers", "submit_date", "user_email"];

    public $timestamps = true;
}
