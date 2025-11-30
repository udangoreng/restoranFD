<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{

    public function showLogin()
    {
        return view('login');
    }

    public function showRegister()
    {
        return view('register');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|string|email|max:255',
            'password' => 'required|min:6',
        ]);

        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            return redirect('/');
        }

        throw ValidationException::withMessages([
            'email'=>'Could Not Find Email',
            'password'=>'Password Is Incorrect'
        ]);
    }

    public function register(Request $request)
    {
        $validate = $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'username' => 'required|string|max:255|unique:users',
            'password' => 'required|min:6',
            'no_telepon' => 'required|string|max:15',
        ]);

        $user = User::create($validate);
    }


}
