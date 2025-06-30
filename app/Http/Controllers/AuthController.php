<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function RegisterForm(){
        return view('auth.signup');
    }

    public function loginForm(){
        return view('auth.login');
    }

    public function register(Request $request){
        $request->validate([
            'name'=>'required|max:255|string',
            'email'=>'required|email|max:255|unique:users',
            'password'=>'required|min:8|max:30|string|confirmed'
        ]);
        $user = User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>bcrypt($request->password)
        ]);
        Auth::login($user);

        return redirect()->route('notes.index');
    }

    public function login(Request $request){
        $request->validate([
            'email'=>'required|email|max:255',
            'password'=>'required|min:8|max:30|string'
        ]);
        $isLogin = Auth::attempt(['email'=>$request->email,'password'=>$request->password]);
        if (! $isLogin){
            return back();
        }else{
            return redirect()->route('notes.index');
        }
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('auth.loginForm');
    }
}
