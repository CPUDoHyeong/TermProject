<!-- Styles -->
<link rel="stylesheet" href="{{ asset('css/main.css?dd') }}">

<div class="topnav">

<!-- 로그인 상태일 때의 출력 -->
@if(Auth::check())
    <!-- 로고 보여주는 부분 -->
    <div class="navlogo-wrapper">
        <a href="{{ route('surveyBoard.whole_survey') }}">
            <img class="navlogo" src="{{ asset('img/logo.png') }}" width="100px">
        </a>
    </div>

    <!-- 로그인을 없애고 사용자 메뉴를 보여주는 드롭다운 추가 -->
    <div class="direct-menu">
        <div class="login-btn user-dropdown-wrapper">
            <div class="user-dropdown">
                <button class="user-dropbtn" id="user-nav">{{ Auth::user()->name }}</button>
                <div class="user-dropdown-content" id="user-myDropdown">
                    <a href="{{ url('create_survey') }}">설문 작성</a>
                    <a href="{{ url('help') }}">도움말</a>
                    <a href="{{ route('user') }}">설정</a>
                    <a class="logout-btn" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">로그아웃</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </div> 
        </div>
        <div class="login">
            <div class="login-btn">
                <a href="{{ route('surveyBoard.whole_survey') }}">설문리스트</a>
            </div>
            <div class="login-btn">
                <a href="{{ url('help') }}">도움말</a>
            </div>
        </div>

        <div class="mobile-login">
            <div class="login-btn">
                <a href="{{ route('surveyBoard.whole_survey') }}">
                    <img src="{{ asset('img/survey-icon.png') }}" width="20" height="20" alt="설문리스트"/>
                </a>
            </div>
            <div class="login-btn">
                <a href="{{ url('help') }}">
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
        <a href="{{ url('member') }}">로그인 • 가입</a>
        <a href="{{ route('surveyBoard.whole_survey') }}">설문리스트</a>
        <a href="{{ url('help') }}">도움말</a>
    </div>

    <div class="mobile-login">
        <a href="{{ route('member') }}">
            <img src="{{ asset('img/login-icon.png') }}" width="20" height="20" alt="로그인"/>
        </a>
        <a href="{{ route('surveyBoard.whole_survey') }}">
            <img src="{{ asset('img/survey-icon.png') }}" width="20" height="20" alt="설문리스트"/>
        </a>
        <a href="/help/">
            <img src="{{ asset('img/info-icon.png') }}" width="20" height="20" alt="도움말"/>
        </a>
    </div>

@endif
</div>


