<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"
      dir="{{ LaravelLocalization::getCurrentLocaleDirection() }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <link rel="icon" href="{{ asset('laravel-favicon.png') }}" type="image/ico">
    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.2.1/dist/alpine.js" defer></script>
</head>
<body>
<div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
    @auth
        <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 underline">Dashboard</a>
    @else
        @if (Route::has('login') && !Route::is('login'))
            <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Login</a>
        @endif

        @if (Route::has('register') && !Route::is('register'))
            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
        @endif
    @endif
    <a href="{{ LaravelLocalization::getLocalizedURL(getOtherLang(), null, [], true) }}"
       class="ml-4 text-sm text-gray-700 underline">{{ LaravelLocalization::getSupportedLocales()[getOtherLang()]['native'] }}</a>
</div>


<div class="font-sans text-gray-900 antialiased">
    {{ $slot }}
</div>
</body>
</html>
