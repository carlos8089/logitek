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
    @if ($nbsol == '0')
        <div class="d-flex justify-content-center">
            <div class="col-4" style="margin: 10%">
                <div class="d-flex align-self-center" style="flex-direction: column">
                    <h3>
                        {{ __('Aucun résultat trouvé') }}
                    </h3>
                </div>
                <div>
                    {{ __('Vérifiez l\'orthographe de votre recherche') }}
                </div>
            </div>
        </div>

    @else
        @foreach ($solutions ?? '' as $solution)
            <div class="d-flex justify-content-center">
                <div class="card alert col-6">
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
            </div>
        @endforeach
    @endif
@endsection
