@extends('admin.adminBackOff')
@section('content')
    <div class="container">
        <div class="card panel d-flex justify-content-center">
            <div class="col-md-6">
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
