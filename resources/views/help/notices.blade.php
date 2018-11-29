@extends('layouts.master')

@section('header')
    @include('layouts.header')
@endsection

@section('nav')
    @include('help.help_nav')
@endsection

@section('content')

<div class="content">
@if(session()->has('msg'))
    <script>
        alert("{{ session('msg') }}");
    </script>
@endif
            <div class="contentbox">
                <table>
                    <thead>
                        <tr>
                            <th scope="col" class="no">번호</th>
                            <th scope="col" class="title">제목</th>
                            <th scope="col" class="created">작성일</th>
                        </tr>
                    </thead>

                    <tbody>
                        <!-- DB에 있는 값을 반복문으로 보여준다 -->
                        @foreach($list as $row)
                        <tr>
                            <td class="no">{{ $row["id"]}}</td>
                            <td class="title">
                                <a href="help/view/{{$row["id"]}}">{{ $row["title"]}}</a>
                            </td>
                            <td class="created">{{ $row["regtime"]}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>  

            <!-- 글 작성 버튼 보여주는 div -->
            <div class="write-btn-wrapper">
                @if(Auth::user()['email'] == "master@master.com")
                    <a class="write-btn" href="{{ route('help.write_form')}}">글 작성</a>
                @endif
            </div>

            <!-- 페이지네이션 -->
            <div class="pagination_div">
                {{ $list->render() }}
            </div>
        </div>
    </div>
</div>

@endsection