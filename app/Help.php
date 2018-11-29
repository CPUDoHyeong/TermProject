<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Help extends Model
{
    // 화이트 리스트
    // 아래 목록안에있는것만 지정가능
    protected $fillable = ["writer", "title", "content"];

    public $timestamps = false;
}
