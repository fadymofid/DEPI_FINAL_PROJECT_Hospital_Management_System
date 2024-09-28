<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="../../../public/assets/css/maicons.css">

    <link rel="stylesheet" href="../../../public/assets/css/bootstrap.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.6.0/css/fontawesome.min.css" integrity="sha384-NvKbDTEnL+A8F/AA5Tc5kmMLSJHUO868P+lDtTpJIeQdGYaUIuLr4lVGOEA1OcMy" crossorigin="anonymous">
    <link rel="stylesheet" href="../../../public/assets/vendor/owl-carousel/css/owl.carousel.css">

    <link rel="stylesheet" href="../../../public/assets/vendor/animate/animate.css">

    <link rel="stylesheet" href="../../../public/assets/css/theme.css">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles
    <style>
        body{
            background-color: #00D9A5;
        }
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
<body class="font-sans antialiased">
<x-banner />



<!-- Language Switcher -->
<div class="lang-switcher">
    @if (app()->getLocale() === 'ar')
        <a href="{{ route('changeLang', ['locale' => 'en']) }}">English</a>
    @else
        <a href="{{ route('changeLang', ['locale' => 'ar']) }}">العربية</a>
    @endif
</div>
<div class="">
    @livewire('navigation-menu')

    <!-- Page Heading -->
    @if (isset($header))
        <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                {{ $header }}
            </div>
        </header>
    @endif

    <!-- Page Content -->
    <main>
        {{ $slot }}
    </main>
</div>

@stack('modals')

@livewireScripts
</body>
</html>
