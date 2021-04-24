@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-2" style="#background-color: green">
            <div class="card">
                <a href="{{ url('/') }}" class="btn btn-primary" style="width: 100%">{{ __('Go to Library') }}</a>
            </div>
            <div class="card">
                <div class="card-header">{{ __('Menu') }}</div>
                <div class="card-body">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <div>
                                <a class="nav-link" href="{{ route('home') }}">{{ __('Dashboard') }}</a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <div>
                                <a class="nav-link" href="{{ route('solutions.index') }}">{{ __('Solutions') }}</a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <div>
                                <a class="nav-link" href="{{ url('/projects')}} ">{{ __('Projects') }}</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-10" id="back-office-content">
            <div class="alert alert-success" id="notif-success" hidden=true>lol</div>
            @yield('boContent')
        </div>
    </div>
</div>
@endsection