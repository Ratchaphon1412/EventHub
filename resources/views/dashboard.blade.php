@extends('layouts.applicationcontrol')

@section('content')
    <a href="{{ route('question.create', ['event' => $event]) }}">
        <h3 class="text-lg font-medium text-gray-800">Create Question</h3>
        <p class="text-gray-600 text-base"></p>
    </a>
    <a href="{{ route('question.answer', ['event' => $event]) }}">
        <h3 class="text-lg font-medium text-gray-800">Answer Question</h3>
        <p class="text-gray-600 text-base"></p>
    </a>
@endsection
