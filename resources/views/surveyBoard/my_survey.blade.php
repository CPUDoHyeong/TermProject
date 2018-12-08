@extends('layouts.master')

@section('header')
    @include('layouts.header')
@endsection

@section('nav')
    @include('surveyBoard.survey_nav')
@endsection

@section('content')

<link rel="stylesheet" href="{{ asset('css/user/user.css?d') }}">
<link rel="stylesheet" href="{{ asset('css/survey/main.css?d')}}">
<div class="content">
    <div class="contentbox">
        <div class="contentbox-header">
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
                    
                </form>
            </div>
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

@endsection