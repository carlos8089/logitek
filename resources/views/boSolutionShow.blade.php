@extends('layouts.backoff')
@section('boContent')
    @foreach ($solutions as $solu)
        <div class="row" id="new-design">
            <div class="col-md-7" id="stats">
                <div class="container-fluid">
                    <nav class="navbar">
                        <div class="container-fluid">
                            <span class="navbar-brand">
                                <h2><strong>{{ $solu->name }}</strong></h2>
                            </span>
                        </div>
                    </nav>
                    <div class="container-fluid">
                        <div class="card" id="visits">
                            <div class="card-header">
                                <h4><strong>{{ __('Visits') }}</strong></h4>
                            </div>
                            <div class="card-body"></div>
                        </div>
                        <div class="card" id="comments" style="margin-top: 5%">
                            <div class="card-header">
                                <h4><strong>{{ __('Comments') }}</strong></h4>
                            </div>
                            <div class="card-body">
                                {{ $commentstats }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-5" id="about">
                <div class="container-fluid">
                    <nav class="navbar">
                        <span style="margin-left: 0">
                            <h3><strong>{{ __('About') }}</strong></h3>
                        </span>
                        <form action="{{ route('solutions.edit', $solu->id) }}" class="d-flex">
                            <button class="btn btn-warning" type="submit">{{ __('Edit') }}</button>
                        </form>
                    </nav>
                    <div id="desc">
                        <h4><span>{{ __('Description') }}</span></h4>
                        <p>
                            <textarea class="form-control" name="" id="" cols="" rows="4">
                                {{ $solu->desc }}
                            </textarea>
                        </p>
                    </div>
                    <div id="price" style="margin-top: 2.5%">
                        <h4><span>{{ __('Pricing') }}</span></h4>
                        <div class="container-fluid">
                            <span>
                                <h2><strong>{{ $solu->amount }}</strong></h2>
                            </span>
                        </div>
                    </div>
                    <div id="badges" style="margin-top: 2.5%">
                        <h4><span>{{ __('Badges') }}</span></h4>
                        <div class="container-fluid">
                            <h4>
                                <span class="badge badge-primary badge-pill">{{ $solu->category }}</span>
                                <span class="badge badge-primary badge-pill">{{ $solu->subcategory }}</span>
                                <span class="badge badge-primary badge-pill">{{ $solu->platform }}</span>
                            </h4>
                        </div>
                    </div>
                    <div id="contacts" style="margin-top: 2.5%">
                        <h4><span>{{ __('Get intouch') }}</span></h4>
                        <nav>
                            <a class="btn btn-outline-primary" href="{{ $solu->site }}" class="d-flex">{{ __('Visiter le site officiel') }}</a>
                            @foreach ($users as $user)
                                <a class="btn btn-outline-secondary" href="mailto:{{$user->email}}">{{ __('Ecrire à l\'auteur') }}</a>
                                <a class="btn btn-outline-success" href="tel:+{{$user->tel}}">{{ __('Contacter l\'auteur') }}</a>
                            @endforeach
                        </nav>
                    </div>
                    <div id="screenshots" style="margin-top: 2.5%">
                        <h4><span>{{ __('Screenshots') }}</span></h4>
                        @foreach ($screens as $screen)
                        <div class="card alert shadow- d-inline-block">
                            <img src="{{ asset('storage/'.$screen) }}" alt="" srcset="" width="200" height="121">
                        </div>
                        @endforeach
                    </div>
                </div>

            </div>
        </div>

       <div hidden>
        <div id="old-design">
            <div class="row" >
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
                    <a class="btn btn-warning" href="{{ route('solutions.edit', $solu->id) }}" class="d-flex">{{ __('Edit infos')}}</a>
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
        </div>
       </div>

    @endforeach
@endsection
