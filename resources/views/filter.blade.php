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
                        <a class="btn" href="{{ route('fsubcat', ['id'=>$subcategorie->id]) }}"><span class="badge badge-primary badge-pill">{{ $subcategorie->name }}</span></a>
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
                        <a class="btn" href="{{ route('fplatform', ['id'=>$platform->id]) }}"><span class="badge badge-primary badge-pill">{{ $platform->name }}</span></a>
                    @endforeach
                </div>
            </div>
        </div>
    </nav>
    @switch($type)
        @case('category')
                <div class="container">
                    <div class="alert">
                        <h3>
                            {{ __('Categories : ') }} {{ $category }}
                        </h3>
                    </div>
                </div>
                @foreach ($fsols as $fsol)
                    <div class="card alert col-md-3 shadow d-inline-block" style="background-color: #f6f8fa; margin: 3%">
                        <div class="row">
                            <div class="col-8">
                                <h4>
                                    <a href="{{ route('staticsolution', $fsol->id) }}">{{ $fsol->name }}</a>
                                </h4>
                            </div>
                            <div class="col-4">
                                {{ $fsol->amount }}
                            </div>
                        </div>
                        <div>
                            <span class="badge badge-primary badge-pill">{{ $fsol->category }}</span>
                            <span class="badge badge-primary badge-pill">{{ $fsol->subcategory }}</span>
                            <span class="badge badge-primary badge-pill">{{ $fsol->platform }}</span>
                        </div>
                    </div>
                @endforeach
            @break
        @case('subcategory')
            <div class="container">
                <div class="alert">
                    <h3>
                        {{ __('Sub-category : ') }} {{ $subcategory }}
                    </h3>
                </div>
            </div>
            @foreach ($fsols as $fsol)
                <div class="card alert col-md-3 shadow d-inline-block" style="background-color: #f6f8fa; margin: 3%">
                    <div class="row">
                        <div class="col-8">
                            <h4>
                                <a href="{{ route('staticsolution', $fsol->id) }}">{{ $fsol->name }}</a>
                            </h4>
                        </div>
                        <div class="col-4">
                            {{ $fsol->amount }}
                        </div>
                    </div>
                    <div>
                        <span class="badge badge-primary badge-pill">{{ $fsol->category }}</span>
                        <span class="badge badge-primary badge-pill">{{ $fsol->subcategory }}</span>
                        <span class="badge badge-primary badge-pill">{{ $fsol->platform }}</span>
                    </div>
                </div>
            @endforeach
            @break
        @case('platform')
            <div class="container">
                <div class="alert">
                    <h3>
                        {{ __('Platform : ') }} {{ $platform }}
                    </h3>
                </div>
            </div>
            @foreach ($fsols as $fsol)
                <div class="card alert col-md-3 shadow d-inline-block" style="background-color: #f6f8fa; margin: 3%">
                    <div class="row">
                        <div class="col-8">
                            <h4>
                                <a href="{{ route('staticsolution', $fsol->id) }}">{{ $fsol->name }}</a>
                            </h4>
                        </div>
                        <div class="col-4">
                            {{ $fsol->amount }}
                        </div>
                    </div>
                    <div>
                        <span class="badge badge-primary badge-pill">{{ $fsol->category }}</span>
                        <span class="badge badge-primary badge-pill">{{ $fsol->subcategory }}</span>
                        <span class="badge badge-primary badge-pill">{{ $fsol->platform }}</span>
                    </div>
                </div>
            @endforeach
            @break
        @default

    @endswitch
@endsection
