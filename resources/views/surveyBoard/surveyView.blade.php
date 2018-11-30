<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>e-survey 고객지원</title>
    <link rel="stylesheet" href="{{ asset('css/survey/surveyView.css') }}">
    <script>
        var textarea;
        function init() {
            textarea = document.getElementsByClassName("answer-textarea")[0];
            textarea.addEventListener('keydown', resize);
            textarea.addEventListener('keyup', resize);
        }

        function resize() {
            textarea.style.height = "74px";
            textarea.style.height = (12+textarea.scrollHeight) + "px";
        }
    </script>
</head>
<body onload="init()">
    <div class="bg">
        <div class="wrapper">
            <div class="survey-container">
                <div class="survey-title">
                    <div class="title-wrapper">

                        <!-- DB의 분류를 가지고온다 -->
                        <h1>분류</h1>
                    </div>
                </div>
                <div class="survey-content">
                    <form>
                        <div class="hidden-data">
                            <!-- 세션 사용자의 아이디와 이름 저장 보여줄 필요 없음 -->
                            <!-- 빈 값일 경우 로그인 후 이용 하라고 한다 -->
                            <input name="" type="hidden">
                            <input name="" type="hidden">
                        </div>
                        <div class="show-wrapper">
                            
                            <!-- 질문 -->
                            <div class="info">
                                <p>
                                어느 커피체인점을 가장 좋아하시나요?어느 커피체인점을 가장 좋아하시나요?어느 커피체인점을 가장 좋아하시나요?어느 커피체인점을 가장 좋아하시나요?어느 커피체인점을 가장 좋아하시나요?어느 커피체인점을 가장 좋아하시나요?어느 커피체인점을 가장 좋아하시나요?어느 커피체인점을 가장 좋아하시나요?어느 커피체인점을 가장 좋아하시나요?
                                </p>
                            </div>

                            <!-- 날짜와 포인트 감싸는 div -->
                            <div class="etc-wrapper">

                                <!-- 날짜 -->
                                <div class="view-date">
                                    <p>2018-11-29 ~ 2018-12-31</p>
                                </div>

                                <!-- 포인트 -->
                                <div class="view-point">
                                    <span>+100포인트</span>
                                </div>
                            </div>

                            <div class="answer-wrapper">
                                <div class="question">
                                    <img src="{{ asset('img/mainimg.jpg') }}" />
                                    <!-- <div class="bb" style="background-image:url({{ asset('img/slide1.jpg')}})">
                                    </div> -->
                                </div>
                                <div class="answer">
                                    <textarea rows="3" cols="75" name="answer" class="answer-textarea" placeholder="답변을 적어주세요"></textarea>
                                </div>
                            </div>

                            <div class="choice-wrapper">
                                <div class="question">
                                    <p>
                                        <strong>
                                        의견에 대한 답변을 원하시면 회신 받으실 이메일 주소를 적어주세요 (선택)
                                        </strong>   
                                    </p>
                                </div>
                                <div class="answer">
                                    <input type="email" name="mail" placeholder="이메일을 적어주세요" class="answer-email">
                                </div>
                            </div>

                            <div class="button-wrapper">
                                <button class="submit-btn" name="button" type="submit">문의하기</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>