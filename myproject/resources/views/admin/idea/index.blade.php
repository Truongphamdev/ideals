@extends('layouts.layout')

@section('title','Idea |Admin Dashboard')
@section('content')
    <div class="row">

        @include('admin.shared.left_side')

        <div class="col-9">
            <h1>User</h1>
            <table class="table table-striped mt-3">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>User_name</th>
                        <th>Content</th>
                        <th>Created At</th>
                        <th>View</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($ideals as $idea)
                    <tr>
                        <td>{{$idea->user_id}}</td>
                        <td><a href="{{route('user.show',$idea->user)}}">{{$idea->user->name}}</a></td>
                        <td>{{$idea->content}}</td>
                        <td>{{$idea->created_at->todateString()}}</td>
                        <td>
                            <a href="{{route('ideas.show',$idea)}}">view </a>
                            <a href="{{route('ideal.edit',$idea)}}">edit </a>

                        </td>
                    </tr>                                           
                    @endforeach
                </tbody>
            </table>
            <div>
                {{$ideals->withQueryString()->links()}}
            </div>
        </div>

    </div>
@endsection
