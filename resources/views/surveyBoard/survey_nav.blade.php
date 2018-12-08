<link rel="stylesheet" href="{{ asset('css/help/notices.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

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
                            <li class="page-title" id="my_survey">
                                <a href="{{ route('surveyBoard.my_survey') }}">나의 설문</a>
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
                                    <a href="{{ route('surveyBoard.my_survey') }}">나의 설문</a>
                                </div>
                            </div> 
                        </div>
                    </nav>
                </div>
            </div>
            <div class="inner">
            </div>
            <script type="text/javascript" src="{{ asset('js/help/help_nav.js') }}"></script>