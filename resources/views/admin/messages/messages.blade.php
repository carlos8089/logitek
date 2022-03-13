@extends('admin.adminBackOff')
@section('content')
    <div class="container">
        <div class="card">
            <nav class="navbar">
                <span class="navbar-brand">
                    <h3><strong>{{ __('Vos messages') }}</strong></h3>
                </span>
            </nav>
        </div>
        <div class="card">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th>{{ __('User') }}</th>
                            <th>{{ __('Object') }}</th>
                            <th>{{ __('Date') }}</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($messages as $msg)
                            <tr>
                                <th>{{ $msg->user->name }}</th>
                                <th>{{ $msg->object }}</th>
                                <th>{{ $msg->created_at }}</th>
                                <th>
                                    <a type="button" class="btn btn-primary" href="{{ route('messages.show', $msg->id) }}">Read</a>
                                </th>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="d-flex justify-content-center">
                {{ $messages->links() }}
            </div>

        </div>
    </div>

@endsection
