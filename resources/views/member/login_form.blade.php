@extends('layouts.master')

@section('header')
    @include('layouts.header')
@endsection

@section('content')

<link rel="stylesheet" href="{{ asset('css/member/login.css') }}">
<div class="qm-scroll">
    <div id="main_container" class="se-wrapper">
        <div class="wrapper">

            <div class="content-login login-form">
                <div class="forms">
                    <form class="login-main" method="POST" action="{{ route('login') }}">
                        @csrf

                        <fieldset>
                            <legend>login form</legend>
                            <h1>지금 시작해 보세요!</h1>
                            <ul class="oauth">
                                <li>
                                    <a href="{{ url('/redirect') }}" class="facebook-connection">Facebook</a>
                                </li>
                                <li>
                                    <a href="{{ url('/redirect') }}" class="google-connection">Google</a>
                                </li>
                            </ul>
                            <input autofocus="autofocus" class="login-id" name="email" placeholder="이메일" size="50" type="email" required>

                            <input class="login-pw" name="password" placeholder="비밀번호" size="30" type="password" required>

                            <button class="login-button" type="submit">로그인</button>
                            <div class="extra">
                                <a href="{{ url('member/password_reset') }}">비밀번호 재설정</a>
                            </div>
                        </fieldset>

                        @if($errors->all())
                        <p class="error-message" id="invalid-signup">{{ $errors->all()[0] }}</p>
                        @endif
                    </form>

                    <form class="sign-up" method="POST" action="{{ route('register') }}">
                        @csrf                                        

                        <fieldset>
                            <legend>sign-up form</legend>
                            <h2>회원이 아니신가요? 가입은 무료입니다.</h2>
                            <input id="user_name" name="name" placeholder="이름" size="50" type="text" required>

                            <input id="user_id" name="email" placeholder="이메일" size="50" type="email" required>

                            <input id="user_pw" name="password" placeholder="비밀번호" size="30" type="password" required>

                            <input id="user_pw" name="password_confirmation" placeholder="비밀번호 확인" size="30" type="password" required>

                            
                            <button type="submit" class="main-button">가입하기</button>
                        </fieldset>
    
                        @if($errors->all())
                        <p class="error-message" id="invalid-signup">{{ $errors->all()[0] }}</p>
                        @endif
    
                    </form>
                </div>
                <div class="terms-and-agree">
                    <p class="agree-title">이용약관 및 개인정보처리방침 동의</p>
                    <p class="agree-msg">
                        회원가입 (Facebook, Google (으)로 가입 및 로그인 포함) 하시면 본 서비스의
                        <a href="{{ route('help.terms') }}">
                            <span>[이용약관]</span>
                        </a> 
                        및
                        <a href="{{ route('help.privacy') }}">
                            <span>[개인정보처리방침]</span>
                        </a>
                        에 동의하는 것입니다.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection