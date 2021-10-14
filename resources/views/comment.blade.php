@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="alert">
            <h4><strong><span>{{ __('Add your comment') }}</span></strong></h4>
        </div>
        <div style="margin-bottom: 2%">
            <form action=" {{ route('comments.store') }} " method="post">
                @csrf
                <input class="form-control" type="text" name="solution" id="solution" value="{{ $sol_id }}" hidden>
                <textarea class="form-control" name="content" id="content" cols="30" rows="10"></textarea>
                <div class="d-flex justify-content-end" style="margin-top: 2%">
                    <a type="button" class="btn btn-danger" href="">{{ __('Cancel') }}</a>
                    <input class="btn btn-outline-success" type="submit" value="Add">
                </div>
            </form>
        </div>
    </div>
@endsection
