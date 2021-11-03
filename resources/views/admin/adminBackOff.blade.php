<!doctype html>
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
            margin-bottom: 2%;
            right: 0;
            overflow: auto;
            /*background-color: red;*/
        }
    </style>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown">
                            <a href="#" class="btn btn-warning nav-link dropdown-toogle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>{{ __('Messages') }}</a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <nav class="dropdown-item">
                                    <ul>
                                        <li><span>{{ __('Message 1') }}</span></li>
                                    </ul>
                                </nav>
                                <a class="dropdown-item" href="{{ url('/admin/messages') }}" role="button" class="btn btn-primary"><span>{{ __('View all') }}</span></a>
                            </div>
                        </li>

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

                                    <a class="dropdown-item" href="{{ route('home') }}">Home</a>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        <div id="main" class="" style="">
            <!-- Message test Vue
                @{{message}}
            -->
            <div class="container-fluid">
                <div class="row" style="margin-top: 1%">
                    @include('admin.sideBar')
                    <div class="col-md-10">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer class="bg-dark text-default">
        <style>
            footer {
            position: relative;
            left: 0;
            bottom: 0;
            width: 100%;
            overflow: auto;
            text-align: center;
            color: rgb(218, 218, 218);
        }
        </style>
        <div>
            <span>{{ __('copyright logitek@2021') }}</span>
        </div>
    </footer>
</body>
</html>
