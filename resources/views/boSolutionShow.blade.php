@extends('layouts.backoff')
@section('boContent')
    @foreach ($solutions as $solu)
        <div class="row">
                <div class="col-10">
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
                </div>
                <div class="col-2">
                    <a class="btn btn-warning" href="{{ route('solutions.edit', ['solution'=>$solu->id]) }}" class="d-flex">{{ __('Edit infos')}}</a>
                </div>
        </div>
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
                    <a class="btn btn-outline-primary" href="{{ $solu->site }}" class="d-flex">{{ __('Visiter le site officiel') }}</a>
                    @foreach ($users as $user)
                        <a class="btn btn-outline-secondary" href="mailto:{{$user->email}}">{{ __('Ecrire à l\'auteur') }}</a>
                        <a class="btn btn-outline-success" href="tel:+{{$user->tel}}">{{ __('Contacter l\'auteur') }}</a>
                    @endforeach
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
            @foreach ($screens as $screen)
                <div class="card alert col-md-3 shadow- d-inline-block">
                    <img src="{{ asset('storage/'.$screen) }}" alt="" srcset="" width="200" height="121">
                </div>
            @endforeach
        </div>
    @endforeach
@endsection
