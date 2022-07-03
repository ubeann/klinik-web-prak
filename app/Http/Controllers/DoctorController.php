<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class DoctorController extends Controller
{
    // Variables for the controller
    protected $nav = "doctor";

    public function index() {
        $title = "List of Doctor";
        $nav = $this->nav;
        $doctors = Doctor::all();
        return view('admin.doctor.index', compact('doctors', 'title', 'nav'));
    }

    public function create() {
        $title = "Add Doctor";
        $nav = $this->nav;
        return view('admin.doctor.create', compact('title', 'nav'));
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

        // Validate the request
        $request->validate([
            'name' => 'required|string|max:255',
            'specialization' => 'required|string|max:255',
            'birth_date' => 'required|date|before_or_equal:today',
            'number_SIP' => 'required|integer|unique:doctors',
            'number_phone' => 'required|string|max:255',
            'address' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Image upload
        $imageName = time() . '-' . $request->input('name') . '.' . $request->image->extension();
        $imageName = Str::of($imageName)->replace(' ', '');
        $request->image->move(public_path('img/doctor'), $imageName);

        // Create the doctor
        $doctor = Doctor::create([
            'name' => $request->input('name'),
            'specialization' => $request->input('specialization'),
            'birth_date' => $request->input('birth_date'),
            'number_SIP' => $request->input('number_SIP'),
            'number_phone' => $request->input('number_phone'),
            'address' => $request->input('address'),
            'image' => 'img/doctor/' . $imageName,
        ]);

        // Redirect to doctor index page
        return redirect()->route('admin.doctor.index')->with('success', 'Doctor ' . $doctor->name . ' added.');
    }

    public function edit($id) {
        $doctor = Doctor::find($id);
        if (!$doctor) {
            return redirect()->route('admin.doctor.index')->with('error', 'Doctor not found.');
        } else {
            $title = "Doctor " . $doctor->name;
            $nav = $this->nav;
            return view('admin.doctor.edit', compact('doctor', 'title', 'nav'));
        }
    }

    public function update(Request $request, $id) {
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

        // Validate the request
        $request->validate([
            'name' => 'required|string|max:255',
            'specialization' => 'required|string|max:255',
            'birth_date' => 'required|date|before_or_equal:today',
            'number_SIP' => 'required|integer|unique:doctors,number_SIP,' . $id,
            'number_phone' => 'required|string|max:255',
            'address' => 'required|string',
        ]);

        // Update the doctor
        Doctor::find($id)->update([
            'name' => $request->input('name'),
            'specialization' => $request->input('specialization'),
            'birth_date' => $request->input('birth_date'),
            'number_SIP' => $request->input('number_SIP'),
            'number_phone' => $request->input('number_phone'),
            'address' => $request->input('address'),
        ]);

        // Image upload
        if ($request->hasFile('image')) {
            if (File::exists(public_path(Doctor::find($id)->image))) {
                File::delete(public_path(Doctor::find($id)->image));
            }
            $imageName = time() . '-' . $request->input('name') . '.' . $request->image->extension();
            $imageName = Str::of($imageName)->replace(' ', '');
            $request->image->move(public_path('img/doctor'), $imageName);
            Doctor::find($id)->update([
                'image' => 'img/doctor/' . $imageName,
            ]);
        }

        // Redirect to doctor index page
        return redirect()->route('admin.doctor.index')->with('success', 'Doctor ' . Doctor::find($id)->name . ' updated.');
    }

    public function delete($id) {
        $doctor = Doctor::find($id);
        if (!$doctor) {
            return redirect()->route('admin.doctor.index')->with('error', 'Doctor not found.');
        } else {
            if (File::exists(public_path($doctor->image))) {
                File::delete(public_path($doctor->image));
            }
            $doctor->delete();
            return redirect()->route('admin.doctor.index')->with('success', 'Doctor ' . $doctor->name . ' deleted.');
        }
    }
}
