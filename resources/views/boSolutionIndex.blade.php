@extends('layouts.backoff')
@section('boContent')
<div class="card">
    <div class="card-header">
        <nav class="navbar">
            <div class="container-fluid">
                <span class="navbar-brand">
                    <h3><strong>{{ __('Your solutions') }}</strong></h3>
                </span>
                <form action="{{ route('solutions.create') }}" class="d-flex">
                    <button class="btn btn-outline-success me-2" type="submit">Add new</button>
                </form>
            </div>
        </nav>
        
    </div>

    <div class="card-body">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        <div class="justify-content-end">
            {{ __('No solution yet')}}
            <a href="{{ route('solutions.show', ['solution'=>'1']) }} " type="button" class="btn btn-outline-primary">{{ __('Solution page') }}</a>
        </div>
        
    </div>
</div>
@endsection