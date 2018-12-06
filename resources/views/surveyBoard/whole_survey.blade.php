@extends('layouts.master')

@section('header')
    @include('layouts.header')
@endsection

@section('nav')
    @include('surveyBoard.survey_nav')
@endsection

@section('content')
<link rel="stylesheet" href="{{ asset('css/user/user.css') }}">
<link rel="stylesheet" href="{{ asset('css/survey/main.css')}}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<div class="content">
    <div class="contentbox">
        <div class="contentbox-header">
            @if(session()->has('msg'))
                <script>
                    alert("{{ session('msg') }}");
                </script>
            @endif
            <div class="tag-combo">
                <select class="combo-main" name=''>
                    <option value=''> 전체 </option>
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
            <div class="search-box">
                <form class="search-form"  action="">
                    <input type="text" placeholder="검색어 입력" name="search2" autofocus="true">
                    <button type="submit"><i class="fa fa-search"></i></button>
                </form>
            </div>
        </div>

        <div class="contentbox-content">
            <!-- 설문조사 목록 보여주기 -->

            <div class="survey-list">
                <ul>

                    <!-- foreach -->
                    <li>
                        <a>
                            <!-- -->
                            <!-- <div class="img-box">
                                <img src="{{ asset('img/slide1.jpg')}}" data-src="">
                            </div> -->

                            <div class="img-box" style="background-image:url({{ asset('img/slide1.jpg')}})">

                            </div>
                            <div class="text-box">
                                <p class="tag">음악</p>
                                <p class="point">+100포인트</p>
                                <p class="title">어떤류의 음악을 좋아하시나요?</p>
                                <p class="date">2018-11-26 ~ 2018-12-31</p>
                            </div>
                        </a>
                    </li>

                    <li>
                        <a>
                            <!-- -->
                            <!-- <div class="img-box">
                                <img src="{{ asset('img/slide1.jpg')}}" data-src="">
                            </div> -->

                            <div class="img-box" style="background-image:url({{ asset('img/slide1.jpg')}})">

                            </div>
                            <div class="text-box">
                                <p class="tag">음악</p>
                                <p class="point">+100포인트</p>
                                <p class="title">어떤류의 음악을 좋아하시나요?</p>
                                <p class="date">2018-11-26 ~ 2018-12-31</p>
                            </div>
                        </a>
                    </li>

                    <li>
                        <a>
                            <!-- -->
                            <!-- <div class="img-box">
                                <img src="{{ asset('img/slide1.jpg')}}" data-src="">
                            </div> -->

                            <div class="img-box" style="background-image:url({{ asset('img/slide1.jpg')}})">

                            </div>
                            <div class="text-box">
                                <p class="tag">음악</p>
                                <p class="point">+100포인트</p>
                                <p class="title">어떤류의 음악을 좋아하시나요?</p>
                                <p class="date">2018-11-26 ~ 2018-12-31</p>
                            </div>
                        </a>
                    </li>

                    <li>
                        <a>
                            <!-- -->
                            <!-- <div class="img-box">
                                <img src="{{ asset('img/slide1.jpg')}}" data-src="">
                            </div> -->

                            <div class="img-box" style="background-image:url({{ asset('img/3step.png')}})">

                            </div>
                            <div class="text-box">
                                <p class="tag">음악</p>
                                <p class="point">+100포인트</p>
                                <p class="title">어떤류의 음악을 좋아하시나요?</p>
                                <p class="date">2018-11-26 ~ 2018-12-31</p>
                            </div>
                        </a>
                    </li>

                    <li>
                        <a>
                            <!-- -->
                            <!-- <div class="img-box">
                                <img src="{{ asset('img/slide1.jpg')}}" data-src="">
                            </div> -->

                            <div class="img-box" style="background-image:url({{ asset('img/slide1.jpg')}})">

                            </div>
                            <div class="text-box">
                                <p class="tag">음악</p>
                                <p class="point">+100포인트</p>
                                <p class="title">어떤류의 음악을 좋아하시나요?skldfnsdklfklsjdklfjskldfjklsdfjklsdjlfkljsklfjsdklfjl</p>
                                <p class="date">2018-11-26 ~ 2018-12-31</p>
                            </div>
                        </a>
                    </li>

                    <li>
                        <a>
                            <!-- -->
                            <!-- <div class="img-box">
                                <img src="{{ asset('img/slide1.jpg')}}" data-src="">
                            </div> -->

                            <div class="img-box" style="background-image:url({{ asset('img/slide1.jpg')}})">

                            </div>
                            <div class="text-box">
                                <p class="tag">음악</p>
                                <p class="point">+100포인트</p>
                                <p class="title">어떠나ㅓㄹ아ㅓ비ㅓ제ㅐㅓ재ㅔ더ㅐㅔ서배ㅔㅓ재ㅔㅓㅐㅔㅂ저대나우라ㅣ너ㅣ아ㅣㅓsdfsdffsdf라ㅣ;ㅔ</p>
                                <p class="date">2018-11-26 ~ 2018-12-31</p>
                            </div>
                        </a>
                    </li>
                    <!-- endforeach -->

                </ul>
            </div>

            <!-- 페이지네이션 -->
            <div>
                
            </div>

            <!-- iframe -->
            <div>
                
            </div>
        </div>
    </div>
</div>

<script>
    
</script>
@endsection

