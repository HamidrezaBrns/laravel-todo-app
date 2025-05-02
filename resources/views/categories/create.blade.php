@extends('layouts.master')

@section('heading', 'Add Category')

@section('content')
    <form method="post" action="{{ route('categories.store') }}">
        @csrf

        <div class="my-6">
            <label for="name" class="input-label">Name</label>
            <input
                @class(['cat-input', 'outline-red-500' => $errors->has('name')])
                type="text"
                id="name"
                name="name"
                value="{{ old('name') }}"
                autofocus
                placeholder="Category Name"
            />

            @error('name')
            <p class="error">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex gap-2 items-center mt-10">
            <button class="btn-submit">Store</button>
            <a href="{{ route('categories.index') }}" class="btn-simple">
                Cancel
            </a>
        </div>
    </form>

@endsection
