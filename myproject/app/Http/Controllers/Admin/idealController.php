<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ideals;
use Illuminate\Http\Request;

class idealController extends Controller
{
    public function index() {
        $ideals = ideals::latest()->paginate(5);
        return view('admin.idea.index',compact('ideals'));
    }
}
