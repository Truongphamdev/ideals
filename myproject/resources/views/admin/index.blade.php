@extends('layouts.layout')

@section('title','Admin Dashboard')
@section('content')
    <div class="row">

        @include('admin.shared.left_side')

        <div class="col-9">
            <h1>Admin Dashboard</h1>
            <div class="row">
                <div class="col-sm-6 col-md-4">
                    @include('share.widge',[
                        'title'=>'Total Users',
                        'icon'=>'fas fa-users',
                        'data'=>$totalUsers
                    ])
                </div>
                <div class="col-sm-6 col-md-4">
                    @include('share.widge',[
                        'title'=>'Total Ideas',
                        'icon'=>'fas fa-lightbulb',
                        'data'=>$totalIdeas
                    ])
                </div>  <div class="col-sm-6 col-md-4">
                    @include('share.widge',[
                        'title'=>'Total Comments',
                        'icon'=>'fas fa-comment',
                        'data'=>$totalComments
                    ])
                </div>
            </div>
        </div>

    </div>
@endsection
