@extends('layouts.layout')
@section('title','Home')
@section('content')
    <div class="row">

            @include('share.left_sidebar')

        <div class="col-6">
            @include('share.success_message')
            @include('ideas.share.share')
            <hr>
                @forelse ($ideals as $idea)
                <div class="mt-3">
                    @include('ideas.share.card')
                </div>         
                @empty
                    <p class="text-center mt-4">No Result Found</p>
                @endforelse
            <div class="mt-3">
                {{$ideals->withQueryString()->links()}}
            </div>
        </div>
        <div class="col-3">
            @include('share.search')
            @include('share.follow_box')
        </div>
    </div>
@endsection
