@extends('layouts.master')

@section('header')
    @include('layouts.header')
@endsection

@section('nav')
    @include('surveyBoard.survey_nav')
@endsection

@section('content')
<link rel="stylesheet" href="{{ asset('css/user/user.css?d') }}">
<link rel="stylesheet" href="{{ asset('css/survey/main.css?d')}}">
<div class="content">
    <div class="contentbox">
        <div class="contentbox-header">
            <div class="tag-combo">
                <select class="combo-main" name=''>
                    <option value=''> 전체 </option>
                    <option value=''>스포츠</option>
                    <option value=''>사회</option>
                    <option value=''>뷰티</option>
                    <option value=''>IT</option>
                    <option value=''>방송</option>
                    <option value=''>음식</option>
                    <option value=''>여행</option>
                    <option value=''>건강</option>
                    <option value=''>취미</option>
                    <option value=''>육아</option>
                    <option value=''>반려</option>
                    <option value=''>금융</option>
                    <option value=''>사랑</option>
                    <option value=''>해외</option>
                    <option value=''>교육</option>
                    <option value=''>생활</option>
                    <option value=''>영화</option>
                    <option value=''>음악</option>
                    <option value=''>기타</option>
                </select>
            </div>
            <div class="search-box">
                <form class="search-form"  action="">
                    <input type="text" placeholder="검색어 입력" name="search2" autofocus="true">
                    
                </form>
            </div>
        </div>

        <div class="contentbox-content">
            <!-- 설문조사 목록 보여주기 -->

            
        </div>
    </div>
</div>
@endsection