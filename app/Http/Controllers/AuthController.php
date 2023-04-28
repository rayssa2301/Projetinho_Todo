<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index(Request $request)
    {
        if (Auth::check()) {
            return redirect(route('home'));
        }

        return view('login');
    }

    public function register(Request $request)
    {
        $isLoggedIn = Auth::check();
        if ($isLoggedIn) {
            return redirect(route('home'));
        }

        return view('register');
    }

    public function login_action(Request $request)
    {
        $validator = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',

        ]);

        if (Auth::attempt($validator));
        return redirect(route('home'))->with('success', 'Login successfully.');
    }

    public function register_action(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);

        $data = $request->only('name', 'email', 'password');
        $data['password'] = Hash::make($data['password']);
        User::create($data);
        return redirect(route('login'))->with('success', 'User created successfully.');
    }

    public function logout()
    {
        Auth::logout();
        return redirect(route('login'))->with('success', 'Logout successfully.');
    }
}
