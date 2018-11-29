@extends('layouts.master')

@section('header')
    @include('layouts.header')
@endsection

@section('nav')
    @include('help.help_nav')
@endsection

@section('content')
<div class="content">
            <div class="contentbox about-company">
                <h2>주식회사 도형네트웍스</h2>
                <p>e-survey를 개발 및 서비스하는 주식회사 도형네트웍스입니다</p>
                <ul>
                    <li>상호 : 주식회사 도형네트웍스</li>
                    <li>사업자등록번호: 114-12-12345</li>
                    <li>통신판매업신고번호: 제 2018-대구북구-1234 호</li>
                    <li>주소 : 대구 북구 복현로35 영진전문대학교</li>
                    <li>대표이사: 김도형</li>
                    <li>홈페이지: www.dohyeong.net</li>
                    <li>연락처: kdh0074@naver.com</li>
                    <li>전화번호: 070-1234-5678</li>
                </ul>
            </div>
        </div>
        
    </div>
</div>
@endsection