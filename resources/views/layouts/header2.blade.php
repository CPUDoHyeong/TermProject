<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>e-survey</title>

    

    <!-- favicon -->
    <link rel="shortcut icon" href="{{ asset('img/favicon.ico') }}">

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    
</head>

<body>
    <header>
    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/main.css?dd') }}">
        <div class="topnav">

        <!-- 로그인 상태일 때의 출력 -->
        @guest
            <!-- 로고 보여주는 부분 -->
            <div class="navlogo-wrapper">
                <a href="/">
                    <img class="navlogo" src="{{ asset('img/logo.png') }}" width="100px">
                </a>
            </div>

            <!-- 로그인을 없애고 사용자 메뉴를 보여주는 드롭다운 추가 -->
            <div class="direct-menu">
                <div class="login-btn user-dropdown-wrapper">
                    <div class="user-dropdown">
                        <button class="user-dropbtn" id="user-nav">sdfsdf</button>
                        <div class="user-dropdown-content" id="user-myDropdown">
                            <a href="/surveyBoard/whole_survey/">나의 설문</a>
                            <a href="/help/">도움말</a>
                            <a href="/user/">설정</a>
                            <a class="logout-btn" href="/member/logout/">로그아웃</a>
                        </div>
                    </div> 
                </div>
                <div class="login">
                    <div class="login-btn">
                        <a href="/surveyBoard/whole_survey/">설문리스트</a>
                    </div>
                    <div class="login-btn">
                        <a href="/help/">도움말</a>
                    </div>
                </div>

                <div class="mobile-login">
                    <div class="login-btn">
                        <a href="/surveyBoard/whole_survey/">
                            <img src="{{ asset('img/survey-icon.png') }}" width="20" height="20" alt="설문리스트"/>
                        </a>
                    </div>
                    <div class="login-btn">
                        <a href="/help/">
                            <img src="{{ asset('img/info-icon.png') }}" width="20" height="20" alt="도움말"/>
                        </a>
                    </div>
                </div>
            </div>
            
        <!-- 로그인 상태가 아닐 때의 출력 -->
        @else
            <!-- 로고 보여주는 부분 -->
            <a href="/">
                <img class="navlogo" src="{{ asset('img/logo.png') }}" width="100px">
            </a>

            <div class="login">
                <a href="/member/">로그인 • 가입</a>
                <a href="/surveyBoard/whole_survey">설문리스트</a>
                <a href="/help/">도움말</a>
            </div>

            <div class="mobile-login">
                <a href="/member/">
                    <img src="{{ asset('img/login-icon.png') }}" width="20" height="20" alt="로그인"/>
                </a>
                <a href="/surveyBoard/whole_survey/">
                    <img src="{{ asset('img/survey-icon.png') }}" width="20" height="20" alt="설문리스트"/>
                </a>
                <a href="/help/">
                    <img src="{{ asset('img/info-icon.png') }}" width="20" height="20" alt="도움말"/>
                </a>
            </div>

        @endguest
        </div>
    </header>
    
        @yield('content')


    

