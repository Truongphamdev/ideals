<div class="col-3">
    <div class="card overflow-hidden">
        <div class="card-body pt-3">
            <ul class="nav nav-link-secondary flex-column fw-bold gap-2">
                <li class="nav-item">
                    <a class="{{ Route::is('index') ? 'text-white bg-primary rounded' : 'text-dark' }} nav-link" href="{{ route('index') }}">
                        <span>Home</span></a>
                </li>
                <li class="nav-item">
                    <a class="{{ Route::is('term') ? 'text-white bg-primary rounded' : 'text-dark' }} nav-link" href="{{ route('term') }}">
                        <span>Term</span></a>
                </li>
                <li class="nav-item">
                    <a class="{{ Route::is('feed') ? 'text-white bg-primary rounded' : 'text-dark' }} nav-link" href="{{ route('feed') }}">
                        <span>Feed</span></a>
                </li>
                <li class="nav-item">
                    <a class="{{ Route::is('profile') ? 'text-white bg-primary rounded' : 'text-dark' }} nav-link" href="{{ route('profile') }}">
                        <span>Profile</span></a>
                </li>
            </ul>
        </div>
        <div class="card-footer text-center py-2">
            <a class="btn btn-link btn-sm" href="{{route('lang','en')}}">En</a>
            <a class="btn btn-link btn-sm" href="{{route('lang','es')}}">Es</a>
            <a class="btn btn-link btn-sm" href="{{route('lang','vi')}}">Vi</a>
        </div>
    </div>
</div>