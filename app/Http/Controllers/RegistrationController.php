<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Registration;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    protected $nav = "registration";

    public function index() {
        $title = 'List of Registrations';
        $nav = $this->nav;
        $registrations = Registration::all()
            ->sortBy(function ($registration) {
                return $registration->patient->name;
            })
            ->sortBy(function ($registration) {
                return $registration->doctor->name;
            })
            ->sortBy('arrival_date');

        // Return view
        return view('admin.registration', compact('title', 'nav', 'registrations'));
    }

    public function create() {
        $title = 'Buat Jadwal Temu';
        $nav = $this->nav;
        $doctors = Doctor::all();

        // Return view
        return view('patient.registration.create', compact('title', 'nav', 'doctors'));
    }

    public function store(Request $request) {
        // Validate request
        $request->validate([
            'patient_id' => 'required|integer|exists:patients,id',
            'doctor_id' => 'required|integer|exists:doctors,id',
            'arrival_date' => 'required|date',
        ]);

        // Create registration
        Registration::create([
            'patient_id' => $request->patient_id,
            'doctor_id' => $request->doctor_id,
            'arrival_date' => $request->arrival_date,
            'status' => 'pending',
        ]);

        // Redirect to registration page
        return redirect()->route('patient.dashboard.registration.index')->with('success', 'Berhasil menambahkan jadwal temu');
    }

    public function update(Request $request, $id) {
        // Validate request
        $request->validate([
            'status' => 'required|in:pending,accepted,declined',
        ]);

        // Find registration
        $registration = Registration::findOrFail($id);
        if (!$registration) {
            return redirect()->route('patient.dashboard.registration.index')->with('error', 'Pendaftaran tidak ditemukan');
        } else {
            // Update registration
            $registration->update([
                'status' => $request->status,
            ]);

            // Redirect to registration page
            return redirect()->route('admin.registration.index')->with('success', 'Berhasil mengubah status jadwal temu');
        }
    }
}
