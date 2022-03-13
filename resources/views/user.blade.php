@extends('layouts.static')
@section('main')
    <div class="container" style="margin-top: 2%; margin-bottom: 8%">
        @foreach ($users as $user)
            <div class="row">
                <div class="col-md-3">

                </div>
                <div class="col-md-9">
                    <div><h2>{{ $user->name }}</h2></div>
                    <div>{{ $user->category }}</div>
                    <div><span>{{ __('from ') }}{{ $user->country }}</span></div>
                    <div>
                        {{ $solutionCount }} <span>{{ __('solutions since') }}</span> {{ $user->created_at }}
                    </div>
                    <div>
                        <nav>
                            <span class="navbar-brand" >{{ __('Contacts') }}</span>
                            <div>
                                <span style="margin-right: 3%">{{ __('Web site: ') }} <a href="{{ $user->website }}">{{ $user->website }}</a> </span>
                                <span style="margin-right: 3%">{{ _('Email: ') }}<a type="email" href="mailto:{{ $user->email }}">{{ $user->email }}</a></span>
                                <span>{{ __('Phone number: ') }}<a href="">{{ $user->tel }}</a></span>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="row" style="margin-top: 1.5%">
                <div class="card">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>{{ __('Name') }}</th>
                                <th>{{ __('Category') }}</th>
                                <th>{{ __('Sub-category') }}</th>
                                <th>{{ __('PLatform') }}</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($solutions as $item)
                            <div>
                                <tr>
                                    <th>{{$item->name}}</th>
                                    <th>{{$item->category}}</th>
                                    <th>{{$item->subcategory}}</th>
                                    <th>{{$item->platform}}</th>
                                    <th><a type="button" class="btn btn-outline-info" href="{{ route('solutions.show', ['solution'=>$item->id]) }}">Show</a></th>
                                </tr>
                            </div>

                            @endforeach
                        </tbody>
                    </table>
                    {{$solutions->links()}}
                </div>
            </div>
        @endforeach
    </div>
@endsection
