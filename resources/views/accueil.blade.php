@extends('layouts.static')
@section('main')
    <div class="container">
        <nav class="navbar">
            <span class="navbar-brand"></span>
            <div>

            </div>
        </nav>
        <div class="alert d-flex justify-content-center">
            <h3><strong>{{ __('Les plus recommandés')}}</strong></h3>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <!-- Modal trigger button -->
            <div class="col-md-2">
                <button type="button" class="btn btn-secondary " data-toggle="modal" data-target="#advanced-filter" style="width: 100%; height:100%">
                    {{ __('advanced filter') }}
                    <span style="margin-left: 3%"><x-bi-gear/></span>
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
            <div class="col-md-10">
                <div class="card" style="padding: 1%">
                    <div class="row">
                        <div class="col-md-2">
                            <span class="inline-block align-middle">{{ __('Filter by') }}</span>
                        </div>
                        <div class="col-md-10">
                            <x-form class="form-inline" method="get" action="{{ route('filter') }}" style="margin-bottom:0; justify-content:end">
                                <div class="form-group mx-sm-4">
                                    <x-label for="category" class="mx-sm-2"/>
                                    <select class="form-control" name="category">
                                        <option value="">All</option>
                                        @foreach ($categories as $cat)
                                            <option value="{{$cat->name}}">{{$cat->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group mx-sm-4">
                                    <x-label for="platform" class="mx-sm-2" />
                                    <select class="form-control" name="platform">
                                        <option value="">All</option>
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
        </div>
    </div>
    <div class="container" style="margin-top: 2%">
        <div>
            {{ $count }}
        </div>
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
                        <div id="badges" class="row" style="background-color: black; color:blanchedalmond">
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
@endsection
<script src="{{ asset('js/accueil.js') }}"></script>
<script>

</script>
