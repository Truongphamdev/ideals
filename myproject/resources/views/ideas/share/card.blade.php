@extends('layouts.link')

<div class="card">
    <div class="px-3 pt-4 pb-2">
        <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <img style="width:50px" class="me-2 avatar-sm rounded-circle"
                    src="{{$idea->user->getImageURL()}}" alt="{{$idea->user->name}}">
                <div>
                    <h5 class="card-title mb-0"><a href="{{route('user.show',$idea->user->id)}}">  {{$idea->user->name}}
                        </a></h5>
                </div>
            </div>
            <div>
                <form action="{{ route('ideal.delete', $idea->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <a href="{{route('ideas.show',$idea->id)}}">view</a>
                @auth
                @can('ideal.edit', $idea)
                <a href="{{route('ideal.edit',$idea->id)}}">Edit</a>
                <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                @endcan
                @endauth
                </form>
            </div>
        </div>
    </div>
    <div class="card-body">
        @if($isEditing ?? false) 
            <form action="{{ route('ideal.update', $idea->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <textarea name="idea" class="form-control" id="idea" rows="3">{{ old('idea', $idea->content) }}</textarea>
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
                <div>
                    <button class="btn btn-dark"> Share </button>
                </div>
            </form>
        @else 
                <p class="fs-6 fw-light text-muted">
                    {{ $idea->content }}
                </p>
        @endif
    
        <div class="d-flex justify-content-between">
            @include('ideas.share.like_button')
            <div>
                <span class="fs-6 fw-light text-muted"> <span class="fas fa-clock"> </span>
                    {{$idea->created_at->diffForHumans()}} </span>
            </div>
        </div>
        @include('share.comment')
    </div>
</div>