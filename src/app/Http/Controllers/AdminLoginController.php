<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UserRequest;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;




class AdminLoginController extends Controller
{
    public function register(){
        return view('register');
    }

    public function login(){
        return view('login');
    }

    public function store(UserRequest $request){
        $user = $request->only([
            'name',
            'email',
            'password'
        ]);
        $user['password'] = Hash::make($user['password']);
        User::create($user);
        return redirect('/admin');
    }

    public function loginCheck(LoginRequest $request){
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect('/admin');
        }
        return back()->withErrors([
            'password' => 'ログイン情報が登録されていません',
        ]);
    }

    public function admin(){
        return view('admin');
    }

    public function logout(){
        return view('logout');
    }

}

