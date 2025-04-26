@extends('layouts.master')

@section('heading', 'Register')

@section('content')
    <form method="post" action="/register">
        @csrf

        <div class="mb-4">
            <label for="name">Full Name</label>
            <input type="text" id="name" name="name"
                   @class(['task-input outline-blue-300', 'outline-red-500' => $errors->has('name')])
                   value="{{ old('name') }}">

            @error('name')
            <p class="error">{{ $message }}</p>
            @enderror
        </div>

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

        <div class="mb-4">
            <label for="password_confirmation">Confirm Password</label>
            <input type="password" id="password" name="password_confirmation"
                    @class(['task-input outline-blue-300', 'outline-red-500' => $errors->has('password_confirmation')])
            >

            @error('password_confirmation')
            <p class="error">{{ $message }}</p>
            @enderror
        </div>

        <div class="mt-6">
            <button class="btn">Register</button>
        </div>
    </form>

@endsection