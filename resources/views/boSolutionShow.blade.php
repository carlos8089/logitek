@extends('layouts.backoff')
@section('boContent')
<div class="alert">
    <nav class="navbar">
        <div class="container-fluid">
            <span class="navbar-brand">
                <h3><strong>{{ __('Yo') }}</strong></h3>
            </span>
            <a class="btn btn-warning" href="{{ route('solutions.edit', ['solution'=>'1']) }}" class="d-flex">{{ __('Edit infos')}}</a>
        </div>
    </nav>
</div>
<div class="card">
    <div class="card-header">
        
        
    </div>

    <div class="card-body">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        <div class="container-fluid">
            
        </div>
    </div>
</div>
@endsection