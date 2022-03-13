@extends('layouts.static')
@section('main')
    @switch($type)
        @case('category')
                <div class="container">
                    <div class="alert">
                        <h3>
                            {{ __('Categories : ') }} {{ $category }}
                        </h3>
                    </div>
                </div>
                @foreach ($fsols as $fsol)
                    <div class="card alert col-md-3 shadow d-inline-block" style="background-color: #f6f8fa; margin: 0.2% 3.5% 3%">
                        <div class="row">
                            <div class="col-8">
                                <h4>
                                    <a href="{{ route('staticsolution', $fsol->id) }}">{{ $fsol->name }}</a>
                                </h4>
                            </div>
                            <div class="col-4">
                                {{ $fsol->amount }}
                            </div>
                        </div>
                        <div>
                            <span class="badge badge-primary badge-pill">{{ $fsol->category }}</span>
                            <span class="badge badge-primary badge-pill">{{ $fsol->subcategory }}</span>
                            <span class="badge badge-primary badge-pill">{{ $fsol->platform }}</span>
                        </div>
                    </div>
                @endforeach
                <div class="container d-flex justify-content-center">
                    {{ $fsols->links() }}
                </div>
            @break
        @case('subcategory')
            <div class="container">
                <div class="alert">
                    <h3>
                        {{ __('Sub-category : ') }} {{ $subcategory }}
                    </h3>
                </div>
            </div>
            @foreach ($fsols as $fsol)
                <div class="card alert col-md-3 shadow d-inline-block" style="background-color: #f6f8fa; margin: 0.2% 3.5% 3%">
                    <div class="row">
                        <div class="col-8">
                            <h4>
                                <a href="{{ route('staticsolution', $fsol->id) }}">{{ $fsol->name }}</a>
                            </h4>
                        </div>
                        <div class="col-4">
                            {{ $fsol->amount }}
                        </div>
                    </div>
                    <div>
                        <span class="badge badge-primary badge-pill">{{ $fsol->category }}</span>
                        <span class="badge badge-primary badge-pill">{{ $fsol->subcategory }}</span>
                        <span class="badge badge-primary badge-pill">{{ $fsol->platform }}</span>
                    </div>
                </div>
            @endforeach
            <div class="container d-flex justify-content-center">
                {{ $fsols->links() }}
            </div>
            @break
        @case('platform')
            <div class="container">
                <div class="alert">
                    <h3>
                        {{ __('Platform : ') }} {{ $platforme }}
                    </h3>
                </div>
            </div>
            @foreach ($fsols as $fsol)
                <div class="card alert col-md-3 shadow d-inline-block" style="background-color: #f6f8fa; margin: 0.2% 3.5% 3%">
                    <div class="row">
                        <div class="col-8">
                            <h4>
                                <a href="{{ route('staticsolution', $fsol->id) }}">{{ $fsol->name }}</a>
                            </h4>
                        </div>
                        <div class="col-4">
                            {{ $fsol->amount }}
                        </div>
                    </div>
                    <div>
                        <span class="badge badge-primary badge-pill">{{ $fsol->category }}</span>
                        <span class="badge badge-primary badge-pill">{{ $fsol->subcategory }}</span>
                        <span class="badge badge-primary badge-pill">{{ $fsol->platform }}</span>
                    </div>
                </div>
            @endforeach
            <div class="container d-flex justify-content-center">
                {{ $fsols->links() }}
            </div>
            @break
        @default
    @endswitch
@endsection
