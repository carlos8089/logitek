@extends('layouts.static')
@section('main')
    @switch($type)
        @case('solution')
            @if ($count == '0')
                <div class="container d-flex justify-content-center">
                    <div class="" style="margin: 2%">
                        <div class="" style="flex-direction: column">
                            <h3>
                                {{ __('Aucun résultat trouvé') }}
                            </h3>
                        </div>
                    </div>
                </div>
                <div class="container d-flex justify-content-center">
                    <span>{{ __('Vérifiez l\'orthographe de votre recherche ~ Ou explorer parmi les catégories') }}</span>
                </div>
                <div class="container-fluid">
                    @foreach ($categories as $categorie)
                        <div class="card alert col-md-3 d-inline-block" style="background-color: #f6f8fa;  margin: 2%">
                            <h3><strong>
                                <a href="{{ route('fcat', ['name'=>$categorie->name]) }}">{{ $categorie->name }}</a>
                            </strong></h3>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="container-fluid" style="margin-top: 3%">
                    @foreach ($items ?? '' as $sol)
                        <div class="card col-4 d-inline-block" style="background-color:#f6f8fa; margin: 0.2% 2% 3%">
                            <nav class="navbar">
                                <a href="{{ route('staticsolution', $sol->id) }}">
                                    <div class="">
                                        <span class="navbar-brand">
                                            <h2><strong>{{ $sol->name }}</strong></h2>
                                        </span>
                                        <span>
                                            <h2><strong>{{ $sol->amount }}</strong></h2>
                                        </span>
                                    </div>
                                </a>
                            </nav>
                            <div class="">
                                <h4>
                                    <span class="badge badge-primary badge-pill">{{ $sol->category }}</span>
                                    <span class="badge badge-primary badge-pill">{{ $sol->subcategory }}</span>
                                    <span class="badge badge-primary badge-pill">{{ $sol->platform }}</span>
                                </h4>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
            @break
        @case('publisher')
                @if ($count == '0')
                    <div class="container d-flex justify-content-center">
                        <div class="" style="margin: 2%">
                            <div class="" style="flex-direction: column">
                                <h3>
                                    {{ __('Aucun résultat trouvé') }}
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="container d-flex justify-content-center">
                        <span>{{ __('Vérifiez l\'orthographe de votre recherche ~ Ou explorer parmi les catégories') }}</span>
                    </div>
                @else
                    @foreach ($items as $pu)
                    <a href="{{ route('showpublisher', ['user'=>$pu->id]) }}">
                        <div class="col-4">
                            <h4>{{ $pu->name }}</h4>
                        </div>
                    </a>
                    @endforeach
                @endif
            @break
        @default
            <span>lo</span>
    @endswitch
@endsection
