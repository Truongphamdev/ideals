@extends('layouts.layout')
@section('title','Edit')

@section('content')
        <div class="row">
            @include('share.left_sidebar')
            <div class="col-6">
                @include('share.success_message')
                <div class="mt-3">
                    @include('share.user_edit_card')
                </div>
                <hr>
                 
                @forelse ($ideal as $idea)
                <div class="mt-3">
                    @include('ideas.share.card')
                </div>
                @empty
                <p class="text-center mt-4">No result found</p>
                @endforelse
                {{$ideal->withQueryString()->links()}}
            </div>
            <div class="col-3">
                @include('share.search')
                <div class="card mt-3">
                    @include('share.follow_box')
                </div>
            </div>
        </div>
        @endsection

  
