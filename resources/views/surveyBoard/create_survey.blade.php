<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>e-survey 고객지원</title>
    <link rel="stylesheet" href="{{ asset('css/survey/create.css?xdddddddf') }}">

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
</head>
<body>
    <div class="bg">
        <div class="wrapper">
            <div class="survey-container">
                <div class="survey-title">
                    <div class="title-wrapper">

                        <!-- 분류 선택 -->
                        <select class="combo" name=''>
                            <option value=''> 분류 선택 </option>
                            <option value=''>스포츠</option>
                            <option value=''>사회</option>
                            <option value=''>뷰티</option>
                            <option value=''>IT</option>
                            <option value=''>방송</option>
                            <option value=''>음식</option>
                            <option value=''>여행</option>
                            <option value=''>건강</option>
                            <option value=''>취미</option>
                            <option value=''>육아</option>
                            <option value=''>반려</option>
                            <option value=''>금융</option>
                            <option value=''>사랑</option>
                            <option value=''>해외</option>
                            <option value=''>교육</option>
                            <option value=''>생활</option>
                            <option value=''>영화</option>
                            <option value=''>음악</option>
                            <option value=''>기타</option>
                        </select>
                    </div>
                </div>
                <div class="survey-content">
                    <form action="" method="post">
                        @csrf
                        
                        <div class="show-wrapper">
                            
                            <!-- 질문 -->
                            <div class="info">
                                <p>
                                ※ 질문 입력
                                </p>
                                <div class="answer">
                                    <textarea rows="3" cols="75" name="answer" class="answer-textarea" placeholder="질문을 입력해 주세요(최대 100자)"></textarea>
                                </div>
                            </div>

                            <div class="date">
                                <p>
                                ※ 설문기간
                                </p>
                                <div class="date-wrapper">
                                    <div class="start-date">
                                        <label>시작일 </label>
                                        <input name="start_date" type="date">
                                    </div>

                                    <div class="end-date">
                                        <label>종료일 </label>
                                        <input name="end_date" type="date">
                                    </div>
                                </div>
                                
                            </div>

                            <div class="info">
                                <p>
                                ※ 포인트 입력
                                </p>
                                <div class="answer">
                                    <input type="text" placeholder="포인트를 입력해 주세요" class="answer-point">
                                </div>

                                
                            </div>

                            <div class="info">
                                <p class="limit_block">
                                ※ 참여 인원 설정
                                </p>

                                <!-- 제한 없음 클릭시 input disable, 직접 입력 클릭 시 able-->
                                <label id="limit"><input type="radio" name="limit" value="limit" id="limit"/>제한 없음</label>
                                <label id="entry"><input type="radio" name="limit" value="entry" id="entry" checked="checked"/>직접 입력</label>

                                <div class="answer">
                                    <input type="text" placeholder="참여 인원을 입력해 주세요" class="limit-input">
                                </div>
                            </div>

                            <div class="info">
                                <p>
                                ※ 이미지 업로드
                                </p>
                                <div class="answer">
                                    <!-- 이미지 파일만 제한 -->
                                    <input type="file" name="survey_img" onchange="fileCheck(this);" accept="image/gif, image/jpeg, image/png"> 
                                </div>
                                <div class="preview">
                                    <img id="survey_img">
                                </div>
                            </div>

                            <div class="info">
                                <p>
                                ※ 답안 유형 선택
                                </p>
                                <div class="select">
                                    <ul>
                                        <li>
                                            <!-- 단일 선택 -->
                                            <label id="ck1"><input type="radio" name="type" value="single" id="ck1"/>단일 선택</label>
                                        </li>

                                        <li>
                                            <!-- 복수 선택 -->
                                        <label id="ck2"><input type="radio" name="type" value="plural" id="ck2"/>복수 선택</label>
                                        </li>
                                    </ul>
                                    <div class="item_list">
                                        <ul id="item_ul">
                                            <li>
                                                <input type="text" class="item" name="item1" placeholder="항목1">
                                            </li>
                                            <li>
                                                <input type="text" class="item" name="item2" placeholder="항목2">
                                            </li>
                                        </ul>
                                    </div>

                                    <div class="plus">
                                        <input class="plus-btn" type="button" value="항목추가" onclick="addItem()">
                                        <input class="delete-btn" type="button" value="항목삭제" onclick="deleteItem()">
                                    </div>
                                    
                                </div>
                            </div>

                            <div class="button-wrapper">
                                <button class="submit-btn" name="button" type="submit">작성완료</button>
                                <input class="submit-btn" type="button" value="작성취소" onclick="confirm_click()">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- js -->
    <script type="text/javascript" src="{{ asset('js/survey/create_survey.js') }}"></script>
    <script type="text/javascript">

        // 작성취소 클릭 시 
        function confirm_click() {
            var check = confirm('작성을 취소하고 설문리스트로 돌아갑니다.\n계속하시겠습니까?');

            if(check) {
                location.href="{{ route('surveyBoard.whole_survey')}}";
            } else {
                // 아무것도 안함.
            }
        }
    </script>
</body>
</html>