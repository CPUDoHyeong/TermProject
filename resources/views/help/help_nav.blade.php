
<link rel="stylesheet" href="{{ asset('css/help/notices.css?dsdddfd') }}">
    <div id="main-container" class="se-wrapper">
        <div class="wrapper">
            <div class="header-nav">
                <div class="header-nav-inner-wrapper">
                    <h1 class="ui-page-title">도움말</h1>
                    <nav class="main-nav">
                        <ul class="nav" id="select-nav">
                            <li class="page-title" id="notices">
                                <a href="{{ route('help.notice')}}">공지사항</a>
                            </li>
                            <li class="page-title" id="contact">
                                <a href="{{ route('help.contact') }}">연락하기</a>
                            </li>
                            <li class="page-title" id="about_company">
                                <a href="{{ route('help.about_company') }}">회사소개</a>
                            </li>
                            <li class="page-title" id="terms">
                                <a href="{{ route('help.terms') }}">이용약관</a>
                            </li>
                            <li class="page-title" id="privacy">
                                <a href="{{ route('help.privacy') }}">개인정보처리방침</a>
                            </li>
                        </ul>
                        <div class="navbar">
                            <div class="dropdown">
                                <button class="dropbtn" id="nav">목&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;록
                                </button>
                                <div class="dropdown-content" id="myDropdown">
                                    <a href="{{ route('help.notice')}}">공지사항</a>
                                    <a href="{{ route('help.contact') }}">연락하기</a>
                                    <a href="{{ route('help.about_company') }}">회사소개</a>
                                    <a href="{{ route('help.terms') }}">이용약관</a>
                                    <a href="{{ route('help.privacy') }}">개인정보처리방침</a>
                                </div>
                            </div> 
                        </div>
                    </nav>
                </div>
            </div>
            <script type="text/javascript" src="{{ asset('js/help/help_nav.js') }}"></script>
