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
            @if ($solutions !== null)
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead class="thead-dark">
                            <tr>
                              <th scope="col">Name</th>
                              <th scope="col">Category</th>
                              <th scope="col">Platform</th>
                              <th scope="col">Amount</th>
                              <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($solutions as $solution)
                            <tr>
                                <th>{{ $solution->name }}</th>
                                <th>{{ $solution->category }}</th>
                                <th>{{ $solution->platform }}</th>
                                <th>{{ $solution->amount }}</th>
                                <th><a href="{{ route('solutions.show', ['solution'=> $solution->id]) }} " type="button" class="btn btn-outline-primary">{{ __('Solution page') }}</a></th>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="container d-flex justify-content-center">
                    {{ $solutions->links() }}
                </div>
            @else
                {{ __('No solution yet')}}
            @endif
        </div>

    </div>
</div>
@endsection
