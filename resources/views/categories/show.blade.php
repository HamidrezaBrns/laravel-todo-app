@extends('layouts.master')

@section('heading', str($category->name)->upper())

@section('content')
    @foreach($category->tasks as $task)
        <x-task-card :$task/>
    @endforeach

@endsection
