@extends('admin.adminBackOff')
@section('content')
    <div class="d-flex justify-content-start" style="margin: 2% 0% 2%">
        <h2>
            <strong>{{ $totalSolution }} {{ __(' solutions till now') }}</strong>
        </h2>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="card" id="byCategories">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead class="thead-dark">
                            <th>{{ __('Categories') }}</th>
                            <th>{{ __('N° of Solutions') }}</th>
                        </thead>
                        <tbody>
                            @foreach ($byCat->chunk(1) as $cat)
                                <tr>
                                    <th>{{ $cat->implode('name') }}</th>
                                    <th>{{ $cat->implode('number') }}</th>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card" id="bySubcategories">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead class="thead-dark">
                            <th>{{ __('Sub-categories') }}</th>
                            <th>{{ __('N° of Solutions') }}</th>
                        </thead>
                        <tbody>
                            @foreach ($bySub->chunk(1) as $sub)
                                <tr>
                                    <th>{{ $sub->implode('name') }}</th>
                                    <th>{{ $sub->implode('number') }}</th>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


@endsection
