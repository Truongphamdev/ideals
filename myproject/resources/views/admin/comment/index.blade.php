@extends('layouts.layout')

@section('title','Comment |Admin Dashboard')
@section('content')
    <div class="row">

        @include('admin.shared.left_side')

        <div class="col-9">
            <h1>Comment</h1>
            @include('share.success_message')

            <table class="table table-striped mt-3">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>User_name</th>
                        <th>Idea</th>
                        <th>Content</th>
                        <th>Created At</th>
                        <th>View</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($comments as $comment)
                    <tr>
                        <td>{{$comment->user_id}}</td>
                        <td><a href="{{route('user.show',$comment->user)}}">{{$comment->user->name}}</a></td>
                        <td><a href="{{route('ideas.show',$comment->idea)}}">{{$comment->idea->id}}</a></td>
                        <td>{{$comment->content}}</td>
                        <td>{{$comment->created_at->todateString()}}</td>
                        <td>
                            <form action="{{route('admin.comments.destroy',$comment)}}" method="post">
                                @csrf
                                @method('delete')
                                <a href="#" onclick="this.closest('form').submit();return false;">Delete</a>
                            </form>
                        </td>
                    </tr>                                           
                    @endforeach
                </tbody>
            </table>
            <div>
                {{$comments->withQueryString()->links()}}
            </div>
        </div>

    </div>
@endsection
