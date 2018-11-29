<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TaskController extends Controller
{
    //

    // 할일 목록을 출력
    public function list3() {
        $tasks = [
            ['name' => '라라벨 예제 작성', 'due_date' => '2018-11-15'],
            ['name' => '블레이드 예제 작성', 'due_date' => '2018-11-15']
        ];
    
        return view('task.list3')->with('tasks', $tasks);
    }

    /*  
    public function param($id = 1, $arg = 'argument') {
        return ['id' => $id, 'arg' => $arg];
    }
    */

    // Request로 처리하기.
    public function param(Request $request, $id = 1, $arg = 'argument') {
        dump( ['path' => $request->path(),
                'url' => $request->url(),
                'fullUrl' => $request->fullUrl(),
                'id' => $request->id,
                'method' => $request->method(),
                'name' => $request->get('name'),
                // 현재 요청이 Ajax 요청인지 여부를 불린타입으로 반환
                'ajax' => $request->ajax(),
                // key가 null일 경우 모든 헤더 반환 / header($key)
                'header' => $request->header(),
            ]);
    }
}
