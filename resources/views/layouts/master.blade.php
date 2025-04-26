<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Todo</title>
    @vite(['resources/js/app.js', 'resources/css/app.css'])
</head>
<body>

<div class="container mx-auto max-w-2xl">
    <nav class="bg-white shadow-sm sticky top-0 z-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">

                <div class="flex items-center">
                    <a href="{{ route('tasks.index') }}" class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-500" fill="none"
                             viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                        </svg>
                        <span class="ml-2 text-xl font-bold text-gray-800">Todo App</span>
                    </a>

                    <div class="hidden md:ml-8 md:flex md:space-x-8">
                        <a href="{{ route('tasks.index') }}"
                           class="border-blue-500 text-gray-900 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                            Tasks
                        </a>
                        <a href=""
                           class="border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                            Categories
                        </a>
                    </div>
                </div>

                <div class="hidden md:ml-4 md:flex md:items-center">
                    <div class="ml-4 flex items-center md:ml-6">
                        <div class="relative ml-3">
                            <div class="flex items-center space-x-4">
                                @auth()
                                    <span class="text-gray-600 text-sm font-medium">{{ Auth::user()->name }}</span>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        @method('DELETE')

                                        <button
                                            class="text-gray-500 hover:text-gray-700 text-sm font-medium flex items-center cursor-pointer">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none"
                                                 viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                      d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                                            </svg>
                                            Logout
                                        </button>
                                    </form>
                                @else
                                    <a href="/register"
                                       class="text-gray-500 hover:text-gray-700 text-sm font-medium flex items-center cursor-pointer">
                                        Sign up
                                    </a>
                                    <a href="/login"
                                       class="text-gray-500 hover:text-gray-700 text-sm font-medium flex items-center cursor-pointer">
                                        Log in
                                    </a>
                                @endauth
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <main class="mt-6">
        <h1 class="text-xl font-semibold mb-6">@yield('heading')</h1>

        @session('success')
        <p class="mb-10 mx-auto bg-green-300 text-green-700 max-w-md p-5 rounded">
            {{ $value }}
        </p>
        @endsession

        <div>
            @yield('content')
        </div>
    </main>
</div>

</body>
</html>
