@extends('admin.adminBackOff')
@section('content')
    <div>
        {{ __('Dashboard') }}
    </div>
    <div class="container card" style="margin-bottom: 2.5%">
        <div class="card-body">
            <div class="row">
                <div class="col-md-5">
                    <div class="card" style="padding: 2.5%">
                        <div class="">
                            <h4><span>{{ $solutions }}</span></h4>
                        </div>
                        <div>
                            <span>{{ __(' solutions') }}</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="card" style="padding: 2.5%">
                        <div class="">
                            <h4><span>{{ $users }}</span></h4>
                        </div>
                        <div>
                            <span>{{ __(' users') }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <div class="card" style="padding: 2.5%">
                        <div class="">
                            <h4><span>{{ $categories }}</span></h4>
                        </div>
                        <div>
                            <span>{{ __(' categories') }}</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card" style="padding: 2.5%">
                        <div>
                            <h4><span>{{ $subcategories }}</span></h4>
                        </div>
                        <div>
                            <span>{{ __(' subcategories') }}</span>
                        </div>
                        <div>
                            <a href="{{ route('subcategories.create') }}" type="button" class="btn btn-primary" style="width: 100%">{{ __('Add') }}</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card" style="padding: 2.5%">
                        <div>
                            <h4><span>{{ $platforms }}</span></h4>
                        </div>
                        <div>
                            <span>{{ __(' platforms') }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
