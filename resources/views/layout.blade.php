<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->

    <script src="{{ mix('js/app.js') }}"></script>
    <script src="{{ mix('js/accordion.js') }}" defer></script>
    <script src="https://kit.fontawesome.com/bf0671b196.js" crossorigin="anonymous"></script>


    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link rel="stylesheet" href="{{ 'bootstrap/css/bootstrap.css' }}">
    <link rel="stylesheet" href="{{ mix('css/style.css') }}">

</head>
<body class="antialiased">

<div class="basic_header">
    <div id="menuArea">
        Cyril
        <a href="/" class="logo"><h1>Priki</h1></a>
        <a href="/references" class="menu">Références</a>
        @if(Auth::check())
            @if(Auth::user()->role->slug == "MOD")
                <a href="/practices" class="menu">Pratiques</a>
            @endif
        @endif
    </div>
    <div id="connexion" class="hidden sm:flex sm:items-center sm:ml-6">
        @if(Auth::check())


            <x-dropdown align="right" width="48">
                <x-slot name="trigger">
                    <button
                        class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                        <div>{{ Auth::user()->fullname }} {{ Auth::user()->name }}</div>

                        <div class="ml-1">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                      d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                      clip-rule="evenodd"/>
                            </svg>
                        </div>
                    </button>
                </x-slot>

                <x-slot name="content">
                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-dropdown-link :href="route('logout')"
                                         onclick="event.preventDefault();
                                                this.closest('form').submit();">
                            {{ __('auth.Logout') }}
                        </x-dropdown-link>
                    </form>
                </x-slot>
            </x-dropdown>
        @else
            <a class="buttonLink btn btn-primary" href="/practices">{{ __('auth.Login') }}</a> <a
                class="buttonLink btn btn-primary" href="/register">{{ __('auth.Register') }}</a>

        @endif

    </div>
</div>
@include('flash-message')


@yield('content')


</body>
</html>
