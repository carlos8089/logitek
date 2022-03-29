<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <style type="text/css">
            html, body {
                height: 10%;
                margin: 0;
                /*background-color: green*/
            }
            #app{
                position: relative;
                left: 0;
                top: 0;
                bottom:0;
                right: 0;
                overflow: auto;
                /*background-color: red;*/
            }
        </style>
        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        @bukStyles
    </head>
    <body>
        <div id="app">
            <nav class="navbar navbar-expand-md navbar-dark bg-primary shadow-sm">
                <div class="container-fluid">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        @yield('left-nav-menu')

                        <!-- Right Side Of Navbar -->
                        @yield('right-nav-menu')
                        <ul class="navbar-nav ml-auto">
                            <!-- Authentication Links -->
                            @guest
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                                @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                    </li>
                                @endif
                            @else
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }}
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>

                                        <a class="dropdown-item" href="{{ route('backoffhome') }}">Home</a>
                                    </div>
                                </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </nav>
            <div id="main" class="" style="">
                <!-- //Message test Vue// -->
                <!--
                    <div id="vue">
                        <span v-bind:title="message">
                            {{ __('Hover this!') }}
                        </span>
                        @{{ message }}
                        <div id="test">
                            @{{ foo }}
                            <button v-on:click="foo = 'baz'">Change it</button>
                        </div>
                    </div>
                -->
                @yield('content')
            </div>
        </div>
        <footer class="">
            <style>
                /*
                footer {
                position: relative;
                left: 0;
                bottom: 0;
                width: 100%;
                overflow: auto;
                color: rgb(218, 218, 218);
                margin-top: 10%;
                */
            }
            </style>
            @yield('footer')
            <nav class="navbar navbar-dark bg-dark sticky-bottom">
                <span class="navbar-brand mb-0 h1">{{ __('@ 2022 Logitek') }}</span>
                <ul class="navbar-nav mr-auto">

                </ul>
                <ul class="navbar-nav ml-auto">

                </ul>
            </nav>
        </footer>
        @bukScripts
    </body>
</html>
