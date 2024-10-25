@auth
<h4> {{__('ideas.login')}}  </h4>
<div class="row">
    <form action="{{route('store')}}" method="POST" enctype="multipart/form-data">
        @csrf
    <div class="mb-3">
        <textarea name="idea" class="form-control" id="idea" rows="3"></textarea>
    </div>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <div class="">
        <button class="btn btn-dark"> Share </button>
    </div>
</form>
</div>
    
@endauth
@guest
<h4>Login Share yours ideas </h4>
    
@endguest