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

<div class="content">
    <div class="contentbox">
        <div class="contentbox-header">
            @if(session()->has('msg'))
                <script>
                    alert("{{ session('msg') }}");
                </script>
            @endif

            <!-- 검색 form -->
            <!-- <form class="search-form" method="post"> -->
                
            <div>
                <div class="tag-combo">
                    <select class="combo-main" id="themaCombo" name='thema'>
                        <option value=''> 전체 </option>
                        <option value='sport'>스포츠</option>
                        <option value='social'>사회</option>
                        <option value='beauty'>뷰티</option>
                        <option value='it'>IT</option>
                        <option value='brad'>방송</option>
                        <option value='food'>음식</option>
                        <option value='travel'>여행</option>
                        <option value='health'>건강</option>
                        <option value='hobby'>취미</option>
                        <option value='kid'>육아</option>
                        <option value='animal'>반려</option>
                        <option value='bank'>금융</option>
                        <option value='love'>사랑</option>
                        <option value='foreign'>해외</option>
                        <option value='edu'>교육</option>
                        <option value='life'>생활</option>
                        <option value='movie'>영화</option>
                        <option value='music'>음악</option>
                        <option value='etc'>기타</option>
                    </select>
                </div>

                <div class="search-box">
                    <input type="text" placeholder="검색어 입력" name="search_val" autofocus="true" id="search">
                    <button id="search_btn"><i class="fa fa-search"></i></button>
                </div>
            </div>
            <!-- </form> -->

            <!-- 검색 조건 jquery ajax -->
            <script>
                $(document).ready(function() {
                    $('#search_btn').click(function(){
                        $.ajax({
                            url: "{{ route('search_survey') }}",
                            method: "POST",
                            data:{
                            _token: '{!! csrf_token() !!}',
                            thema: $('#themaCombo option:selected').val(),
                            search_val: $('#search').val()
                            },
                            success: function(data){
                                // 서버에서는 contentbox_content의 내용을 만들고 jquery에서는
                                // 그 만든 것을 보여주기만 하면된다.
                                $('.contentbox-content').html(data);
                            }
                        })
                    });
                });
                
            </script>
        </div>
        
        
        <div class="contentbox-content">
            <!-- 설문조사 목록 보여주기 -->

            <div class="survey-list">
                <ul id="item_list">
                    
                    <!-- foreach -->
                    <!--
                        또, end_date가 현재보다 작은경우는 설문종료를 표시한다.
                     -->
                    @foreach($list as $row)

                    <li>
                        <a href="{{ url('surveyView/'.$row->survey_id) }}">
                            <div class="img-box" style="background-image:url({{ asset('uploads/'.$row->img_url) }})">
                            </div>

                            <div class="text-box">
                                <p class="tag">{{ strtoupper($row->thema) }}</p>
                                <p class="point">+{{ $row->point }}포인트</p>
                                <p class="title">{{ $row->title }}</p>

                                @if($row->end_date < date("Y-m-d"))
                                <p class="date">설문종료</p>

                                @else
                                <p class="date">{{ substr($row->start_date, 0, 10) }} ~ {{ substr($row->end_date, 0, 10) }}</p>
                                @endif
                            </div>
                        </a>
                    </li>
                    @endforeach

                </ul>
                
            </div>

            <!-- 페이지네이션 -->
            <div class="pagination_div">
                {{ $list->render() }}
            </div>
        </div>

    </div>
</div>

<!-- 페이지네이션 부분의 링크 클리시 ajax로 처리 -->
<script>
    $(document).on('click', '.pagination a', function(e) {
        e.preventDefault();
        var page = $(this).attr('href').split('page=')[1];
        getList(page);
    });

    // 서버에서는 contentbox_content의 내용을 만들고 jquery에서는
    // 그 만든 것을 보여주기만 하면된다.
    function getList(page) {
        // console.log('getting list for page = ' + page);

        $.ajax({
            url: 'whole_survey/ajax?page=' + page

        }).done(function(data) {
            // console.log(data);
            $('.contentbox-content').html(data);
        });
    }
</script>
@endsection

