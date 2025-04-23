<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome | Event Manager</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 text-gray-800 font-sans leading-normal tracking-normal">

    <div class="min-h-screen flex flex-col items-center justify-center">
        <div class="text-center p-10 bg-white shadow-lg rounded-2xl w-full max-w-xl">
            <h1 class="text-4xl font-bold text-blue-600 mb-4">Welcome to Event Manager</h1>
            <p class="text-lg mb-6 text-gray-600">
                Organize, manage, and engage with your events seamlessly.
            </p>

            @auth
                <a href="{{ route('dashboard') }}"
                   class="inline-block px-6 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">
                    Go to Dashboard
                </a>
            @else
                <a href="{{ route('login') }}"
                   class="inline-block px-6 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition mr-2">
                    Login
                </a>
                <a href="{{ route('register') }}"
                   class="inline-block px-6 py-2 bg-gray-200 text-blue-600 rounded hover:bg-gray-300 transition">
                    Register
                </a>
            @endauth
        </div>
    </div>

</body>
</html>
