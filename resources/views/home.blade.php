@extends('layouts.backoff')
@section('boContent')
<div class="card">
    <div class="card-header">
        <nav class="navbar">
            <div class="container-fluid">
                <span class="navbar-brand"><h3><strong>{{ __('Dashboard') }}</strong></h3></span>
            </div>
        </nav>
    </div>

    <div class="card-body">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        <div class="container">
            <div class="row">
                <div class="col-6">
                    <div class="card">
                        <div class="card-body">
                            <div>
                                <h3><strong>{{ $nbsolutions }}</strong></h3>
                            </div>
                            <div>
                                <span>
                                    {{ __('solutions till now') }}
                                </span>
                                <a type="button" href="{{ route('solutions.create') }}" class="btn btn-outline-success" style="width: 100%">Add new</a>
                            </div>
                            <div class="row d-flex justify-content-center">
                                <div class="col-4 ">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 card">

                        <div class="card-body">
                            <div class="d-inline-block">
                                <div>
                                    <h3><strong>Number</strong></h3>
                                </div>
                                <div>
                                    <span>
                                        {{ __('projects till now')}}
                                    </span>
                                </div>
                            </div>

                            <div class="row d-flex justify-content-start">
                                <div class="col-4 d-inline-block">
                                    <a class="btn btn-outline-success" style="width: 100%">Add new</a>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
