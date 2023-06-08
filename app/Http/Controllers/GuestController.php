<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    public function landing() {
        $title = "Welcome to Dental Clinic";
        $nav = "home";
        $doctors = Doctor::all();
        return view('landing', compact('nav', 'title', 'doctors'));
    }

    public function formLogin() {
        // Auth guard check
        if (auth()->guard('patient')->check()) {
            return redirect()->route('landing');
        } else {
            $title = "Login Patient";
            $type = "patient";
            return view('auth.login', compact('title', 'type'));
        }
    }

    public function formRegister() {
        // Auth guard check
        if (auth()->guard('patient')->check()) {
            return redirect()->route('landing');
        } else {
            $title = "Register Patient";
            $type = "patient";
            return view('auth.register', compact('title', 'type'));
        }
    }

    public function formAdmin() {
        // Auth guard check
        if (auth()->guard('admin')->check()) {
            return redirect()->route('admin.dashboard');
        } else {
            $title = "Login Admin";
            $type = "admin";
            return view('auth.login', compact('title', 'type'));
        }
    }
}
