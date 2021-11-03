<div class="col-md-2" style="#background-color: green">
    <div class="card">
        <div class="card-body">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <div>
                        <a class="nav-link" href="{{ route('Admin') }}">{{ __('Dashboard') }}</a>
                    </div>
                </li>
                <li class="nav-item">
                    <div>
                        <a class="nav-link" href="{{ url('/admin/categories') }}">{{ __('Cateories') }}</a>
                    </div>
                </li>
                <li class="nav-item">
                    <div>
                        <a class="nav-link" href="{{ url('/admin/subcategories') }} ">{{ __('Sub-categories') }}</a>
                    </div>
                </li>
                <li class="nav-item">
                    <div>
                        <a class="nav-link" href="{{ url('/admin/platforms') }} ">{{ __('Platforms') }}</a>
                    </div>
                </li>
                <li class="nav-item">
                    <div>
                        <a class="nav-link" href="{{ url('/admin/users') }} ">{{ __('Users') }}</a>
                    </div>
                </li>
                <li class="nav-item">
                    <div>
                        <a class="nav-link" href="{{ url('/admin/solutions') }} ">{{ __('Solutions') }}</a>
                    </div>
                </li>
                <li class="nav-item">
                    <div>
                        <a class="nav-link" href="{{ url('/admin/messages') }} ">{{ __('Messages') }}</a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <div class="card" style="margin-top: 2%">
        <a href="{{ url('/') }}" class="btn btn-primary" style="width: 100%">{{ __('Go to Library') }}</a>
    </div>
    <div class="card" style="margin-top: 2%">
        <a href="{{ url('/home') }}" class="btn btn-primary" style="width: 100%">{{ __('Go to Home') }}</a>
    </div>
</div>
