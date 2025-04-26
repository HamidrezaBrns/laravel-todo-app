@extends('layouts.master')

@section('heading', 'Your Categories')

@section('content')
    <div>
        @foreach($categories as $category)
            {{ $category->name }}
        @endforeach
    </div>
@endsection
