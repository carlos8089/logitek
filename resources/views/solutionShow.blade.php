@extends('layouts.app')
@section('content')
    <div class="py-4 container">
        @foreach ($solutions as $solu)
    <nav class="navbar">
        <div class="container-fluid">
            <span class="navbar-brand">
                <h2><strong>{{ $solu->name }}</strong></h2>
            </span>
            <span>
                <h2><strong>{{ $solu->amount }}</strong></h2>
            </span>
        </div>
    </nav>
    <div>
            <div class="container-fluid">
                <h4>
                    <span class="badge badge-primary badge-pill">{{ $solu->category }}</span>
                    <span class="badge badge-primary badge-pill">{{ $solu->subcategory }}</span>
                    <span class="badge badge-primary badge-pill">{{ $solu->platform }}</span>
                </h4>
            </div>
    </div>
    <div>
            <div class="container-fluid">
                <nav>
                    <a class="btn btn-outline-primary" href="{{ $solu->site }}" class="d-flex" target="_blank" rel="noopener noreferrer">{{ __('Visiter le site officiel') }}</a>
                </nav>
            </div>
    </div>
    <div style="margin-top: 2%">
            <div class="container-fluid">
                <div class="card">
                    <textarea rows="15%" cols="" scrollable disabled>
                        {{ $solu->desc }}
                    </textarea>
                </div>
            </div>
    </div>
    <div style="margin-top: 2%">
            <div class="container-fluid">
                <h2>
                    {{ __('Screenshots')}}
                </h2>
            </div>
    </div>
    @endforeach
    </div>
@endsection
