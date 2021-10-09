@extends('layouts.app')
@section('content')
    <div>
        <form action="{{ route('uploads') }}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="file" name="screen[]" id="screen" multiple="yes">
            <input type="submit" value="Envoyer">
        </form>
    </div>
@endsection
