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
    <main class="mt-4">
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
