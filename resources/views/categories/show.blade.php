@extends('layouts.master')

@section('heading', "Category $category->name")

@section('content')
    @foreach($category->tasks as $task)
        <div class="border-b">
            <h2 class="font-semibold mb-1">{{ $task->title }}</h2>
            <div>{{ $task->description }}</div>
        </div>

    @endforeach

@endsection
