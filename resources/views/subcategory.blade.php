@extends('layouts.static')
@section('main')
    <div class="container-lg-fluid p-responsive clearfix" id="directory-main">
        {{ Breadcrumbs::render('subcategory', $sub) }}
        <div class="col-9 float-lg-right" id="search-area">
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
        <ul class="nav flex-column float-lg-left col-3 shadow-sm" id="side-navigation">
            <div class="" style="padding: 0% 0% 0% 4%">
                <h4 class="font-weight-bold">{{ __('Other Sub-categories') }}</h4>
            </div>
            @foreach ($subcategories as $subcat)
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('fsubcat', ['name'=> $subcat->name]) }}" role="button">{{$subcat->name}}</a>
                </li>
            @endforeach
        </ul>
        <div class="col-9 float-lg-right" id="items-display-area">
            <nav class="navbar">
                <div class="navbar-brand">
                    <h4>
                        {{ $count }} {{ __(' items') }}
                    </h4>
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
            @foreach ($fsols as $fsol)
                <div class="card alert col-md-3 shadow d-inline-block" style="background-color: #f6f8fa; margin: 0.2% 3.5% 3%">
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
                        <span class="badge badge-primary badge-pill">{{ $fsol->platform->name }}</span>
                    </div>
                </div>
            @endforeach
            <div class="container d-flex justify-content-center">
                {{ $fsols->links() }}
            </div>
        </div>
    </div>
@endsection
