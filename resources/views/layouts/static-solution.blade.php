@extends('layouts.app')
@section('left-nav-menu')
    <ul class="navbar-nav mr-auto">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('marketplace') }}" role="button">{{ __('Directory') }}</a>
        </li>
        <li class="nav-item dropdown">
            <a id="about-dropdown" class="nav-link dropdown-toggle"  href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                {{ __('About') }}
            </a>
            <div class="dropdown-menu dropdown-menu-left" aria-labelledby="about-dropdown">
                <a class="dropdown-item" href="#">{{ __('FAQ') }}</a>
                <a class="dropdown-item" href="#">{{ __('Our vision') }}</a>
                <a class="dropdown-item" href="#">{{ __('Contacts') }}</a>
                <a class="dropdown-item" href="#">{{ __('Contributors') }}</a>
                <a class="dropdown-item" href="#">{{ __('Privacy policy') }}</a>
            </div>
        </li>
        <li class="nav-item dropdown">
            <a id="support-dropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                {{ __('Contribute') }}
            </a>
            <div class="dropdown-menu dropdown-menu-left">
                <a class="dropdown-item" href="#">{{ __('Financial support') }}</a>
                <a class="dropdown-item" href="#">{{ __('Brain Storming') }}</a>
            </div>
        </li>
    </ul>
@endsection
@section('content')
    <div class="container-fluid bg-primary" style="background-color:">
        <div style="padding: 5% 20% 3%">
            <div class="d-flex justify-content-center">
                <H1 style="color: white">{{ __('The Biggest App Library') }}</H1>
            </div>
            <div class="d-flex justify-content-center">
                <h3>{{ __('With hundreds of applications for all types of devices') }}</h3>
            </div>
        </div>
        <div style="padding: 0% 20% 3%">
            <div id="search-zone" class="d-flex justify-content-center">
                <x-form class="form-row" action="{{ url('/search') }}" method="get" style="width: 100%">
                    <div class="col-10">
                        <div class="input-group"  style="width: 100%">
                            <div class="input-group-prepend">
                                <select class="form-control" name="searchIn" id="searchIn" placeholder="Search In">
                                    <option value="" selected>{{ __('Search In') }}</option>
                                    <option value="solution">
                                        <span>{{ __('Solutions') }}</span>
                                    </option>
                                    <option value="publisher">
                                        <span>{{ __('Publishers') }}</span>
                                    </option>
                                </select>
                            </div>
                            <input type="search" class="form-control mr-sm-4" placeholder="Search for an App or a User" aria-label="Search" name="stsearch" id="">
                        </div>
                    </div>
                    <div class="col-2">
                        <button class="form-control btn btn-success my-2 my-sm-0" type="submit" style="width: 100%; height:100%"><strong><x-bi-search/></strong></button>
                    </div>
                </x-form>
            </div>
        </div>
    </div>
    @yield('main')
@endsection
