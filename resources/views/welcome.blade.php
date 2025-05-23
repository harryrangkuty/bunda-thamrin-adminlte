<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>SIMRS RS Bunda Thamrin</title>
    <link rel="icon" href="{{ asset('images/bunda-thamrin-logo.png') }}" type="image/x-icon" />
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;700&family=Roboto&display=swap"
        rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="relative min-h-screen font-roboto text-white overflow-hidden bg-fixed bg-center bg-cover flex items-center justify-center"
    style="background-image: url('{{ asset('images/wallpaper-bunda-thamrin.jpeg') }}');">
    <div class="fixed inset-0 bg-[rgba(0,0,30,0.8)] z-0"></div>
    <div class="container relative z-10 flex flex-col justify-center items-center text-center h-screen p-4">
        <img src="{{ asset('images/bunda-thamrin-logo.png') }}" alt="Logo RS Bunda Thamrin" class="w-24 mb-8" />
        <h1
            class="font-orbitron font-bold text-5xl tracking-widest uppercase text-[#FF2D20] drop-shadow-[0_0_10px_#FF2D20] mb-4">
            SIMRS RSU Bunda Thamrin
        </h1>
        <p class="text-lg mb-12 text-gray-300 drop-shadow-lg">
            Sistem Informasi Manajemen Rumah Sakit yang Modern dan Terintegrasi
        </p>
        <div class="flex justify-center">
            <img src="{{ asset('images/mascot.png') }}" alt="Maskot RS Bunda Thamrin"
                class="w-20 md:w-48 animate-bounce" />
        </div>
        <nav>
            @if (Route::has('login'))
                @auth
                    <a href="{{ url('/dashboard') }}"
                        class="inline-block border-2 border-[#FF2D20] text-white rounded-full font-semibold text-lg px-8 py-3 mx-2 shadow-[0_0_15px_#FF2D20] transition transform hover:scale-110 hover:bg-[#FF2D20] hover:shadow-[0_0_30px_#FF2D20]">Dashboard</a>
                @else
                    <a href="{{ route('login') }}"
                        class="inline-block border-2 border-[#FF2D20] text-white rounded-full font-semibold text-lg px-8 py-3 mx-2 shadow-[0_0_15px_#FF2D20] transition transform hover:scale-110 hover:bg-[#FF2D20] hover:shadow-[0_0_30px_#FF2D20]">Log
                        In</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                            class="inline-block 0 border-2 border-[#FF2D20] text-white rounded-full font-semibold text-lg px-8 py-3 mx-2 shadow-[0_0_15px_#FF2D20] transition transform hover:scale-110 hover:bg-[#FF2D20] hover:shadow-[0_0_30px_#FF2D20]">Register</a>
                    @endif
                @endauth
            @endif
        </nav>
    </div>
    <footer class="absolute bottom-4 w-full text-center text-sm text-gray-400 select-none font-roboto z-10">
        &copy; {{ date('Y') }} Harry Rangkuty - All rights reserved
    </footer>
</body>
</html>