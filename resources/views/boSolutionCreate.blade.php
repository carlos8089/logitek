@extends('layouts.backoff')
@section('boContent')
<div class="alert alert-primary">
    <nav class="navbar">
        <div class="container-fluid">
            <span class="navbar-brand">
                <h3><strong>{{ __('Add a new solution') }}</strong></h3>
            </span>
        </div>
    </nav>
</div>
<div class="card">
    <div class="card-body">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        <div class="container-fluid">
            <x-form action="{{ route('solutions.store') }}" id="sol-create-form" has-files>
                <div class="alert alert-dark">
                    {{ __('General informations')}}
                </div>
                <div class="form-group row">
                    <div class="col-md-3">
                        <x-label for="name"/>
                    </div>
                    <div class="col-md-7">
                        <x-input class="form-control"  name="name" id=""/>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-3">
                        <x-label for="category"/>
                    </div>
                    <div class="col-md-7">
                        <select class="form-control" name="category" id="">
                            @foreach ($categories as $cat)
                                <option value="{{ $cat->name }}">{{ $cat->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-3">
                        <x-label for="subcategory"/>
                    </div>
                    <div class="col-md-7">
                        <select class="form-control" name="subcategory" id="">
                            @foreach ($subcategories as $sub)
                                <option value="{{ $sub->name }}">{{ $sub->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-3">
                        <x-label for="platform"/>
                    </div>
                    <div class="col-md-7">
                        <select name="platform" id="" class="form-control">
                            @foreach ($platforms as $plat)
                                <option value="{{ $plat->name }}">{{ $plat->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-3">
                        <x-label for="operating_system"/> <span>{{ __('(Optional)') }}</span>
                    </div>
                    <div class="col-md-7">
                        <x-input class="form-control" name="os" id="" placeholder=""/>
                        <small class="form-text- text-muted">
                            {{ __('Use comma to separate element if there are several. (ex: Linux, Windows, Solaris...)') }}
                        </small>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-3">
                        <x-label for="description"/>
                    </div>
                    <div class="col-md-7">
                        <x-textarea class="form-control" name="desc" id="" cols="30" rows="10"/>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-3">
                        <x-label for="screenshots"/>
                    </div>
                    <div class="col-md-7">
                        <x-input class="btn btn-primary" type="file" name="screens[]" id="" multiple/>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-3">
                        <x-label for="site"/>
                    </div>
                    <div class="col-md-7">
                        <x-input class="form-control" type="url" name="site" id="" placeholder=""/>
                        <small class="form-text text-muted">
                            {{ _('Example : https://www.mysite.com') }}
                        </small>
                    </div>
                </div>
                <div class="alert alert-dark">
                    {{ __('Trading informations')}}
                </div>
                <div class="form-group row">
                    <div class="col-md-3">
                        <x-label for="type"/>
                    </div>
                    <div class="col-md-7">
                        <select class="form-control" name="sellable" id="tradeType">
                            <option value="0">{{ __('Free of charge')}}</option>
                            <option value="1">{{ __('Rent product')}}</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-3">
                        <x-label for="currency"/>
                    </div>
                    <div class="col-md-7">
                        <select class="form-control" name="currency" id="currencies" disabled>
                            <option value="">XOF (FCFA)</option>
                            <option value="">Ghana Cidis</option>
                            <option value="">Naira</option>
                            <option value="">US Dollar</option>
                            <option value="">Euro</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-3">
                        <x-label for="amount"/>
                    </div>
                    <div class="col-md-7">
                        <x-input class="form-control" type="number" name="amount" id="amount" disabled/>
                    </div>
                </div>
                <div class="d-flex justify-content-end">
                    <div class="col-4" style="font-size: 2.5em">
                        <input class="btn btn-success me-2" id="solCreateBtn" type="submit" value="Add Now" style="width: 100%">
                    </div>
                </div>
            </x-form>
        </div>
    </div>
</div>
@endsection
