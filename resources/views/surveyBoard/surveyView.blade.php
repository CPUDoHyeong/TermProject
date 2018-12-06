<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>e-survey 고객지원</title>
    <link rel="stylesheet" href="{{ asset('css/survey/surveyView.css?ddf') }}">
</head>
<body>
    <div class="bg">
        <div class="wrapper">
            <div class="survey-container">
                <div class="survey-title">
                    <div class="title-wrapper">

                        <!-- DB의 분류를 가지고온다 -->
                        <h1>{{ strtoupper($list->thema) }}</h1>
                    </div>
                </div>
                <div class="survey-content">
                    <form method="post" action="#">
                    @csrf
                        <div class="hidden-data">
                            <!-- 세션 사용자의 아이디와 이름 저장 보여줄 필요 없음 -->
                            <!-- 빈 값일 경우 로그인 후 이용 하라고 한다 -->
                            <input name="" type="hidden">
                            <input name="" type="hidden">
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
                                            <label for="item{{ $key }}"><input type="radio" name="answer" value="single" id="item{{ $key }}"/>{{ $item }}</label>
                                        </li>

                                        @endforeach

                                    @elseif($list->item_type == 1)
                                        @foreach($item_list as $key => $item)
                                        <li>
                                            <label for="item{{ $key }}"><input type="checkbox" name="answer" value="plural" id="item{{ $key }}"/>{{ $item }}</label>
                                        </li>

                                        @endforeach

                                    @endif
                                        <!-- <li>
                                            
                                            <label for="item1"><input type="radio" name="type" value="single" id="item1"/>선택지1</label>
                                        </li>

                                        <li>
                                            
                                        <label for="item2"><input type="radio" name="type" value="plural" id="item2"/>선택지2</label>
                                        </li>

                                        <li>
                                            
                                        <label for="item3"><input type="radio" name="type" value="plural" id="item3"/>선택지2</label>
                                        </li>

                                        <li>
                                            
                                        <label for="item4"><input type="radio" name="type" value="plural" id="item4"/>선택지2</label>
                                        </li>

                                        <li>
                                            
                                        <label for="item5"><input type="radio" name="type" value="plural" id="item5"/>선택지5</label>
                                        </li> -->
                                    </ul>
                                </div>
                            </div>

                            <div class="button-wrapper">
                                <button class="submit-btn" name="button" type="submit">참여하기</button>
                                <input class="submit-btn" type="button" value="결과보기" onclick="confirm_click()">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>