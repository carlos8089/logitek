<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>{{ 'Logitek' }}</title>
</head>
<body>
    <div class="container">
        <nav class="navbar navbar-light">
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ">
                    <li class="nav-item">
                        
                    </li>
                    
                </ul>
            </div>   
        </nav>
    </div>
    
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href=" {{ url('/') }}">Logitek</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto " class="form-inline my-2 my-lg-0">
            <li class="nav-item">
                <a href=" {{url('/login') }} " class="nav-link">Se connecter</a>
            </li>
            <li class="nav-item">
                <a href=" {{url('/register') }} " class="nav-link">S'Enregistrer</a>
            </li>
        </div>
      </nav>
    <div class="flex-center position-ref full-height">
        <div class="content">
            <div class="row">
                    
            </div>

            @yield('main')
        </div>
    </div>
    <footer>
        
    </footer>
    
    
</body>
</html>