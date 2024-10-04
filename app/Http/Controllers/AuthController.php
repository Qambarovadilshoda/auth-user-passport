<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UserLoginRequest;
use App\Http\Requests\StoreAuthRequest;

class AuthController extends Controller
{
    public function registerForm()
    {
        return view('auth.register');
    }
    public function handleRegister(StoreAuthRequest $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();

        return redirect()->route('loginForm');
    }
    public function loginForm()
    {
        return view('auth.login');
    }
    public function handleLogin(UserLoginRequest $request)
    {

        $user = User::where('email', $request->email)->first();
        if (Hash::check($request->password, $user->password)) {
            Auth::attempt(['email' => $request->email, 'password' => $request->password]);
            return redirect()->route('home');
        } 
        return redirect()->back();
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('home');
    }
}
