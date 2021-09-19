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
    <nav class="navbar navbar-expand bg-dark shadow-sm">
        <div class="container">
            <span class="navbar-item" style="color: white">
                {{ __('Catégories') }}
            </span>
        </div>
    </nav>
    <div class="container">
        <div class="alert">
            <h3>{{ __('Les plus recommandés')}}</h3>
        </div>
        <div class="alert">
            <div id="grill" class="container">
                @foreach ($solutions as $solution)
                    <div class="card alert col-4 shadow d-inline-block" style="background-color: #f6f8fa; margin-right:2%">
                        <div class="row">
                            <div class="col-9">
                                <h3>
                                    <a href="{{ route('staticsolution', $solution->id) }}">{{ $solution->name }}</a>
                                </h3>
                            </div>
                            <div class="col-3">
                                {{ $solution->amount }}
                            </div>
                        </div>
                        <div>
                            <span class="badge badge-primary badge-pill">{{ $solution->category }}</span>
                            <span class="badge badge-primary badge-pill">{{ $solution->subcategory }}</span>
                            <span class="badge badge-primary badge-pill">{{ $solution->platform }}</span>
                        </div>
                        <div>
                            <span>
                                {{ __('Par ') }} {{$solution->user_id}}
                            </span>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
<!--
<script src="{{ asset('js/accueil.js') }}" defer></script>
-->
