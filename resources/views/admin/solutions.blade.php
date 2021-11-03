@extends('admin.adminBackOff')
@section('content')
    <div class="alert d-flex justify-content-center">
        <h2>
            {{ $totalSolution }} {{ __(' solutions till now') }}
        </h2>
    </div>
    <div class="card">
        <div class="card-header">
            {{ __('Categories') }}
        </div>
        <div class="card-body">
            <table>

            </table>
        </div>
    </div>
@endsection
