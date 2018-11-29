<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>할일 정보</h1>
    <p>작 업 : {{ $task['name'] }} </p>
    <p>기 한 : {{ $task['due_date'] }} </p>
    <!-- 새너타이징이라고 함 -->
    <!-- !! 를 붙이면 원본 그대로 출력한다. -->
    <!-- <p>comment : {{!! $task['comment'] !!}} </p> -->
    <p>comment : {{ $task['comment'] }} </p>
</body>
</html>