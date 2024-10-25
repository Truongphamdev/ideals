@extends('layouts.layout')
@section('title','Term')

@section('content')
<div class="row">
    @include('share.left_sidebar')
    <div class="col-6">
        @include('share.success_message')
        @include('ideas.share.share')
        <hr>
    </div>
    <div class="col-3">
        @include('share.search')
        <div class="card mt-3">
            @include('share.follow_box')
        </div>
    </div>
@endsection
