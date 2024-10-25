<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\ideals;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class adminController extends Controller
{
    public function index() {
        $totalUsers = User::count();
        $totalIdeas = ideals::count();
        $totalComments = Comment::count();

        return view('admin.index',compact('totalUsers','totalIdeas','totalComments'));
    }
}
