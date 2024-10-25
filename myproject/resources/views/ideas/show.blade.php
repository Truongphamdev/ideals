@extends('layouts.layout')
@section('title','View Idea')

@section('content')
        <div class="row">
            @include('share.left_sidebar')
            <div class="col-6">
                @include('share.success_message')
                <div class="mt-3">
                    @include('ideas.share.card')
                </div>
            </div>
            <div class="col-3">
                @include('share.search')
                <div class="card mt-3">
                    @include('share.follow_box')

                </div>
            </div>
        </div>
        @endsection

  
