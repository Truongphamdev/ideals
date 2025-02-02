<div>
    @auth

    @if (Auth::user()->likedPost($idea))
    <form action="{{route('unlike',$idea->id)}}" method="post">
        @csrf
        <button type="submit" class="fw-light nav-link fs-6"> <span class="fas fa-heart me-1">
        </span> {{$idea->like_count}} </button>
    </form>
    @else

    <form action="{{route('like',$idea->id)}}" method="post">
        @csrf
        <button type="submit" class="fw-light nav-link fs-6"> <span class="far fa-heart me-1">
        </span> {{$idea->like_count}} </button>
    </form>
            
    @endif
            
    @endauth
    @guest
    <a href="{{route('login')}}" class="fw-light nav-link fs-6"> <span class="far fa-heart me-1">
    </span> {{$idea->like_count}} </a>
    @endguest
</div>