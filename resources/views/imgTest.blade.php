@extends('layouts.app')
@section('content')
    @foreach ($paths as $path)
        <div style="margin-bottom: 3%">
            <img src="{{ asset('storage/'.$path)}}" alt="" srcset="">
        </div>
    @endforeach
@endsection
