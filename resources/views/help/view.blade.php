@extends('layouts.master')

@section('header')
    @include('layouts.header')
@endsection

@section('nav')
    @include('help.help_nav')
@endsection

@section('content')
<link rel="stylesheet" href="{{ asset('css/help/notice_board.css') }}">
@if(session()->has('msg'))
    <script>
        alert("{{ session('msg') }}");
    </script>
@endif
<div class="content">
    <div class="contentbox view">
        <div class="contentbox-header">
            <span class="num-title">{{ $list->id.". ".$list->title}}</span>
            <span class="regtime">{{$list->regtime}}</span>
        </div>
        <div class="contentbox-content">
            <p>{{$list->content}}</p>
        </div>
    </div>

    <div class="notice-btns">
        <a class="list-btn" href="{{ route('help.notice') }}">목록으로</a>
        <!-- 관리자 계정이면 글 수정 버튼 생성 -->
        @if(Auth::user()['email'] == "master@master.com")
            <a class="modify-btn" href="{{ url('help/update_form', $list->id) }}">글 수정</a>
            <a class="delete-btn" onclick="confirm_click();">글 삭제</a>
        @endif
    </div>
</div>
<script>
    function confirm_click() {
        var check = confirm("정말 삭제 하겠습니까?");
        if(check) {
            // herf는 아래와 같이 , 로 처리
            location.href="{{ url('help/delete', $list->id )}}";
            document.createElements('form');
            
        } else {
            
        }
    }
</script>

@endsection