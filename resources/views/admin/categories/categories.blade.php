@extends('admin.adminBackOff')
@section('content')
    <div class="card">
        <div class="row">
            <div class="col-md-7" id="list" style="margin: 1.5%">
                <div class="card">
                    <div class="card-header">
                        <nav class="navbar">
                            <div class="container-fluid">
                                <span class="navbar-brand">
                                    <h3><strong>{{ $count }}{{ __(' catégories') }}</strong></h3>
                                </span>
                            </div>
                        </nav>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-stripped">
                                <thead class="thead-dark">
                                    <tr>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($categories as $categorie)
                                    <tr>
                                        <th>{{ $categorie->id}}</th>
                                        <th>{{ $categorie->name}}</th>
                                        <th><a href="{{ route('categories.edit', $categorie->id) }}" type="button" class="btn btn-warning">{{ __('Edit') }}</a></th>
                                        <th>
                                            <form action="{{ route('categories.destroy', $categorie->id) }}" method="post">
                                                @method('DELETE')
                                                @csrf
                                                <input type="submit" class="btn btn-danger" value="Delete">
                                            </form>
                                        </th>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center">
                        {{ $categories->links() }}
                    </div>
                </div>
            </div>
            <div class="col-md-4" id="form" style="margin-top: 1.5%;">
                <div class="card" style="padding: 2%">
                    <div class="panel d-flex justify-content-center">
                        <h4><strong><span>{{ __('Create a new category') }}</span></strong></h4>
                    </div>
                    <form action="{{ route('categories.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <div><label for="name">{{ __('Name') }}</label></div>
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
