@extends('layouts.app')
@section('content')
    <div class="container-fluid border-bottom" style="background-color:#f6f8fa">
        <div style="padding: 3% 20%">
            <div id="search-zone" class="d-flex justify-content-center">
                <form class="form-inline" action="{{ url('/search') }}" method="get">
                    <div class="col-9">
                        <input type="search" class="form-control mr-sm-2" placeholder="Rechercher un logiciel ou projet" aria-label="Search" name="stsearch" id="" style="width: 100%">
                    </div>
                    <div class="col-3">
                        <button class="btn btn-success my-2 my-sm-0" type="submit">Search</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="container">
        @foreach ($solutions as $solu)
            <div class="row">
                <div class="col-9">
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
                    <div id="badges">
                        <div class="container">
                            <h4>
                                <a href="{{ route('fcat', ['name'=>$solu->category]) }}"><span class="badge badge-primary badge-pill">{{ $solu->category }}</span></a>
                                <a href=""><span class="badge badge-primary badge-pill">{{ $solu->subcategory }}</span></a>
                                <a href=""><span class="badge badge-primary badge-pill">{{ $solu->platform }}</span></a>
                            </h4>
                        </div>
                    </div>
                    <div id="intouch">
                        <div class="container">
                            <nav class="navbar">
                                <div class="d-flex justify-content-end">
                                    @foreach ($users as $user)
                                    <span class="navbar-brand">
                                        {{ __('Par ') }} {{$user->name}}
                                    </span>
                                    <a class="btn btn-outline-primary" style="margin-left: 0.9%" href="{{ $solu->site }}" target="_blank" rel="noopener noreferrer">{{ __('Website') }}</a>
                                        <a class="btn btn-outline-secondary" style="margin-left: 0.9%" href="mailto:{{$user->email}}">{{ __('Message') }}</a>
                                        <a class="btn btn-outline-success" style="margin-left: 0.9%" href="tel:+{{$user->tel}}">{{ __('Call') }}</a>
                                    @endforeach
                                </div>
                            </nav>
                        </div>
                    </div>
                    <div style="margin-top: 2%">
                        <div class="card alert">
                            <p>{{ $solu->desc }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-3" id="Screens">
                    <div class="container-fluid">
                        <nav class="navbar">
                            <span class="navbar-brand">
                                <h2>
                                    {{ __('Screenshots')}}
                                </h2>
                            </span>
                        </nav>
                    </div>
                    @foreach ($screens as $screen)
                        <div class="col-md-2" style="margin: 1.5%">
                            <img src="{{ asset('storage/'.$screen) }}" alt="" srcset="" width="200" height="121">
                        </div>
                    @endforeach
                </div>
            </div>
            <div id="comments" class="container">
                <nav class="navbar">
                    <div class="navbar-brand" style="margin: 0% 0% 2% 0%">
                        <h3>
                            <strong><span>{{ __('Comments') }}</span></strong>
                        </h3>
                    </div>
                    <!--
                    <a type="button" class="btn btn-success" onclick="">{{ __('Comment') }}</a>
                    -->
                </nav>
                <div id="commentForm">
                    <form action="{{ route('comments.store') }}" method="post">
                        @csrf
                        <div class=" d-flex justify-content-center" style="background-color: red">
                            <input type="text" name="solution_id" id="solution_id" value="{{ $solu->id }}" hidden>
                        </div>
                        <div class="col-9">
                            <textarea class="form-control" name="content" id="content" cols="10" rows="3" scrollable></textarea>
                            <div class="d-flex justify-content-end" style="margin-top: 1%">
                                <input class="btn btn-success" type="submit" value="Comment">
                            </div>
                        </div>
                    </form>
                </div>
                @foreach ($comments as $comment)
                    <div class="" style="margin-bottom: 1.5%">
                        <div class="row" style="margin-bottom: 1%; margin-left: 1%">
                            <span>{{ __('Par : ') }} {{ $comment->user->name }}</span>
                        </div>
                        <div class="card" style="padding: 2%; margin-bottom: 1%">
                            {{ $comment->content }}
                        </div>
                        <div class="d-flex justify-content-end" style="margin-bottom: 1%">
                            <span>{{ __('Publié : ') }} {{ $comment->created_at }}</span>
                        </div>
                    </div>
                @endforeach
            </div>
        @endforeach
    </div>
@endsection
