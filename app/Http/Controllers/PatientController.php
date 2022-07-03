<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PatientController extends Controller
{
    // Variables for the controller
    protected $nav = "patient";

    public function register(Request $request) {
        // Auth guard check
        if (auth()->guard('patient')->check()) {
            return redirect()->route('landing');
        } else {
            // Check phone number
            $number_phone = $request->input('number_phone');
            foreach([" ", ".", "-", "(", ")"] as $char) {
                $number_phone = str_replace($char, "", $number_phone);
            }
            if(!preg_match('/[^+0-9]/',trim($number_phone))){
                if(substr(trim($number_phone), 0, 3) == '+62'){
                    $number_phone = trim($number_phone);
                } elseif(substr(trim($number_phone), 0, 1) == '0'){
                    $number_phone = '+62'.substr(trim($number_phone), 1);
                }
            }

            // Merge request input
            $request->merge([
                'number_phone' => $number_phone,
            ]);

            // Validate Request
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:patients',
                'birth_date' => 'required|date|before_or_equal:today',
                'number_phone' => 'required|string|max:14',
                'address' => 'required|string',
                'password' => 'required|string|min:6',
            ]);

            // Store Patient
            $patient = Patient::create([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'birth_date' => $request->input('birth_date'),
                'number_phone' => $request->input('number_phone'),
                'address' => $request->input('address'),
                'password' => Hash::make($request->input('password')),
            ]);

            // Redirect to login
            return redirect()->route('patient.login.form')->with('success', 'Register success, please login ' . $patient->name);
        }
    }

    public function login(Request $request) {
        // Auth guard check
        if (auth()->guard('patient')->check()) {
            return redirect()->route('landing');
        } else {
            // Validate Request
            $request->validate([
                'email' => 'required|string|email|max:255',
                'password' => 'required|string|min:6',
            ]);

            // Check if email exists
            $patient = Patient::where('email', $request->input('email'))->first();
            if (!$patient) {
                return redirect()->route('patient.login.form')->with('error', 'Email not found');
            } else {
                // Auth using Patient
                if (Hash::check($request->input('password'), $patient->password)) {
                    auth('patient')->login($patient);
                    return redirect()->route('landing');
                } else {
                    return redirect()->route('patient.login.form')->with('error', 'Password incorrect')->withInput($request->only('email'));
                }
            }
        }
    }

    public function index() {
        $title = "List of Patient";
        $nav = $this->nav;
        $patients = Patient::all();

        // Return view
        return view('admin.patient.index', compact('patients', 'title', 'nav'));
    }

    public function create() {
        $title = "Add Patient";
        $nav = $this->nav;

        // Return view
        return view('admin.patient.create', compact('title', 'nav'));
    }

    public function store(Request $request) {
        // Check phone number
        $number_phone = $request->input('number_phone');
        foreach([" ", ".", "-", "(", ")"] as $char) {
            $number_phone = str_replace($char, "", $number_phone);
        }
        if(!preg_match('/[^+0-9]/',trim($number_phone))){
            if(substr(trim($number_phone), 0, 3) == '+62'){
                $number_phone = trim($number_phone);
            } elseif(substr(trim($number_phone), 0, 1) == '0'){
                $number_phone = '+62'.substr(trim($number_phone), 1);
            }
        }

        // Merge request input
        $request->merge([
            'number_phone' => $number_phone,
        ]);

        // Validate Request
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:patients',
            'birth_date' => 'required|date|before_or_equal:today',
            'number_phone' => 'required|string|max:14',
            'address' => 'required|string',
            'password' => 'required|string|min:6',
        ]);

        // Store Patient
        $patient = Patient::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'birth_date' => $request->input('birth_date'),
            'number_phone' => $request->input('number_phone'),
            'address' => $request->input('address'),
            'password' => Hash::make($request->input('password')),
        ]);

        // Redirect to patient index page
        return redirect()->route('admin.patient.index')->with('success', 'Patient ' . $patient->name . ' added.');
    }

    public function edit($id) {
        $patient = Patient::find($id);
        if (!$patient) {
            return redirect()->route('admin.patient.index')->with('error', 'Patient not found');
        } else {
            $title = "Edit Patient " . $patient->name;
            $nav = $this->nav;

            // Return view
            return view('admin.patient.edit', compact('patient', 'title', 'nav'));
        }
    }

    public function update(Request $request, $id) {
        $patient = Patient::find($id);
        if (!$patient) {
            return redirect()->route('admin.patient.index')->with('error', 'Patient not found');
        } else {
            // Check phone number
            $number_phone = $request->input('number_phone');
            foreach ([" ", ".", "-", "(", ")"] as $char) {
                $number_phone = str_replace($char, "", $number_phone);
            }
            if (!preg_match('/[^+0-9]/', trim($number_phone))) {
                if (substr(trim($number_phone), 0, 3) == '+62') {
                    $number_phone = trim($number_phone);
                } elseif (substr(trim($number_phone), 0, 1) == '0') {
                    $number_phone = '+62'.substr(trim($number_phone), 1);
                }
            }

            // Merge request input
            $request->merge([
                'number_phone' => $number_phone,
            ]);

            // Validate Request
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:patients,email,'.$patient->id,
                'birth_date' => 'required|date|before_or_equal:today',
                'number_phone' => 'required|string|max:14',
                'address' => 'required|string',
            ]);

            // Update Patient
            $patient->update([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'birth_date' => $request->input('birth_date'),
                'number_phone' => $request->input('number_phone'),
                'address' => $request->input('address'),
            ]);

            // Check if password is changed
            if ($request->input('password')) {
                $request->validate([
                    'password' => 'min:6',
                ]);
                $patient->update([
                    'password' => Hash::make($request->input('password')),
                ]);
            }

            // Redirect to patient index page
            return redirect()->route('admin.patient.index')->with('success', 'Patient ' . $patient->name . ' updated.');
        }
    }

    public function delete($id) {
        $patient = Patient::find($id);
        if (!$patient) {
            return redirect()->route('admin.patient.index')->with('error', 'Patient not found');
        } else {
            $patient->delete();
            return redirect()->route('admin.patient.index')->with('success', 'Patient ' . $patient->name . ' deleted.');
        }
    }

    public function registration() {
        $title = "Dashboard Patient";
        $nav = "registration";
        $registrations = Auth::guard('patient')->user()->registrations;

        // Return view
        return view('patient.registration.index', compact('title', 'nav', 'registrations'));
    }

    public function logout() {
        auth('patient')->logout();
        return redirect()->route('landing');
    }
}
