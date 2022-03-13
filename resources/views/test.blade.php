@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <x-form action=" {{ route('staticuser') }} " method="get">
                        <x-input class="form-control" name="user" />
                        <button class="form-control btn btn-info" type="submit">Clique ici</button>
                    </x-form>
                </div>
            </div>
        </div>
    </div>
@endsection
