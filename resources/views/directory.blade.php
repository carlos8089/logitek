@extends('layouts.static')
@section('main')
    <div class="container-lg-fluid p-responsive clearfix" id="directory-main">
        {{ Breadcrumbs::render('directory') }}
        <div class="col-10 float-lg-right" id="search-area">
            <x-form class="form-row" action="{{ route('staticsearch') }}" method="get" style="width: 70%">
                <div class="col-10">
                    <input type="hidden" name="searchIn" id="searchIn" value="solution">
                    <input type="search" class="form-control mr-sm-4 shadow-sm" placeholder="{{ __('Search for a software here') }}" aria-label="Search" name="stsearch" id="">
                </div>
                <div class="col-2">
                    <button class="form-control btn btn-outline-success my-2 my-sm-0 shadow-sm" type="submit" style="width: 100%; height:100%"><strong><x-bi-search/></strong></button>
                </div>
            </x-form>
        </div>
        <ul class="nav flex-column float-lg-left col-2 shadow-sm" id="side-navigation">
            <div class="" style="padding: 0% 0% 0% 4%">
                <h4 class="font-weight-bold">{{ __('Categories') }}</h4>
            </div>
            @foreach ($categories as $cat)
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('fcat', ['name'=> $cat->name]) }}" role="button">{{$cat->name}}</a>
                </li>
            @endforeach
        </ul>
        <div class="col-10 float-lg-right" id="items-display-area">
            @include('filter')
            <div class="container" style="margin-top: 2%">
                <nav class="navbar">
                    <div class="navbar-brand">
                        <h3>
                            {{ $count }} {{ __(' items') }}
                        </h3>
                    </div>
                    <div class="col-md-2 dropdown lr-auto" style="">
                        <button id="sortBy" class="dropdown-toggle btn btn-warning" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            <span style="margin-left: 3%">{{ __('Sort') }}<x-bi-sort-down/></span>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="sortBy" style="padding: 5%">
                            <x-form method="get" action="#">
                                <div class="form-group">
                                    <input class="form-control" type="range" name="" id="">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" min="1" max="10" type="range" name="" id="">
                                </div>
                                <x-pikaday class="form-control" name="birthday" />
                                <div class="form-group">
                                    <button class="btn btn-primary" type="submit">Sort</button>
                                </div>
                            </x-form>
                        </div>
                    </div>
                </nav>
            </div>
            <div style="background-color:">
                <div class="">
                    <div id="grill" class="">
                        @foreach ($solutions as $solution)
                            <div class="card alert col-md-3 shadow-sm d-inline-block" style="background-color: #f6f8fa; margin: 0.2% 2% 2% 5%">
                                <div class="row">
                                    <div class="col-8">
                                        <h4>
                                            <a href="{{ route('staticsolution', $solution->id) }}">{{ $solution->name }}</a>
                                        </h4>
                                    </div>
                                    <div class="col-4">
                                                    {{ $solution->amount }}
                                    </div>
                                </div>
                                <div id="badges" class="row" style="color:blanchedalmond">
                                    <div class="col-sm-4 bg-primary">
                                        <span class="badge">{{ $solution->categorie->name }}</span>
                                    </div>
                                    <div class="col-md-4 bg-success">
                                        <span class="badge">{{ $solution->subcategorie->name }}</span>
                                    </div>
                                    <div class="col-md-4 bg-danger">
                                        <span class="badge">{{ $solution->platform->name }}</span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <div class="container d-flex justify-content-center">
                            {{ $solutions->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
<script src="{{ asset('js/accueil.js') }}"></script>
<script>

</script>
