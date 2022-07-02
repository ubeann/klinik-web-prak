<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function create(Request $request)
    {   
        $pw = bcrypt($request->password);
        User::create([
            'name' => $request->name, 
            'email' => $request->email,
            'password' => $pw,
        ]);
        return redirect()->route('home');
    }


    public function authenticate(Request $request){
        $credentials = $request->validate([
            'email' => 'required',
            'password'=> 'required'
        ]);

        if (Auth::attempt($credentials)){
            $request->session()->regenerate();
            return redirect()->route('home');
        }
        
        dd("eror");
        return back()->with('loginError', 'Login Failed');
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}