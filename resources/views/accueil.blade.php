@extends('layouts.app')
@section('content')
    <div class="container-fluid" style="background-color: red">
        <div style="padding: 3% 20%">
            <div id="search-zone">
                <form class="form-inline" action="{{ url('/search') }}" method="get">
                    <div class="col-9">
                        <input type="search" class="form-control mr-sm-2" placeholder="Rechercher un logiciel ou projet" aria-label="Search" name="" id="" style="width: 100%">
                    </div>
                    <div class="col-3">
                        <button class="btn btn-success my-2 my-sm-0" type="submit">Search</button>
                    </div>
                </form>
            </div> 
        </div>
    </div>
    <div class="container">
        <div class="alert">
            <h3>{{ __('Les plus recommandés')}}</h3>
        </div>
        <div class="alert">
            <div id="grill" class="row">

            </div>
        </div>
    </div>
    <div class="card">
        <div class="row">
            <a href="{{ route('solutions.show',['solution'=>'1'])}}">
                <div class="col-4 card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-9 alert">
                                <strong><h4>{{ __('TITLE') }}</h4></strong>
                            </div>
                            <div class="col-md-3 alert alert-success">
                                <strong><h4>{{ __('price') }}</h4></strong>
                            </div>
                        </div>
                        <div class="row">
                            <textarea name="" id="" cols="50" rows="2" disabled=true>
    
                            </textarea>
                        </div>
                    </div>
                </div>
            </a>
            
        </div>
    </div>
    
@endsection
<script src="{{ asset('js/accueil.js') }}" defer></script>