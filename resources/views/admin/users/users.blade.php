@extends('admin.adminBackOff')
@section('content')
    <div class="container">
        <div class="card" style="padding: 1% ; margin-bottom: 2%">
            <strong>
                <h3>{{ $nbUser }}{{ __(' users') }}</h3>
            </strong>
        </div>
        <div class="card">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th>{{ __('Name') }}</th>
                            <th>{{ __('Country') }}</th>
                            <th>{{ __('Solutions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($byUser->chunk(1) as $usr)
                            <tr>
                                <th>{{$usr->implode('name')}}</th>
                                <th>{{$usr->implode('country')}}</th>
                                <th>{{$usr->implode('number')}}</th>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="d-flex justify-content-center" style="margin-top: 2%">
            {{$users->links()}}
        </div>
    </div>
@endsection
