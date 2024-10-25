<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class FollowController extends Controller
{
    public function follow(User $user) {
        $follower = auth()->user();

        $follower->followings()->attach($user);
        return redirect()->route('user.show', $user->id)->with('success', 'follow successfully');

    }
    public function unfollow(User $user) {
        $follower = auth()->user();

        $follower->followings()->detach($user);
        return redirect()->route('user.show', $user->id)->with('success', 'unfollow successfully');

    }
}
