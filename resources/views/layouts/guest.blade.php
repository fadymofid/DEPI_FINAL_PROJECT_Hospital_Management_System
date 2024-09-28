<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>

        .lang-switcher {
            display: flex;
            justify-content:center;
            gap: 10px;
            padding: 10px;
            text-align: center;
        }

        .lang-switcher a {
            text-decoration: none;
            color: #252424;
            font-weight: bold;
        }

        .lang-switcher a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
<!-- Language Switcher -->
<div class="lang-switcher">
    @if (app()->getLocale() === 'ar')
        <a href="{{ route('changeLang', ['locale' => 'en']) }}">English</a>
    @else
        <a href="{{ route('changeLang', ['locale' => 'ar']) }}">العربية</a>
    @endif
</div>

<div class="font-sans text-gray-900 antialiased">
    {{ $slot }}
</div>
</body>
</html>
