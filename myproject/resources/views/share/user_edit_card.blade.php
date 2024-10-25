
<div class="card">
    <div class="px-3 pt-4 pb-2">
        <form action="{{route('user.update',$user->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
        <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <img style="width:150px" class="me-3 avatar-sm rounded-circle"
                    src="{{$user->getImageURL()}}" alt="Mario Avatar">
                    <input name="name" type="text" class="form control" value="{{$user->name}}">
                    @error('name')
                        <span class="text-danger fs-6 ">{{$message}}</span>
                    @enderror
            </div>
            @auth
            @if (Auth::id()== $user->id)
            <div>
                <a href="{{route('user.show',$user->id)}}">View</a>
            </div>
            @endif
            @endauth
        </div>
        <div class="mt-2">
            <label for="image">Profile picture</label>
            <input type="file" class="form-control" name="image">
            @error('image')
            <span class="text-danger fs-6 ">{{$message}}</span>
        @enderror
        </div>
        <div class="px-2 mt-4">
            <h5 class="fs-5"> About : </h5>
            <div class="mb-3">
                <textarea name="bio"  class="form-control" id="bio" rows="3">{{$user->bio}}</textarea>
                @error('bio')
                    <span class="d-block fs-6 text-danger mt-2">{{$message}}</span>
                @enderror
            </div>
            <button class="btn btn-danger mb-2">Save</button>
           @include('user.user_status')
        </div>
    </form>
    </div>
</div>
<hr>
