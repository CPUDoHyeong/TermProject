@extends('layouts.template')
@section('title')
  글 쓰기 폼
@endsection

@section('content')
<div class="container">
  <h2>새 글쓰기 폼</h2>
  <p>아래의 모든 필드를 채워주세요.</p>
  <form action="write" method="post">
    @csrf
    <div class="form-group">
      <label for="title">제목:</label>
      <input type="text" class="form-control" id="title" name="title"
      required>
    </div>
    <div class="form-group">
      <label for="writer">작성자:</label>
      <input type="text" class="form-control" id="writer" name="writer"
      value={{old('writer')}}>
      @if($errors->has('writer'))
        <span class="help-block">
          <strong>{{$errors->get('writer')}}</strong>
        </span>
      @endif
    </div>
    <div class="form-group">
      <label for="content">내용:</label>
      <textarea class="form-control" rows="5" id="content" name="content"
      required></textarea>
    </div>
    <button type="submit" class="btn btn-primary">글등록</button>
    <a class="btn btn-danger" href="bbs">목록보기</a>
  </form>
</div>
  

@endsection