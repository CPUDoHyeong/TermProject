
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