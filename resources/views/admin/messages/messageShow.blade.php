@extends('admin.adminBackOff')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <span>{{ __('From : ') }}</span><span><strong>{{ $msg->user->name }}</strong></span>
            </div>
            <div class="col-md-3">
                <span>{{ __('Object : ') }}</span><span><strong>{{ $msg->object }}</strong></span>
            </div>
            <div class="col-md-6">
                <span>{{ __('Email : ') }}</span><span><strong>{{ $msg->email }}</strong></span>
            </div>
        </div>
        <div style="margin-top: 3%">
            {{ $msg->message }}
        </div>
    </div>
@endsection
