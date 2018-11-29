@extends('layouts.master')

@section('content')
    <table>
        <thead>
            <tr>
                <th>할일</th>
                <th>기한</th>
            </tr>
        </thead>
        <tbody>
        @foreach($tasks as $task)
            <tr>
                <td>{{ $task['name'] }}</td>
                <td>{{ $task['due_date'] }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
