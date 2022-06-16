<div class="row" id="filters">
    <!-- Modal trigger button -->
    <div class="col-md-3">
        <button type="button" class="btn btn-secondary " data-toggle="modal" data-target="#advanced-filter" style="width: 100%; height:100%">
            {{ __('Advanced filters') }}
            <span style="//margin-left: 3%"><x-bi-gear/></span>
        </button>
    </div>
    <!-- Modal for advanced filter options -->
    <div id="advanced-filter" class="modal fade" tabindex="-1" aria-labelledby="advanced-filterLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="font-weight-bold text-center" id="advanced-filterLabel">Refine your research</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <x-form method="get" action="{{ route('advancedfilter') }}" id="advanced-filter-form">
                            @csrf
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        <x-label for="category"/>
                                    </div>
                                    <div class="col-md-8">
                                        <select name="category" class="form-control" id="">
                                            @foreach ($categories as $cat)
                                                <option value="{{$cat->id}}">{{$cat->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        <x-label for="subcategory"/>
                                    </div>
                                    <div class="col-md-8">
                                        <select name="subcategory" class="form-control" id="">
                                            @foreach ($subcategories as $sub)
                                                <option value="{{$sub->id}}">{{$sub->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        <x-label for="platform"/>
                                    </div>
                                    <div class="col-md-8">
                                        <select name="platform" class="form-control" id="">
                                            @foreach ($platforms as $plat)
                                                <option value="{{$plat->id}}">{{$plat->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        <x-label for="OS"/>
                                    </div>
                                    <div class="col-md-8">
                                        <select name="os" class="form-control" id="">
                                            @foreach ($oses as $os)
                                                <option value="{{$os->id}}">{{$os->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        <x-label for="country"/>
                                    </div>
                                    <div class="col-md-8">
                                        <select name="country" id="" class="form-control">
                                            @foreach ($countries as $c)
                                                <option value="{{$c->id}}">{{$c->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div>
                                    <x-label for="prices"/>
                                </div>
                                <div>
                                    <x-input type="range" class="form-control" name="price" oninput="num.value = this.value" min="0" max="10000" value="100" step="100"/>
                                    <span>0 - </span><output id="num">100</output>
                                </div>
                            </div>
                            <div class="form-group">
                                <div>
                                    <x-label for="published_between"/>
                                </div>
                                <div class="row">
                                    <div class="col-md-5">
                                        <input type="date" class="form-control" name="dateInf" id="">
                                    </div>
                                    <div class="col-md-2">
                                        <span>{{ __(' and ') }}</span>
                                    </div>
                                    <div class="col-md-5">
                                        <input type="date" class="form-control" name="dateSup" id="">
                                    </div>
                                </div>
                            </div>
                        </x-form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-warning" onclick="f()">
                        Reset
                    </button>
                    <button type="button" class="btn btn-primary" onclick="e()" style="margin-left: 25px">
                        Apply filter
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!-- Basic filter -->
    <div class="col-md-9">
        <div class="" style="//padding: 1%">
            <div class="//bg-dark">
                <x-form class="form-row align-item-end" method="get" action="{{ route('filter') }}" style="margin-bottom:0; justify-content:end">
                    <h4 class="font-weight-bold text-center">{{ __('Filter by') }}</h4>
                    <div class="col-4">
                        <x-label for="subcategory" class="sr-only"/>
                        <select class="form-control" name="subcategory">
                            <option value="">{{ __('Subcategory') }}</option>
                            @foreach ($subcategories as $sub)
                                <option value="{{$sub->id}}">{{$sub->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-4">
                        <x-label for="platform" class="sr-only" />
                        <select class="form-control" name="platform">
                            <option value="">{{ __('Platform') }}</option>
                            @foreach ($platforms as $plat)
                                <option value="{{$plat->id}}" >{{$plat->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary">{{ __('Apply') }}</button>
                    </div>
                </x-form>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
    $('[data-toggle="popover"]').popover();
});
function e(){
    document.getElementById('advanced-filter-form').submit();
}
function f(){
    document.getElementById('advanced-filter-form').reset();
}

</script>
