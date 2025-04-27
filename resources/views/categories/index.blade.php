@extends('layouts.master')

@section('heading', 'Your Categories')

@section('content')
    <div class="mb-4">
        <a href="{{ route('categories.create') }}" class="text-blue-500 hover:underline">New Category</a>
    </div>

    <ul class="list-disc list-inside">
        @foreach($categories as $category)
            <li>
                <a href="{{ route('categories.show', $category) }}">
                    {{ $category->name }}
                </a>
            </li>
        @endforeach
    </ul>
@endsection
