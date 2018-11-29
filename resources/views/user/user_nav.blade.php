<link rel="stylesheet" href="{{ asset('css/help/notices.css') }}">

    <div id="main-container" class="se-wrapper">
        <div class="wrapper">
            <div class="header-nav">
                <div class="header-nav-inner-wrapper">
                    <h1 class="ui-page-title">설정</h1>
                    <nav class="main-nav">
                        <ul class="nav" id="select-nav">
                            <li class="page-title" id="user">
                                <a href="/user">회원정보 변경</a>
                            </li>
                            <li class="page-title" id="pwUpdate_form">
                                <a href="/user/pwUpdate_form/">비밀번호 변경</a>
                            </li>
                        </ul>
                        <div class="navbar">
                            <div class="dropdown">
                                <button class="dropbtn" id="nav">목&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;록
                                </button>
                                <div class="dropdown-content" id="myDropdown">
                                    <a href="/user/">회원정보 변경</a>
                                    <a href="/user/pwUpdate_form/">비밀번호 변경</a>
                                </div>
                            </div> 
                        </div>
                    </nav>
                </div>
            </div>
            <script type="text/javascript" src="{{ asset('js/help/help_nav.js') }}"></script>