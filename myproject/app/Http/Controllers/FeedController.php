<?php

namespace App\Http\Controllers;

use App\Models\ideals;
use Illuminate\Http\Request;

class FeedController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $user = auth()->user();

        $followingId = $user->followings()->pluck('user_id');
        // dd($followingId);
        $ideals = ideals::WhereIn('user_id',$followingId)->latest();
        if ($request->has('search')) {
            $ideals = $ideals->search($request->input('search',''));
        }
        return view('home',['ideals'=>$ideals->paginate(2)]);
    }
}
