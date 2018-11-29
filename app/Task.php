<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    // config/database.php의 default는 mysql 되어있지만/
    // task에서 sqlite를 사용하고자 한다면
    // 여기서 바꿔준다
    // protected $connection = 'sqlite';
    // 엘로퀀트는 기본키로 id라는 칼럼을 사용하지만 다른 칼럼으로 바꾸고 싶다면
    // 아래와 같이.
    // protected $primaryKey = 'task_id';
    public $timestamps = 'false';
    protected $dates = ['due_date', 'assigned_date'];
}
