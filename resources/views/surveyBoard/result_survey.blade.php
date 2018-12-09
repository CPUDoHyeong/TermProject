<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>e-survey 결과보기</title>
    <link rel="stylesheet" href="{{ asset('css/survey/result.css?dddd') }}">
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

                        <!-- DB의 분류를 가지고온다 -->
                        <h1>{{ strtoupper($list->thema) }}</h1>

                        <a href="{{ route('surveyBoard.whole_survey') }}" class="close" title="목록으로"></a>
                    </div>
                </div>
                <div class="survey-content">
                    <div class="show-wrapper">
                        
                        <!-- 질문 -->
                        <div class="info">
                            <p>{{ $list->title }}</p>
                        </div>

                        <div class="answer-wrapper">
                            <div class="question">
                                <img src="{{ asset('uploads/'.$list->img_url) }}" />
                            </div>
                        </div>

                        <div class="choice-wrapper">
                            <div class="ul-wrapper">

                                <ul>

                                    @php ($i = 1)
                                    @foreach($item_list as $key => $item)
                                    <li>
                                        <p class="graph_head">
                                            {{$key}}
                                            <span class="item{{$i}}">{{$item}}%</span>
                                        </p>

                                        <div class="graph_body">
                                            <span class="bar" id="bar{{$i}}"></span>
                                        </div>

                                        <script>
                                            
                                            var percent{{$i}} = $('.item{{$i}}').text();
                                            
                                            $('#bar{{$i}}').animate({width: percent{{$i}}}, 1000);

                                        </script>

                                    </li>
                                    @php ($i++)
                                    @endforeach
                                    
                                </ul>
                            </div> 
                            
                        </div>

                        <div class="button-wrapper">
                            <input class="submit-btn" type="button" value="확인" onclick="location.href='{{ route('surveyBoard.whole_survey') }}'">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>