<nav class="navbar navbar-expand-lg bg-dark border-bottom border-bottom-dark ticky-top bg-body-tertiary"
data-bs-theme="dark">
<div class="container">
    <a class="navbar-brand fw-light" href="/"><span class="fas fa-brain me-1"> </span>Ideas</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
        <ul class="navbar-nav">
            @guest
                
            <li class="nav-item">
                <a class="{{ (Route::is('login')) ? 'text-white bg-success rounded' : 'white-dark' }} nav-link" aria-current="page" href="{{ route('login') }}">Login</a>
            </li>
            <li class="nav-item">
                <a class="{{ (Route::is('idea.register')) ? 'text-white bg-success rounded' : 'white-dark' }} nav-link" href="{{ route('idea.register') }}">Register</a>
            </li>
            
            @endguest
            @auth  
            @if (Auth::user()->is_admin)
            <li class="nav-item">
                <a class="{{ (Route::is('admin.admin')) ? 'active' : 'white-dark'}} nav-link " href="{{ route('admin.admin')}} ">Admin DashBoard</a>
            </li>
            @endif
                <li class="nav-item">
                    <a class="{{ (Route::is('user.show',Auth::user()->id)) ? 'active' : 'white-dark' }} nav-link " href="{{route('user.show',Auth::user()->id)}}">{{Auth::user()->name}}</a>
                </li>
                <li class="nav-item">
                <form action="{{route('logout')}}" method="post">
                    @csrf
                    <button class="btn btn-block btn-danger">Logout</button>
                </form>
            </li>  
            @endauth
        </ul>
    </div>
</div>
</nav>