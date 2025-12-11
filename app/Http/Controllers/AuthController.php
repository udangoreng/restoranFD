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
            
            $user = Auth::user();
            if($user->role === 'admin'){
                return redirect('/admin');
            } elseif($user->role === 'customer'){
                return redirect('/');
            } else{
                Auth::logout();
                return redirect('/login')->withErrors(['role' => 'Unauthorized Role.']);
            }
            
        }

        throw ValidationException::withMessages([
            'email'=>'Could Not Find Email',
            'password'=>'Password Is Incorrect'
        ]);
    }

    public function register(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'username' => 'required|string|max:255|unique:users',
            'password' => 'required|min:6',
            'phone' => 'required|string|max:15',
        ]);

        $user = User::create($validate);
    }

    public function logout(){
        Auth::logout();
        return redirect('/');
    }
}
