@extends('layouts.backoff')
@section('boContent')
    <div>
        <form action="{{route('solutions.update', $sol)}}" method='post'>
            @method('PATCH')
            @csrf
            <div class="form-group row">
                <div class="col-md-3">
                    <label for="name">{{ _('Name') }}</label>
                </div>
                <div class="col-md-7">
                    <input type="text" class="form-control" id="name" name="name">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-3">
                    <label for="desc">{{ _('Description') }}</label>
                </div>
                <div class="col-md-7">
                    <textarea class="form-control" id="desc" name="desc"></textarea>
                </div>
            </div>
            <div class="d-flex justify-content-center">
                <button class="btn btn-success" type="submit">Update</button>
            </div>
        </form>
    </div>
@endsection
