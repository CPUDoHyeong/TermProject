<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
    // 화이트 리스트
    // 아래 목록안에있는것만 지정가능
    protected $fillable = ["thema", "title", "start_date", "end_date", "regtime", "point", "limit_count", "running_count", "img_url", "item_type", "item_list", "reg_user"];

    public $timestamps = false;
}
