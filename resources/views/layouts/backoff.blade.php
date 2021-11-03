@extends('layouts.app')

@section('content')
    <div class="container-fluid py-4">
        <div class="row justify-content-center">
            <div class="col-md-2" style="#background-color: green">
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
                <div class="card">
                    <a href="{{ url('/') }}" class="btn btn-primary" style="width: 100%">{{ __('Go to Library') }}</a>
                </div>
            </div>
            <div class="col-md-10" id="back-office-content">
                @if ($message = Session::get('message'))
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert">x</button>
                        {{ $message }}
                    </div>
                @endif
                <div class="alert alert-success" id="notif-success" hidden=true>lol</div>
                @yield('boContent')
            </div>
        </div>
    </div>
@endsection
@section('footer')
    <div class="row" style="padding: 3%">
        <div class="col-md-6">
            <form action="{{ route('messages.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <div>
                        <label for="email">{{ __('Email address') }}</label>
                    </div>
                    <div>
                        <input type="email" class="form-control" name="email" id="email">
                    </div>
                </div>
                <div class="form-group">
                    <div>
                        <label for="object">{{ __('Object') }}</label>
                    </div>
                    <div>
                        <select name="object" id=" object" class="form-control">
                            <option value="suggestion">{{ __('Suggestion') }}</option>
                            <option value="information">{{ __('Information') }}</option>
                            <option value="paint">{{ __('Plaint') }}</option>
                            <option value="other">{{ __('Other(s)') }}</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <div>
                        <label for="message">{{ __('Type your message') }}</label>
                    </div>
                    <div>
                        <textarea name="message" id="message" cols="30" rows="5" class="form-control"></textarea>
                    </div>
                </div>
                <div>
                    <input type="submit" class="btn btn-warning" value="Submit"  style="width: 100%">
                </div>
            </form>
        </div>
    </div>
@endsection
