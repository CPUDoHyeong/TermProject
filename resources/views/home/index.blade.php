@extends('layouts.master')

@section('header')
    @include('layouts.header')
@endsection

@section('content')
<section>
        <div class="thumbnail">
            
            <div class="content">
                <h2>설문조사, 더 쉽게 무료로!</h2>
                <p>
                    <span>
                        어려운 설문조사, 투표, 입력양식 등을 쉽게 만들고
                        <br>
                        무료로 진행할 수 있습니다.
                    </span>
                </p>
            </div>
        </div>

        
        <div class="container-full">
            <div class="container">
                <div class="row">
                    <h2>3단계면 끝!</h2>
                    <p> 
                        e-survey는 온라인 설문조사 서비스입니다. 
                        <br>
                        초보자도 쉽게 설문을 만들 수 있으며 누구나 설문에 참여 할 수 있습니다.
                    </p>
                    <ul class="list">
                        <li class="keyword1">
                            <div>
                                <img src="{{ asset('img/1step.png') }}" width="212" height="150">
                            </div>
                            <strong>1단계 : 만들기(시작)</strong>
                            <span>
                                e-survey에 접속하여 설문을 만듭니다.
                            </span>
                        </li>
                        <li class="keyword2">
                            <div>
                                <img src="{{ asset('img/2step.png') }}" width="141" height="150">
                            </div>
                            <strong>2단계 : 참여하기(진행)</strong>
                            <span>
                                사용자들이 설문에 참여합니다.
                            </span>
                        </li>
                        <li class="keyword3">
                            <div>
                                <img src="{{ asset('img/3step.png') }}" width="192" height="150">
                            </div>
                            <strong>3단계 : 분석하기(끝)</strong>
                            <span>
                                각종 차트와 표로 결과를 나타냅니다.
                            </span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
            
        <div class="slideArticle">
        
            <div class="dotDiv" style="text-align:center">
                <span class="dot" onclick="currentSlide(1)"></span> 
                <span class="dot" onclick="currentSlide(2)"></span> 
                <span class="dot" onclick="currentSlide(3)"></span> 
            </div>
        
            <div class="inner">
                <div class="explainDiv">
                    <strong class="explain">쉬운 설문 제작</strong>
                    <strong class="explain">편리한 답변수집</strong>
                    <strong class="explain">상세한 결과 분석</strong>
                </div>
            
                <div class="buttons">
                    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                    <a class="next" onclick="plusSlides(1)">&#10095;</a>
                </div>

                <div class="slideshow-container">

                    <div class="mySlides fade">                   
                        <img src="{{ asset('img/slide1.jpg') }}" style="width:100%">
                    </div>
                    
                    <div class="mySlides fade">
                        <img src="{{ asset('img/slide2.jpg') }}" style="width:100%">
                    </div>
                    
                    <div class="mySlides fade">
                        <img src="{{ asset('img/slide3.jpg') }}" style="width:100%">
                    </div> 
                </div>
            </div>
        </div>
    </section>

     <script>
        var slideIndex = 1;
        showSlides(slideIndex);
        
        function plusSlides(n) {
            showSlides(slideIndex += n);
        }
        
        function currentSlide(n) {
            showSlides(slideIndex = n);
        }
        
        function showSlides(n) {
            var i;
            // mySlides를 class로하는 element들을 가져온다.(배열로 저장됨)
            var slides = document.getElementsByClassName("mySlides");
            // dots를 class로하는 element들을 가져온다.
            var dots = document.getElementsByClassName("dot");
            // explain을 class로하는 element들을 가져온다.
            var explains = document.getElementsByClassName("explain");

            /*
            n이 슬라이드 개수보다 크다면
            예를들어 사용자가 3번째 슬라이드에서 next를 누르면
            4가 n으로 들어오게 되는데
            그럴 때는 첫번째 슬라이드를 보여주어야 하므로
            1로 바꿔주는 것이다.
            
            또 n이 1보다 작다면
            예를들어 사용자가 1번째 슬라이드에서 prev를 누르면
            0이 n으로 들어오게 되는데
            그럴 때는 마지막 슬라이드를 보여주어야 하므로
            슬라이드의 길이를 가져와서 마지막 슬라이드를 보여주는 것이다.
            */
            if (n > slides.length) {slideIndex = 1}
            if (n < 1) {slideIndex = slides.length}
                
            /*

            */
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none"; 
                explains[i].style.display = "none";
            }

            /*
            dot
            */
            for (i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace(" active", "");
            }
            slides[slideIndex-1].style.display = "block";
            explains[slideIndex-1].style.display = "block";
            dots[slideIndex-1].className += " active";
        }
    </script>

    <!-- js -->
    <script src="{{ asset('js/help/help_nav.js') }}"></script>

@endsection

@section('footer')
    @include('layouts.footer')
@endsection