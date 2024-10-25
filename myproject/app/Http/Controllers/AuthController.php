<?php

namespace App\Http\Controllers;

use App\Mail\WelcomeMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    public function register() {
        return view('authen.register');
    }
    public function store() {
        $validated = request()->validate(
            [
                'name'=>'required|min:3|max:40',
                'email'=>'required|email|unique:users,email',
                'password'=>'required|confirmed|min:8', 
            ]
            );
            $user =User::create(
                [
                    'name'=>$validated['name'],
                    'email'=>$validated['email'],
                    'password'=>Hash::make($validated['password']),
                ]
                );
            // Mail::to($user->email)->send(new WelcomeMail($user));
            return redirect()->route('index')->with('success','Account created successfully');
    }

    public function login() {
        return view('authen.login');
    }
    public function authenticate() {
        $validated = request()->validate(
            [
                'email'=>'required|email',
                'password'=>'required|min:8', 
            ]
            );
        if(auth()->attempt($validated)) {
            request()->session()->regenerate();
            return redirect()->route('index')->with('success','Login in successfully');
        }
        return redirect()->route('login')->withErrors(
            [
                'email'=>'email wrong',
            ]
            );
    }

    public function logout() {
        auth()->logout();

        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect()->route('index')->with('success','Logout successfully');

    }
}
