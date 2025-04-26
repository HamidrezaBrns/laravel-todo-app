@extends('layouts.master')

@section('heading', 'Log In')

@section('content')
    <form method="post" action="/login">
        @csrf

        <div class="mb-4">
            <label for="email">Email</label>
            <input
                @class(['task-input', 'outline-red-500' => $errors->has('email')])
                type="email"
                id="email"
                name="email"
                value="{{ old('email') }}"
                placeholder="Email Address"
            />

            @error('email')
            <p class="error">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="password">Password</label>
            <input
                @class(['task-input', 'outline-red-500' => $errors->has('password')])
                type="password"
                id="password"
                name="password"
                placeholder="Your Password"
            />

            @error('password')
            <p class="error">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex gap-2 items-center">
            <button class="btn-submit">
                Log in
            </button>
{{--            <a href="/" class="btn-simple">--}}
{{--                Cancel--}}
{{--            </a>--}}
        </div>
    </form>

@endsection
