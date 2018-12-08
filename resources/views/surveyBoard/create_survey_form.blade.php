<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>e-survey 고객지원</title>
    <link rel="stylesheet" href="{{ asset('css/survey/create.css?xddddddddddf') }}">

    <!-- favicon -->
    <link rel="shortcut icon" href="{{ asset('img/favicon.ico') }}">

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="{{URL::to('/')}}/ckeditor/ckeditor.js"></script>
</head>
<body>
    <div class="bg">
        <div class="wrapper">
            <div class="survey-container">
                <form action="{{ route('surveyBoard.create_survey') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="survey-title">
                        <div class="title-wrapper">
                            <div>
                                <input name="email" size="30" type="hidden" value="{{ Auth::user()->email }}">
                            </div>
                            <!-- 분류 선택 -->
                            <select class="combo" name="thema">
                                <!-- 첫번째 value를 빈값으로 해서 required로 확인가능-->
                                <option value=''>   분류 선택 </option>
                                <option value='sport'>  스포츠  </option>
                                <option value='social'> 사회    </option>
                                <option value='beauty'> 뷰티    </option>
                                <option value='it'>     IT      </option>
                                <option value='brad'>   방송    </option>
                                <option value='food'>   음식    </option>
                                <option value='travel'> 여행    </option>
                                <option value='health'> 건강    </option>
                                <option value='hobby'>  취미    </option>
                                <option value='kid'>    육아    </option>
                                <option value='animal'> 동물    </option>
                                <option value='bank'>   금융    </option>
                                <option value='love'>   사랑    </option>
                                <option value='foreign'>해외    </option>
                                <option value='edu'>    교육    </option>
                                <option value='life'>   생활    </option>
                                <option value='movie'>  영화    </option>
                                <option value='music'>  음악    </option>
                                <option value='etc'>    기타    </option>
                            </select>

                            
                            {!! $errors->first('thema', '<span class="form-error">:message</span>') !!}   
                            
                        </div>
                    </div>
                    <div class="survey-content">
                        <div class="show-wrapper">
                            
                            <!-- 질문 -->
                            <div class="info">
                                <p>
                                ※ 질문 입력
                                </p>
                                <div class="answer">
                                    <textarea id="content" rows="3" cols="75"  maxlength="100" name="title" class="answer-textarea" placeholder="질문을 입력해 주세요(최대 100자)" required>{{ old('title')}}</textarea>
                                    <span id="counter">###</span>
                                    
                                </div>

                                <div class="error">
                                    {!! $errors->first('title', '<span class="form-error">:message</span>') !!}    
                                </div>
                            </div>

                            <div class="date">
                                <p>
                                ※ 설문기간
                                </p>
                                <div class="date-wrapper">
                                    <div class="start-date">
                                        <label>시작일 </label>
                                        <input name="start_date" type="date" value="{{ old('start_date')}}">
                                        {!! $errors->first('start_date', '<span class="form-error">:message</span>') !!}
                                        
                                    </div>

                                    <div class="end-date">
                                        <label>종료일 </label>
                                        <input name="end_date" type="date" value="{{ old('end_date')}}">
                                        {!! $errors->first('end_date', '<span class="form-error">:message</span>') !!}
                                    </div>
                                </div>

                                <div class="error">
                                    @if(session()->has('date_err'))
                                        <span class="form-error">
                                            {{ session('date_err') }}
                                        </span>
                                    @endif
                                </div>
                                
                            </div>

                            <div class="info">
                                <p>
                                ※ 포인트 입력
                                </p>
                                
                                <div class="answer">
                                    <input type="text" placeholder="포인트를 입력해 주세요" class="answer-point" name="point" value="{{ old('point')}}" onkeydown="return onlyNumber(event)" onkeyup="removeChar(event)" required>
                                </div>

                                <div class="error">
                                    {!! $errors->first('point', '<span class="form-error">:message</span>') !!}    
                                </div>

                                
                            </div>

                            <div class="info">
                                <p class="limit_block">
                                ※ 참여 인원 설정
                                </p>

                                <!-- 제한 없음 클릭시 input disable, 직접 입력 클릭 시 able-->
                                <label id="limit"><input type="radio" name="limit" value="non_limit" id="limit"/>제한 없음</label>
                                <label id="entry"><input type="radio" name="limit" value="entry" id="entry" checked="checked"/>직접 입력</label>

                                <div class="answer">
                                    <input type="text" placeholder="참여 인원을 입력해 주세요" class="limit-input" name="limit_count" value="{{ old('limit_count')}}" onkeydown="return onlyNumber(event)" onkeyup="removeChar(event)" required>
                                </div>

                                <div class="error">
                                    {!! $errors->first('limit', '<span class="form-error">:message</span>') !!}   
                                    @if(session()->has('limit_err'))
                                        <script>
                                            alert("{{ session('limit_err') }}");
                                        </script>
                                    @endif
                                </div>
                            </div>

                            <div class="info">
                                <p>
                                ※ 이미지 업로드
                                </p>
                                <div class="answer file-wrapper">
                                    <!-- 이미지 파일만 제한 -->
                                    <input type="file" name="img_url" onchange="fileCheck(this);" accept="image/gif, image/jpeg, image/png" id="upload_file"> 
                                    <input type="button" class="delete_btn" value="삭제" onclick="delete_file()">
                                </div>

                                <!-- 설정한 이미지를 보여주는 div -->
                                <div class="preview">
                                    <img id="survey_img">
                                </div>

                                <div class="error">
                                    {!! $errors->first('img_url', '<span class="form-error">:message</span>') !!}    
                                </div>
                            </div>

                            <!-- <div class="info">
                                <div class="select">
                                    <textarea id="contents" name="contents">
                                        
                                    </textarea>

                                    <script type="text/javascript">
                                        CKEDITOR.replace('contents',{
                                            'filebrowserUploadUrl' : "{{URL::to('/')}}/ckeditor/upload.php"
                                            });
                                    </script>
                                </div>
                            </div> -->

                            <div class="info">
                                <p>
                                ※ 답안 유형 선택
                                </p>
                                <div class="select">
                                    <ul>
                                        <li>
                                            <!-- 단일 선택 -->
                                            <label id="ck1"><input type="radio" name="item_type" value="single" id="ck1" @if(old('item_type')) checked @endif>단일 선택</label>
                                        </li>

                                        <li>
                                            <!-- 복수 선택 -->
                                            <label id="ck2"><input type="radio" name="item_type" value="plural" id="ck2" @if(old('item_type')) checked @endif>복수 선택</label>
                                        </li>
                                    </ul>
                                    <div class="item_list">
                                        <ul id="item_ul">
                                            <li>
                                                <input type="text" class="item" name="item[]" placeholder="항목1" required value="{{ old('item1')}}" onkeydown="return rule(event)">
                                            </li>

                                            <li>
                                                <input type="text" class="item" name="item[]" placeholder="항목2" required value="{{ old('item1')}}" onkeydown="return rule(event)">
                                            </li>
                                        </ul>
                                    </div>

                                    
                                        {!! $errors->first('item_type', '<span class="form-error">:message</span>') !!}    
                                    

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
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- js -->
    <script type="text/javascript" src="{{ asset('js/survey/create_survey.js?sdds') }}"></script>
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