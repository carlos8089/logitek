<link rel="stylesheet" href="{{ asset('css/accueil.css') }}">
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
    <section id="header" style="//background-color: rgb(76, 123, 158)">
        <div class="container-fluid">
            <div class="row" style="//background-color:">
                <div class="col-md-6" style="padding: 5% 0% 2% 2.5% ;//background-color: rgb(61, 177, 61)">
                    <h2 class="font-weight-bold display-4 text-primary">{{ __('The Biggest Software Directory in Africa') }}</h2>
                    <h4 class="font-italic">{{ __('Join the network where genuine and intuive sofwares are gattered and Give visibility to your products on a continental scale') }}</h4>
                    <hr>
                    <div style="//background-color: rgb(247, 243, 243)">
                        <a class="btn btn-primary font-weight-bold" href="{{ route('register') }}" role="button" style="margin: 0% 10% 0% 0%">Sign Up</a>
                        <a class="btn btn-outline-primary font-weight-bold" href="{{ route('marketplace') }}" role="button">Explore</a>
                    </div>
                </div>
                <div class="col-md-6">
                    <img src="" alt="" class="border-none shadow-sm" width="518" height="518">
                </div>
            </div>
        </div>
        <div class="" style="padding: 0.1% 1.5% 1.5% 2.5%; //background-color: rgb(97, 93, 93)">
            <hr>
            <span style="margin-right: 5%">+20 categories</span>
            <span style="margin-right: 5%">+10K softwares</span>
            <div id="search-zone" class="d-flex justify-content-center col-md-8 float-right">
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
    </section>
    <section id="explore-marketplace">
        <div class="container">
            <div style="padding: 5% 0% 2% 0%">
                <h3 class="font-weight-bold text-center" >{{ __('Enhance your productivity with Logitek') }}</h3>
            </div>
            <div class="d-flex justify-content-center">
                <h4 class="text-center">
                    {{ __('Because every business is based on process, we decided to help you find the most suitable software to handle, manage and optimize each aspect of your process.') }}
                </h4>

            </div>
            <br>
            <div id="values-card" style="margin-bottom:3.5%;// background-color: rgb(243, 0, 0)">
                <div class="container-fluid d-flex justify-content-center">
                    <div class="col-md-4 value-card" >
                        <span>
                            <img src="{{ asset('vendor/blade-bootstrap-icons/search.svg') }}" alt="" srcset="" width="96" height="96">
                        </span>

                        <h5 class="text-center" style="margin-top: 10%">
                            {{ __('Browse within softwares with a powerful search engine') }}
                        </h5>
                    </div>
                    <div class="col-md-4 value-card">
                        <span>
                            <img src="{{ asset('vendor/blade-bootstrap-icons/search.svg') }}" alt="" srcset="" width="96" height="96">
                        </span>

                        <h5 class="text-center" style="margin-top: 10%">
                            {{ __('Browse within softwares with a powerful search engine') }}
                        </h5>
                    </div>
                    <div class="col-md-4 value-card">
                        <span>
                            <img src="{{ asset('vendor/blade-bootstrap-icons/search.svg') }}" alt="" srcset="" width="96" height="96">
                        </span>

                        <h5 class="text-center" style="margin-top: 10%">
                            {{ __('Browse within softwares with a powerful search engine') }}
                        </h5>
                    </div>
                </div>
            </div>
            <div class="">
                <h5 class="text-center display-5">
                    {{ __('Find the most suitable software for your organization taking in count your material an environnement requirements.') }}
                </h5>
            </div>
            <br>
            <div class="d-flex justify-content-center">
                <a class="btn btn-success btn-lg" href="{{ route('marketplace') }}" role="button" style="padding: 1% 5% 1% 5%">{{ __('Explore') }}</a>
            </div>
        </div>
    </section>
    <section id="features">
        <nav class="navbar navbar-expand-sm bg-light navbar-light position-sticky">
            <div class="container-fluid">
                <button class="navbar-toggler" style="width: 100%" type="button" data-toggle="collapse" data-target="#navbarFeatureContent" aria-controls="navbarFeatureContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <div >
                        <span class="navbar-brand">Features</span>
                        <span class="navbar-toggler-icon"></span>
                    </div>
                </button>
                <div class="collapse navbar-collapse" id="navbarFeatureContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item" style="font-size: 1.3em">
                            <a class="nav-link" href="#visibility" role="button">{{  __('Visibility')}}</a>
                        </li>
                        <li class="nav-item" style="font-size: 1.3em">
                            <a class="nav-link" href="#trends" role="button">{{  __('Trends')}}</a>
                        </li>
                        <li class="nav-item" style="font-size: 1.3em">
                            <a class="nav-link" href="#statistics" role="button">{{  __('Statistics')}}</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item" >
                            <a class="nav-link btn btn-primary text-white" role="button" href="{{ route('register') }}" style="width: 100%">
                                <span>{{ __('Sign Up ') }}</span><x-bi-arrow-right/>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div style="padding: 0.1% 1.5% 1.5% 2.5%;">
            <article id="visibility" style="margin: 2% 0% 2% 0%">
                <div class="row">
                    <div class="col-md-6">
                        <h2 class="display-4">{{ __('Enhance your visibility') }}</h2>
                        <p class="text-start">
                            {{ __('Join Logitek to let Africa discover your genuine software through a network of several countries accross africa') }}
                        </p>
                    </div>
                    <div class="col-md-6 d-flex justify-content-end">
                        <img src="https://99designs-blog.imgix.net/blog/wp-content/uploads/2019/03/What_is_digital_marketing_jpg_7ytL8TjA.jpg?auto=format&q=60&w=1280&h=1280&fit=crop&crop=faces" alt="visibility-illustrative-image" width="518" height="518" class="shadow rounded" style="//border-radius: 3%">
                    </div>
                </div>
            </article>
            <hr>
            <article id="trends" style="margin: 2% 0% 2% 0%">
                <div class="row">
                    <div class="col-6 d-flex justify-content-start">
                        <img src="https://99designs-blog.imgix.net/blog/wp-content/uploads/2021/12/Digital-marketing-trends-2022.jpg?auto=format&q=60&w=1860&h=1860&fit=crop&crop=faces" alt="trends-illustrative-image" class="shadow rounded" width="518" height="518">
                    </div>
                    <div class="col-6 float-right">
                        <h2 class="display-4">{{ __('Know what people are looking for') }}</h2>
                    </div>
                </div>
            </article>
            <hr>
            <article id="statistics" style="margin: 2% 0% 2% 0%">
                <div class="row">
                    <div class="col-md-6">
                        <h2 class="display-4">{{ __('Monitor activities on your softwares') }}</h2>
                    </div>
                    <div class="col-md-6 d-flex justify-content-end">
                        <img src="https://empmonitor.com/wp-content/uploads/2021/03/sky_rocket-1024x1024.png" width="518" height="518" alt="stats-monitoring-illustrative-image" class="shadow rounded" style="//background-color: rgb(247, 243, 243)">
                    </div>
                </div>
            </article>
        </div>
    </section>
    <section id="contribution" style="">
        <div class="container-fluid">
            <div class="col-md-4" id="contribute">
                <h2 class="display-4 font-weight-bold">
                    {{ __('Help Us') }}
                </h2>
                <p class="font-italic">
                    {{ __('
                        Logitek is a platform build with the desire to help developpers and IT organizations promote their software.
                        But also we are trying to help people, start-ups and business, and organization to find the best software that can lead to a better handling of their activities.
                        However, the project is completely unfinanced and needs your support to maintain it and improve its services.
                        Cause more has yet to come
                    ') }}
                </p>
                <div>
                    <a class="btn btn-primary" href="#" role="button">{{ __('Contribute') }}</a>
                </div>
            </div>
        </div>
    </section>
@endsection
