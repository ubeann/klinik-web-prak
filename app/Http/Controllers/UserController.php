<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Inspection;
use App\Models\Patient;
use App\Models\Registration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function login(Request $request) {
        // Auth guard check
        if (Auth::guard('admin')->check()) {
            return redirect()->route('landing');
        } else {
            // Validate Request
            $request->validate([
                'email' => 'required|string|email|max:255',
                'password' => 'required|string|min:6',
            ]);

            // Auth using admin
            if (auth('admin')->attempt($request->only('email', 'password'))) {
                return redirect()->route('admin.dashboard');
            } else {
                return redirect()->route('admin.login.form')->with('error', 'Email or password incorrect')->withInput($request->only('email'));
            }
        }
    }

    public function dashboard() {
        $title = "Welcome to Dashboard, " . Auth::guard('admin')->user()->name;
        $nav = "dashboard";
        $patient = Patient::all()->count();
        $doctor = Doctor::all()->count();
        $registration = Registration::where('status', 'accepted')->count();
        $registrations = Registration::latest()->take(5)->get();
        return view('admin.dashboard', compact('nav', 'title', 'patient', 'doctor', 'registration', 'registrations'));
    }

    public function logout() {
        auth('admin')->logout();
        return redirect()->route('landing');
    }
}
