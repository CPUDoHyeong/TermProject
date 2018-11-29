<link rel="stylesheet" href="{{ asset('css/help/notices.css') }}">

    <div id="main-container" class="se-wrapper">
        <div class="wrapper">
            <div class="header-nav">
                <div class="header-nav-inner-wrapper">
                    <h1 class="ui-page-title">설문 리스트</h1>
                    <nav class="main-nav">
                        <ul class="nav" id="select-nav">
                            <li class="page-title" id="whole_survey">
                                <a href="{{ route('surveyBoard.whole_survey') }}">전체 설문</a>
                            </li>
                            <li class="page-title" id="on_survey">
                                <a href="{{ route('surveyBoard.on_survey') }}">진행 중인 설문</a>
                            </li>
                            <li class="page-title" id="off_survey">
                                <a href="{{ route('surveyBoard.off_survey') }}">종료된 설문</a>
                            </li>
                            <li class="page-title" id="make_survey">
                                <a href="{{ route('surveyBoard.make_survey') }}">설문작성</a>
                            </li>
                        </ul>
                        <div class="navbar">
                            <div class="dropdown">
                                <button class="dropbtn" id="nav">목&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;록
                                </button>
                                <div class="dropdown-content" id="myDropdown">
                                    <a href="{{ route('surveyBoard.whole_survey') }}">전체 설문</a>
                                    <a href="{{ route('surveyBoard.on_survey') }}">진행 중인 설문</a>
                                    <a href="{{ route('surveyBoard.off_survey') }}">종료된 설문</a>
                                    <a href="{{ route('surveyBoard.make_survey') }}">설문작성</a>
                                </div>
                            </div> 
                        </div>
                    </nav>
                </div>
            </div>
            <script type="text/javascript" src="{{ asset('js/help/help_nav.js') }}"></script>