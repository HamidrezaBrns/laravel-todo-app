@extends('layouts.master')

@section('heading', 'Log In')

@section('content')
    <form method="post" action="/login">
        @csrf

        <div class="mb-4">
            <label for="email">Email</label>
            <input type="email" id="email" name="email"
                   @class(['task-input outline-blue-300', 'outline-red-500' => $errors->has('email')])
                   value="{{ old('email') }}">

            @error('email')
            <p class="error">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="password">Password</label>
            <input type="password" id="password" name="password"
                    @class(['task-input outline-blue-300', 'outline-red-500' => $errors->has('password')])
            >

            @error('password')
            <p class="error">{{ $message }}</p>
            @enderror
        </div>

        <div class="mt-6">
            <button class="btn">Log in</button>
        </div>
    </form>

@endsection