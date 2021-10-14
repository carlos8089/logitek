@extends('layouts.app')
@section('content')
    <div class="container-fluid border-bottom" style="background-color:#f6f8fa">
        <div style="padding: 3% 20%">
            <div id="search-zone" class="d-flex justify-content-center">
                <form class="form-inline" action="{{ url('/search') }}" method="get">
                    <div class="col-9">
                        <input type="search" class="form-control mr-sm-2" placeholder="Rechercher un logiciel ou projet" aria-label="Search" name="stsearch" id="" style="width: 100%">
                    </div>
                    <div class="col-3">
                        <button class="btn btn-success my-2 my-sm-0" type="submit">Search</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Filtrer les solutions par badges -->
    <nav class="navbar navbar-expand bg-dark shadow-sm">
        <div class="container d-flex justify-content-center">
            <!-- Filtrer les solutions par catégories -->
            <div class="dropdown show d-inline-block" style="margin-right: 3%">
                <span class="navbar-item dropdown-toggle" style="color: white; padding:3%" type="button" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{ __('Catégories') }}
                </span>
                <div class="dropdown-menu">
                    @foreach ($categories as $categorie)
                        <a class="btn" href=" {{ route('fcat', ['name'=> $categorie->name]) }} "><span class="badge badge-primary badge-pill">{{ $categorie->name }}</span></a>
                    @endforeach
                </div>
            </div>
            <!-- Filtrer les solutions par plateformes -->
            <div class="dropdown show d-inline-block" style="margin-right: 3%">
                <span class="navbar-item dropdown-toggle" style="color: white; padding:5%" type="button" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{ __('Sous-categories') }}
                </span>
                <div class="dropdown-menu">
                    @foreach ($subcategories as $subcategorie)
                        <a class="btn" href="{{ route('fsubcat', ['name'=>$subcategorie->name]) }}"><span class="badge badge-primary badge-pill">{{ $subcategorie->name }}</span></a>
                    @endforeach
                </div>
            </div>
            <!-- Filtrer les solutions par os -->
            <div class="dropdown show d-inline-block" style="margin-right: 3%">
                <span class="navbar-item dropdown-toggle" style="color: white; padding:5%" type="button" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{ __('Platform') }}
                </span>
                <div class="dropdown-menu">
                    @foreach ($platforms as $platform)
                        <a class="btn" href="{{ route('fplatform', ['name'=>$platform->name]) }}"><span class="badge badge-primary badge-pill">{{ $platform->name }}</span></a>
                    @endforeach
                </div>
            </div>
        </div>
    </nav>
    @if ($nbsol == '0')
        <div class="container d-flex justify-content-center">
            <div class="" style="margin: 2%">
                <div class="" style="flex-direction: column">
                    <h3>
                        {{ __('Aucun résultat trouvé') }}
                    </h3>
                </div>
            </div>
        </div>
        <div class="container d-flex justify-content-center">
            <span>{{ __('Vérifiez l\'orthographe de votre recherche ~ Ou explorer parmi les catégories') }}</span>
        </div>
        <div class="container-fluid">
            @foreach ($categories as $categorie)
                <div class="card alert col-md-3 d-inline-block" style="background-color: #f6f8fa;  margin: 2%">
                    <h3><strong>
                        <a href="{{ route('fcat', ['name'=>$categorie->name]) }}">{{ $categorie->name }}</a>
                    </strong></h3>
                </div>
            @endforeach
        </div>

    @else
        <div class="container-fluid" style="margin-top: 3%">
            @foreach ($solutions ?? '' as $solution)
            <div class="card alert col-md-4 d-inline-block" style="background-color:#f6f8fa; margin: 0.2% 7% 3%">
                <nav class="navbar">
                    <div class="container-fluid">
                        <span class="navbar-brand">
                            <h2><strong>{{ $solution->name }}</strong></h2>
                        </span>
                        <span>
                            <h2><strong>{{ $solution->amount }}</strong></h2>
                        </span>
                    </div>
                </nav>
                <div class="container-fluid">
                    <h4>
                        <span class="badge badge-primary badge-pill">{{ $solution->category }}</span>
                        <span class="badge badge-primary badge-pill">{{ $solution->subcategory }}</span>
                        <span class="badge badge-primary badge-pill">{{ $solution->platform }}</span>
                    </h4>
                </div>
            </div>
    @endforeach
        </div>
    @endif
@endsection
