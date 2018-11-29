<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>e-survey 고객지원</title>
    <link rel="stylesheet" href="{{ asset('css/help/customer_support.css?ss') }}">
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
                        <h1>고객지원</h1>
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
                            <div class="info">
                                <p>
                                e-survey는 사용자들의 의견을 소중히 받아들입니다. 저희 서비스를 이용하면서 문제점을 발견했거나 의견이 있으면 알려주십시오. 여러분의 의견을 바탕으로 더 나은 서비스를 만들기 위해 최선을 다하겠습니다.
                                </p>
                            </div>

                            <div class="answer-wrapper">
                                <div class="question">
                                    <span class="question-span">※</span>
                                    <p>
                                        <strong>
                                            의견 또는 문의사항을 적어주세요
                                        </strong>   
                                    </p>
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