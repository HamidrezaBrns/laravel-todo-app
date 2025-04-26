@extends('layouts.master')

@section('heading', 'Registration')

@section('content')
    <form method="post" action="/register">
        @csrf

        <div class="mb-4">
            <label for="name">Name</label>
            <input
                @class(['task-input', 'outline-red-500' => $errors->has('name')])
                type="text"
                id="name"
                name="name"
                value="{{ old('name') }}"
                placeholder="Full Name"
            />

            @error('name')
            <p class="error">{{ $message }}</p>
            @enderror
        </div>

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

        <div class="mb-4">
            <label for="password_confirmation">Confirm password</label>
            <input
                @class(['task-input', 'outline-red-500' => $errors->has('password_confirmation')])
                type="password"
                id="password_confirmation"
                name="password_confirmation"
                placeholder="Confirm your password"
            />

            @error('password_confirmation')
            <p class="error">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex gap-2 items-center">
            <button class="btn-submit">
                Register
            </button>
            <a href="/" class="btn-simple">
                Cancel
            </a>
        </div>
    </form>

@endsection
