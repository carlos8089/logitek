@extends('layouts.static')
@section('main')
    <div class="container-lg-fluid p-responsive clearfix" id="directory-main">
        {{ Breadcrumbs::render('directory') }}
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
                <h4 class="font-weight-bold">{{ __('Categories') }}</h4>
            </div>
            @foreach ($categories as $cat)
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('fcat', ['name'=> $cat->name]) }}" role="button">{{$cat->name}}</a>
                </li>
            @endforeach
        </ul>
        <div class="col-9 float-lg-right" id="items-display-area">
            <div class="row" id="filters">
                <!-- Modal trigger button -->
                <div class="col-md-3">
                    <button type="button" class="btn btn-secondary " data-toggle="modal" data-target="#advanced-filter" style="width: 100%; height:100%">
                        {{ __('Advanced filters') }}
                        <span style="//margin-left: 3%"><x-bi-gear/></span>
                    </button>
                </div>
                <!-- Modal for advanced filter options -->
                <div id="advanced-filter" class="modal fade" tabindex="-1" aria-labelledby="advanced-filterLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="advanced-filterLabel">Modal title</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="container">
                                    <x-form method="get" action="" id="advanced-filter-form">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <x-label for="category"/>
                                                </div>
                                                <div class="col-md-8">
                                                    <select name="category" class="form-control" id="">
                                                        @foreach ($categories as $cat)
                                                            <option value="{{$cat->id}}">{{$cat->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <x-label for="subcategory"/>
                                                </div>
                                                <div class="col-md-8">
                                                    <select name="subcategory" class="form-control" id="">
                                                        @foreach ($subcategories as $sub)
                                                            <option value="{{$sub->id}}">{{$sub->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <x-label for="platform"/>
                                                </div>
                                                <div class="col-md-8">
                                                    <select name="platform" class="form-control" id="">
                                                        @foreach ($platforms as $plat)
                                                            <option value="{{$plat->id}}">{{$plat->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <x-label for="country"/>
                                                </div>
                                                <div class="col-md-8">
                                                    <select name="country" id="" class="form-control">
                                                        @foreach ($categories as $cat)
                                                            <option value="{{$cat->id}}">{{$cat->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div>
                                                <x-label for="prices"/>
                                            </div>
                                            <div>
                                                <x-input type="range" class="form-control" name="price" oninput="num.value = this.value" min="0" max="10000" value="100" step="100"/>
                                                <span>0 - </span><output id="num">100</output>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div>
                                                <x-label for="published_between"/>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-5">
                                                    <x-pikaday class="form-control" name=""/>
                                                </div>
                                                <div class="col-md-2">
                                                    <span>{{ __(' and ') }}</span>
                                                </div>
                                                <div class="col-md-5">
                                                    <x-pikaday class="form-control" name=""/>
                                                </div>
                                            </div>
                                        </div>
                                    </x-form>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-warning" onclick="f()">
                                    Reset
                                </button>
                                <button type="button" class="btn btn-primary" onclick="e()" style="margin-left: 25px">
                                    Apply filter
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Basic filter -->
                <div class="col-md-9">
                    <div class="" style="//padding: 1%">
                        <div class="//bg-dark">
                            <x-form class="form-row align-item-end" method="get" action="{{ route('filter') }}" style="margin-bottom:0; justify-content:end">
                                <h4 class="font-weight-bold text-center">{{ __('Filter by') }}</h4>
                                <div class="col-4">
                                    <x-label for="category" class="sr-only"/>
                                    <select class="form-control" name="category">
                                        <option value="">{{ __('Subcategory') }}</option>
                                        @foreach ($categories as $cat)
                                            <option value="{{$cat->name}}">{{$cat->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-4">
                                    <x-label for="platform" class="sr-only" />
                                    <select class="form-control" name="platform">
                                        <option value="">{{ __('Platform') }}</option>
                                        @foreach ($platforms as $plat)
                                            <option value="{{$plat->name}}" >{{$plat->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div>
                                    <button type="submit" class="btn btn-primary">{{ __('Apply') }}</button>
                                </div>
                            </x-form>
                        </div>
                    </div>
                </div>
            </div>
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
                                        <span class="badge">{{ $solution->category }}</span>
                                    </div>
                                    <div class="col-md-4 bg-success">
                                        <span class="badge">{{ $solution->subcategory }}</span>
                                    </div>
                                    <div class="col-md-4 bg-danger">
                                        <span class="badge">{{ $solution->platform }}</span>
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
