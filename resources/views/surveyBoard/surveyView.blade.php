<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>e-survey 고객지원</title>
    <link rel="stylesheet" href="{{ asset('css/survey/surveyView.css?ddddf') }}">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

    <!-- favicon -->
    <link rel="shortcut icon" href="{{ asset('img/favicon.ico') }}">
</head>
<body>
    <div class="bg" id="bg">
        <div class="wrapper">
            <div class="survey-container">
                <div class="survey-title">
                    <div class="title-wrapper">
                    @if(session()->has('answer_err'))
                        <script>
                            alert("{{ session('answer_err') }}");
                        </script>
                    @endif

                        <!-- DB의 분류를 가지고온다 -->
                        <h1>{{ strtoupper($list->thema) }}</h1>

                        <a href="javascript:history.back()" class="close" title="목록으로"></a>
                    </div>
                </div>
                <div class="survey-content">
                    <form method="post" action="{{ route('join_survey') }}">
                    @csrf
                        <div class="hidden-data">
                        @if(Auth::check())
                            <input name="email" type="hidden" value="{{ Auth::user()->email }}">
                        @endif
                            <input name="survey_id" type="hidden" value="{{ $list->survey_id }}">
                            <input name="point" type="hidden" value="{{ $list->point }}">
                        </div>
                        <div class="show-wrapper">
                            
                            <!-- 질문 -->
                            <div class="info">
                                <p>{{ $list->title }}</p>
                            </div>

                            <!-- 날짜와 포인트 감싸는 div -->
                            <div class="etc-wrapper">

                                <!-- 날짜 -->
                                <div class="view-date">
                                    <p>{{ substr($list->start_date, 0, 10) }} ~ {{ substr($list->end_date, 0, 10) }}</p>
                                </div>

                                <!-- 포인트 -->
                                <div class="view-point">
                                    <span>+{{ $list->point }}포인트</span>
                                </div>
                            </div>

                            <div class="answer-wrapper">
                                <div class="question">
                                    <img src="{{ asset('uploads/'.$list->img_url) }}" />
                                </div>
                            </div>

                            <div class="choice-wrapper">
                                <div class="ul-wrapper">

                                    <ul>
                                    <!-- 만약 0이라면 radio버튼으로, 1이라면 checkbox 버튼으로-->
                                    @if($list->item_type == 0)
                                        @foreach($item_list as $key => $item)
                                        <li>
                                            <label for="item{{ $key }}"><input type="radio" name="answer[]" value="{{ $item }}" id="item{{ $key }}"/>{{ $item }}</label>
                                        </li>

                                        @endforeach

                                    @elseif($list->item_type == 1)
                                        @foreach($item_list as $key => $item)
                                        <li>
                                            <label for="item{{ $key }}"><input type="checkbox" name="answer[]" value="{{ $item }}" id="item{{ $key }}"/>{{ $item }}</label>
                                        </li>

                                        @endforeach

                                    @endif
                                    </ul>
                                </div> 
                            </div>

                            <div class="button-wrapper">
                                <button class="submit-btn" name="button" type="submit">참여하기</button>
                                <input class="submit-btn" type="button" value="결과보기">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>