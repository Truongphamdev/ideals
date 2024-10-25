<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCommentRequest;
use App\Models\Comment;
use App\Models\ideals;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(StoreCommentRequest $request , ideals $idea) {
        $request->validated();
        $conmment = new Comment();
        $conmment->idea_id = $idea->id;
        $conmment->user_id=auth()->id();
        $conmment->content = request()->get('content');
        $conmment->save();
        return redirect()->route('ideas.show',$idea->id)->with('success','comment post successfully');
    }
}
