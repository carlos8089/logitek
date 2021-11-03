@extends('admin.adminBackOff')
@section('content')
    <div class="card">
        <div class="row">
            <div class="col-md-7" id="list">
                <div class="card" style="margin: 1.5%">
                    <nav class="navbar">
                        <div class="container-fluid">
                            <span class="navbar-brand">
                                <h3><strong>{{ $count }}{{ __(' platforms') }}</strong></h3>
                            </span>
                        </div>
                    </nav>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>{{ __('ID') }}</th>
                                    <th>{{ __('Name') }}</th>
                                    <th>{{ __('N° de solutions') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($platforms as $platform)
                                    <tr>
                                        <th>{{ $platform->id }}</th>
                                        <th>{{ $platform->name }}</th>
                                        <th>{{ __('ID') }}</th>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="d-flex justify-content-center">
                        {{ $platforms->links() }}
                    </div>
                </div>
            </div>
            <div class="col-md-5" id="form">
                <div class="card" style="margin: 2%; padding: 3%">
                    <div class="panel d-flex justify-content-center">
                        <h4><strong><span>{{ __('Create a new platform') }}</span></strong></h4>
                    </div>
                    <form action="{{ route('platforms.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <div>
                                <label for="name">{{ __('Name') }}</label>
                            </div>
                            <div>
                                <input type="text" class="form-control" name="name" id="name">
                            </div>
                        </div>
                        <div>
                            <input type="submit" class="btn btn-primary" value="Add" style="width: 100%">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
