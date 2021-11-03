@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="alert alert-secondary">
                            <span>
                                {{ __('General informations')}}
                            </span>
                        </div>
                        <div class="row">
                            <!--Nom-->
                            <div class="form-group col-md-6">
                                <div>
                                    <label for="name" class="col-form-label text-md-left">{{ __('Name') }}</label>
                                </div>
                                <div class="">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name">

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <!--Category-->
                            <div class="form-group col-md-6">
                                <label for="category" class="col-form-label text-md-right">{{ __('Choose a category') }}</label>

                                <div class="">
                                    <select name="category" type="text" class="form-control @error('category') is-invalid @enderror" id="category" >
                                        <option value="single">{{ __('Solo Developer') }}</option>
                                        <option value="team">{{ __('Team of developers') }}</option>
                                        <option value="enterprise">{{ __('Enterprise') }}</option>
                                    </select>
                                    @error('category')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <!--Pays-->
                            <div class="form-group col-md-6">
                                <div>
                                    <label for="country" class="col-form-label text-md-left">{{ __('Country') }}</label>
                                </div>
                                <div class="">
                                    <input id="country" type="text" class="form-control @error('country') is-invalid @enderror" name="country" value="{{ old('country') }}" required autocomplete="country">

                                    @error('country')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <!--Téléphone-->
                            <div class="form-group col-md-6">
                                <div>
                                    <label for="tel" class="col-form-label text-md-left">{{ __('Phone number') }}</label>
                                </div>
                                <div class="">
                                    <input id="tel" type="text" class="form-control @error('tel') is-invalid @enderror" name="tel" value="{{ old('tel') }}" required autocomplete="tel">

                                    @error('tel')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!--Site web-->
                        <div class="form-group">
                            <label for="website" class="col-form-label text-md-right">{{ __('Web site') }}</label>
                            <div class="">
                                <input id="website" type="text" class="form-control @error('website') is-invalid @enderror" name="website" value="{{ old('website') }}" required autocomplete="website">

                                @error('website')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="alert alert-secondary">
                            <span>
                                {{ __('Authentication informations')}}
                            </span>
                        </div>
                        <!--email-->
                        <div class="form-group">
                            <label for="email" class="col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="password" class="col-form-label text-md-right">{{ __('Password') }}</label>

                                <div class="">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="password-confirm" class="col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                <div class="">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>
                        </div>

                        <div class="form-group ">
                            <div class="">
                                <button type="submit" class="btn btn-primary" style="width: 100%">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
