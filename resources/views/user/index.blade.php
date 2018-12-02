

@extends('layouts.master')


@section('header')
    @include('layouts.header')
@endsection

@section('nav')
    @include('user.user_nav')
@endsection



@section('content')

<link rel="stylesheet" href="{{ asset('css/user/user.css?d') }}">
    @if(session()->has('msg'))
        <script>
            alert("{{ session('msg') }}");
        </script>
    @endif
        <div class="content">
            <div class="contentbox">
                <div class="contentbox-header">
                    <p>기본정보</p>
                </div>

                <div class="contentbox-content">
                    <form accept-charset="UTF-8" action="{{route('user.userUpdate')}}" class="edit-user" method="POST">  
                    @csrf
                        <ul>
                            <li>
                                <label class="field-name">이름</label>
                                <input class="user-input" id="user-name" name="name" size="30" type="text" value="{{ Auth::user()->name }}">
                            </li>
                            <li>
                                <label class="field-name">이메일</label>
                                <input class="user-input" id="user-id" name="email" size="30" type="text" value="{{ Auth::user()->email }}" readonly>
                            </li>
                            <li>
                                <div class="btn-group">   
                                    <button class="update-btn" id="updateBasic">변경하기</button>
                                </div>
                            </li>
                        </ul>
                    </form>
                </div>
            </div>
            
        </div>
        
    </div>
</div>

@endsection