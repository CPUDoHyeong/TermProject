@extends('layouts.master')

@section('header')
    @include('layouts.header')
@endsection

@section('nav')
    @include('user.user_nav')
@endsection

@section('content')
<link rel="stylesheet" href="{{ asset('css/user/user.css') }}">
    @if(session()->has('msg'))
        <script>
            alert("{{ session('msg') }}");
        </script>
    @endif
        <div class="content">
            <div class="contentbox">
                <div class="contentbox-header">
                    <p>비밀번호 변경</p>
                </div>

                <div class="contentbox-content">
                    <form accept-charset="UTF-8" action="{{ route('user.pwUpdate') }}" class="edit-user" method="POST">
                        @csrf
                        <div>
                            <input name="email" size="30" type="hidden" value="{{ Auth::user()->email }}">
                        </div>
                        <ul>
                            <!-- <li>
                                <label class="field-name">현재 비밀번호</label>
                                <input class="user-input" id="current-pw" name="current_pw" size="30" type="password" value="">
                                <label id="error-input"></label>
                            </li> -->
                            <li>
                                <label class="field-name">새 비밀번호</label>
                                <input class="user-input" id="new-pw" name="new_pw" size="30" type="password" value="" autofocus>
                            </li>
                            <li>
                                <label class="field-name">비밀번호 확인</label>
                                <input class="user-input" id="new-pw-check" name="new_pw_check" size="30" type="password" value="">
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