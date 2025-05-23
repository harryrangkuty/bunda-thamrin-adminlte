<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="icon" href="images/bunda-thamrin-logo.png" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans text-gray-900 antialiased">
    <div class="relative min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gradient-to-tr from-[#0f0c29] via-[#302b63] to-[#24243e] overflow-hidden"
        style="background-image: url('{{ asset('images/wallpaper-bunda-thamrin.jpeg') }}'); background-size: cover; background-position: center;">
        <div class="absolute inset-0 bg-gradient-to-tr from-[#0f0c29] via-[#302b63] to-[#24243e] opacity-95"></div>
        <div class="relative z-10 w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
            <div class="flex justify-center mb-4">
                <a href="/">
                    <img src="{{ asset('images/bunda-thamrin-logo.png') }}" alt="Logo RS Bunda Thamrin"
                        class="w-24" />
                </a>
            </div>
            {{ $slot }}
        </div>
    </div>
</body>
</html>
