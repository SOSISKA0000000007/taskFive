<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request){
        $data = $request->validate([
           'name' => 'required',
           'email' => 'required|email|unique:users|confirmed',
            'password' => 'required|min:4',
        ]);

        $data['password'] = Hash::make($data['password']);

        $user = User::create($data);
        Auth::login($user);

        return redirect('/');
    }

    public function login(Request $request){
        $data = $request->validate([
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|confirmed',
        ]);
        $user = User::where('email', $data['email'])->firstOrFail();
        if (Hash::check($data['password'], $user->password)) {
            Auth::login($user);
            return redirect('/');
        }
    }
    public function logout(Request $request){
        Auth::logout();
        return redirect('/');
    }
}
