@extends('admin.adminBackOff')
@section('content')
<div class="card">
    <div class="row">
        <div class="col-md-7">
            <div class="card" style="margin: 1.5%" id="list">
                <div class="card-header">
                    <nav class="navbar">
                        <div class="container-fluid">
                            <span class="navbar-brand">
                                <h3><strong>{{ $count }}{{ __(' Sub-category') }}</strong></h3>
                            </span>
                        </div>
                    </nav>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="thead-dark">
                                <tr>
                                    <th>{{ __('ID') }}</th>
                                    <th>{{ __('Name') }}</th>
                                    <th>{{ __('Category') }}</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($subs as $sub)
                                <tr>
                                    <th>{{ $sub->id}}</th>
                                    <th>{{ $sub->name}}</th>
                                    <th>{{ $sub->categorie->name }}</th>
                                    <th><a href="{{ route('subcategories.edit', $sub->id) }}" type="button" class="btn btn-warning">{{ __('Edit') }}</a></th>
                                    <th>
                                        <form action="{{ route('subcategories.destroy', $sub->id) }}" method="post">
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
                    {{ $subs->links() }}
                </div>
            </div>
        </div>
        <div class="col-md-5" id="form">
            <div class="card" style="margin: 3%; padding: 3%">
                <div class="panel d-flex justify-content-center">
                    <h4><strong><span>{{ __('Create a new sub-category') }}</span></strong></h4>
                </div>
                <form action="{{ route('subcategories.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <div>
                            <label for="name">{{ __('Name') }}</label>
                        </div>
                        <div>
                            <input type="text" class="form-control" name="name" id="name">
                        </div>
                    </div>
                    <div class="form-group">
                        <div>
                            <label for="">{{ __('Choose a category') }}</label>
                        </div>
                        <div>
                            <select name="category" id="category" class="form-control">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->name }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div >
                        <input type="submit" class="btn btn-primary" style="width: 100%" value="Add new">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
