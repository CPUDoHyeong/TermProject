<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Board extends Model
{
    // 화이트 리스트
    // Hits 라는 컬럼은 배열형태로 지정할 수 있다고 설정
    // 안에 있는것만 지정 가능.
    protected $fillable = ["Hits", "Content", "Title", "Writer"];
    // 아래는 블랙리스트
    // 보호해야할 칼럼을 명시적으로 지정하는 방식.
    // 여기에 지정되지 않은 칼럼은 모두 값 설정이 가능.
    // 화이트 리스트와 블랙 리스트 둘 중 하나만 사용가능.
    // protected $guarded = [];
    //
    public $timestamps = false;

}
