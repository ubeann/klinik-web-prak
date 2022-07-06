<?php

namespace App\Http\Controllers;

use App\Models\Inspection;
use App\Models\Registration;
use App\Models\Service;
use Illuminate\Http\Request;

class InspectionController extends Controller
{
    protected $nav = "inspection";

    public function index() {
        $title = "List of Inspections";
        $nav = $this->nav;
        $inspections = Inspection::all();

        // Return view
        return view('admin.inspection.index', compact('title', 'nav', 'inspections'));
    }

    public function create() {
        $title = "Create Inspection";
        $nav = $this->nav;
        $registrations = Registration::whereDoesntHave('inspection')
            ->where('status', '=', 'accepted')
            ->join('patients', 'registrations.patient_id', '=', 'patients.id')
            ->join('doctors', 'registrations.doctor_id', '=', 'doctors.id')
            ->orderBy('patients.name')
            ->orderBy('doctors.name')
            ->orderBy('arrival_date')
            ->get();

        // Return view
        return view('admin.inspection.create', compact('title', 'nav', 'registrations'));
    }

    public function store(Request $request) {
        // Validate request
        $request->validate([
            'registration_id' => 'required|exists:registrations,id',
            'name' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'price' => 'required|numeric',
        ]);

        // Create inspection
        $inspection = Inspection::create([
            'registration_id' => $request->registration_id,
            'type' => $request->type,
            'price' => $request->price,
        ]);

        // Create service
        $service = Service::create([
            'inspection_id' => $inspection->id,
            'name' => $request->name,
        ]);

        // Return view
        return redirect()->route('admin.inspection.index')->with('success', 'Inspection ' . $service->name . ' created successfully');
    }

    public function edit($id) {
        // Get inspection
        $inspection = Inspection::findOrFail($id);

        // Check inspection
        if (!$inspection) {
            return redirect()->route('admin.inspection.index')->with('error', 'Inspection not found');
        } else {
            $title = "Edit Inspection " . $inspection->service->name;
            $nav = $this->nav;

            // Return view
            return view('admin.inspection.edit', compact('title', 'nav', 'inspection'));
        }
    }

    public function update(Request $request, $id) {
        // Get inspection
        $inspection = Inspection::findOrFail($id);

        // Check inspection
        if (!$inspection) {
            return redirect()->route('admin.inspection.index')->with('error', 'Inspection not found');
        } else {
            // Validate request
            $request->validate([
                'name' => 'required|string|max:255',
                'type' => 'required|string|max:255',
                'price' => 'required|numeric',
            ]);

            // Update inspection
            $inspection->update([
                'type' => $request->input('type'),
                'price' => $request->input('price'),
            ]);

            // Update service
            $service = $inspection->service;
            $service->update([
                'name' => $request->input('name'),
            ]);

            // Return view
            return redirect()->route('admin.inspection.index')->with('success', 'Inspection ' . $service->name . ' updated successfully');
        }
    }

    public function delete($id) {
        // Get inspection
        $inspection = Inspection::findOrFail($id);

        // Check inspection
        if (!$inspection) {
            return redirect()->route('admin.inspection.index')->with('error', 'Inspection not found');
        } else {
            // Delete service
            $service = Service::where('inspection_id', $inspection->id)->first();
            $name = $service->name;
            $service->delete();

            // Delete inspection
            $inspection->delete();

            // Return view
            return redirect()->route('admin.inspection.index')->with('success', 'Inspection ' . $name . ' deleted successfully');
        }
    }

    public function payment() {
        $title = "List of Payments";
        $nav = 'payment';
        $inspections = Inspection::all()
            ->sortBy(function ($inspection) {
                return $inspection->registration->patient->name;
            })
            ->sortBy('arrival_date');

        // Return view
        return view('admin.payment', compact('title', 'nav', 'inspections'));
    }
}
