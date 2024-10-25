@extends('layouts.layout')

@section('title','User | Admin Dashboard')
@section('content')
    <div class="row">

        @include('admin.shared.left_side')

        <div class="col-9">
            <h1>User</h1>
            <table class="table table-striped mt-3">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Joined At</th>
                        <th>View</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <td>{{$user->id}}</td>
                        <td><a href="{{route('user.show',$user)}}">{{$user->name}}</a></td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->created_at->todateString()}}</td>
                        <td>
                            <a href="{{route('user.show',$user)}}">view </a>
                            <a href="{{route('user.edit',$user)}}">edit </a>

                        </td>
                    </tr>                                           
                    @endforeach
                </tbody>
            </table>
            <div>
                {{$users->withQueryString()->links()}}
            </div>
        </div>

    </div>
@endsection
