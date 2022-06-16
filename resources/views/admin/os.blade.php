@extends('admin.adminBackOff')
@section('content')
    <div class="card">
        <div class="row" style="margin-bottom: 2%">
            <div class="col-md-7" id="list" style="margin: 1.5%">
                <div class="card">
                    <table class="table table-stripped">
                        <thead class="thead-dark">
                            <tr>
                                <th>{{ __('Name') }}</th>
                                <th>{{ __('Platform') }}</th>
                                <th>{{ __('N° of solutions') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($oses as $os)
                                <tr>
                                    <th>{{ $os->name }}</th>
                                    <th>{{ $os->platform->name }}</th>
                                    <th>{{ rand(1,10) }}</th>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-md-4" id="form" style="margin-top: 1.5%;">
                <div class="card" style="padding: 2%">
                    <div class="panel d-flex justify-content-center">
                        <h4><strong><span>{{ __('Add a new') }}</span></strong></h4>
                    </div>
                    <x-form action="{{ route('os.store') }}" method="post">
                        <div class="form-group">
                            <div><x-label for="name"/></div>
                            <div>
                                <input type="text" class="form-control" name="name" id="name">
                            </div>
                        </div>
                        <div class="form-group">
                            <div><x-label for="platform"/></div>
                            <div>
                                <select class="form-control" name="platform" id="platform">
                                    @foreach ($platforms as $plat)
                                        <option value="{{ $plat->id }}">{{ $plat->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div>
                            <input type="submit" class="btn btn-primary" value="Add" style="width: 100%">
                        </div>
                    </x-form>
                </div>
            </div>
        </div>
    </div>
@endsection
