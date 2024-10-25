<div class="col-3">
    <div class="card overflow-hidden">
        <div class="card-body pt-3">
            <ul class="nav nav-link-secondary flex-column fw-bold gap-2">
                <li class="nav-item">
                    <a class="{{ Route::is('admin.admin') ? 'text-white bg-primary rounded' : 'text-dark' }} nav-link" href="{{ route('admin.admin') }}">
                        <span>Home</span></a>
                </li>
                <li class="nav-item">
                    <a class="{{ Route::is('admin.user.index') ? 'text-white bg-primary rounded' : 'text-dark' }} nav-link" href="{{ route('admin.user.index') }}">
                        <span>User</span></a>
                </li>
                <li class="nav-item">
                    <a class="{{ Route::is('admin.ideal.index') ? 'text-white bg-primary rounded' : 'text-dark' }} nav-link" href="{{ route('admin.ideal.index') }}">
                        <span>Ideas</span></a>
                </li>
                <li class="nav-item">
                    <a class="{{ Route::is('admin.comments.index') ? 'text-white bg-primary rounded' : 'text-dark' }} nav-link" href="{{ route('admin.comments.index') }}">
                        <span>Comments</span></a>
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