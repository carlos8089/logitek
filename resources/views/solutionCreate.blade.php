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
            <form action="" method="" id="sol-create-form">
                @csrf
                <div class="alert alert-dark">
                    {{ __('General informations')}}
                </div>
                <div class="form-group row">
                    <div class="col-md-3">
                        <label for="">{{ __('Name') }}</label>
                    </div>
                    <div class="col-md-7">
                        <input class="form-control" type="text" name="" id="">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-3">
                        <label for="">{{ __('Category') }}</label>
                    </div>
                    <div class="col-md-7">
                        <select class="form-control" name="" id="">
                            <option value=""></option>
                            <option value=""></option>
                            <option value=""></option>
                            <option value=""></option>
                            <option value=""></option>
                            <option value=""></option>
                            <option value=""></option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-3">
                        <label for="">{{ __('Sub-category') }}</label>
                    </div>
                    <div class="col-md-7">
                        <select class="form-control" name="" id="">
                            <option value=""></option>
                            <option value=""></option>
                            <option value=""></option>
                            <option value=""></option>
                            <option value=""></option>
                            <option value=""></option>
                            <option value=""></option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-3">
                        <label for="">{{ __('Operating platform') }}</label>
                    </div>
                    <div class="col-md-7">
                        <select name="" id="" class="form-control">
                            <option value="">All mobile platform</option>
                            <option value="">Android</option>
                            <option value="">iOS</option>
                            <option value="">Desktop</option>
                            <option value="">Client web</option>
                            <option value="">SaaS Software</option>
                            <option value="">Other(s)</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-3">
                        <label for="">{{ __('Mention a specific OS') }} <span>{{ __('(optional)')}}</span></label>
                    </div>
                    <div class="col-md-7">
                        <input class="form-control" type="text" name="" id="" placeholder="Use comma to separate element if there are several. (ex: Linux, Windows, Solaris...)">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-3">
                        <label for="">{{ __('Description') }}</label>
                    </div>
                    <div class="col-md-7">
                        <textarea class="form-control" name="" id="" cols="30" rows="10"></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-3">
                        <label for="">{{ __('Site') }}</label>
                    </div>
                    <div class="col-md-7">
                        <input class="form-control" type="url" name="" id="" placeholder="https://www.mysite.com">
                    </div>
                </div>
                <div class="alert alert-dark">
                    {{ __('Trading informations')}}
                </div>
                <div class="form-group row">
                    <div class="col-md-3">
                        {{ __('Type')}}
                    </div>
                    <div class="col-md-7">
                        <select class="form-control" name="" id="tradeType">
                            <option value="free">{{ __('Free of charge')}}</option>
                            <option value="rent">{{ __('Rent product')}}</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-3">
                        <label for="">{{ __('Currency') }}</label>
                    </div>
                    <div class="col-md-7">
                        <select class="form-control" name="" id="currencies" disabled>
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
                        <label for="">{{ __('Amount') }}</label>
                    </div>
                    <div class="col-md-7">
                        <input class="form-control" type="number" name="" id="amount" disabled>
                    </div>
                </div>
                <div class="d-flex justify-content-end">
                    <div class="col-4" style="font-size: 2.5em">
                        <input class="btn btn-success me-2" id="solCreateBtn" type="submit" value="Add Now" style="width: 100%">
                    </div> 
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
