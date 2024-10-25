<?php

namespace App\Http\Controllers;

use App\Models\ideals;
use Illuminate\Http\Request;

class IdeaLikeController extends Controller
{
    public function like(ideals $idea) {
        $liker = auth()->user();
        $liker->like()->attach($idea);
        return redirect()->route('index')->with('success', 'Liked successfully');
        
    }
    public function unlike(ideals $idea) {
        $liker = auth()->user();
        $liker->like()->detach($idea);
        return redirect()->route('index')->with('success', 'UnLiked successfully');
    }
}
