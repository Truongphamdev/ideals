<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class userController extends Controller
{
    public function index() {
        $users = User::latest()->paginate(5);
        return view('admin.user.index',compact('users'));
    }
}
