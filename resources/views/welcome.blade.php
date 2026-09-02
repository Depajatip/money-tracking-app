<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Money Tracking</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="">
    <header style="display: flex; align-items: center; justify-content: center; flex-direction: column; padding-top: 50px; font-size: 20px; font-weight: bold;">
        <p>Selamat Datang di Money Tracking App</p>
    </header>

    <div style="display: flex; align-items: center; justify-content: center; flex-direction: column; padding-top: 20px;">
        @if (Route::has('login'))
        <nav style="gap: 20px; display: flex; align-items: center; justify-content: center; flex-direction: row;">
            @auth
            <a
                href="{{ url('/dashboard') }}"
                class="">
                Dashboard
            </a>
            @else
            <a
                href="{{ route('login') }}"
                class="">
                Log in
            </a>

            @if (Route::has('register'))
            <a
                href="{{ route('register') }}"
                class="">
                Register
            </a>
            @endif
            @endauth
        </nav>
        @endif
    </div>


    @if (Route::has('login'))
    <div class="h-14.5 hidden lg:block"></div>
    @endif
</body>

</html>