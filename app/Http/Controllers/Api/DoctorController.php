<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    // Display a list of doctors
    public function index()
    {
        $doctors = Doctor::all();
        return response()->json($doctors);
    }

    // Show a specific doctor
    public function show($id)
    {
        $doctor = Doctor::with('appointments')->findOrFail($id);
        return response()->json($doctor);
    }

    // Store a new doctor in the database
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'speciality' => 'required|string|max:255',
            'phone' => 'required|string|max:11',
            'consultation_fee' => 'required|integer',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $doctor = new Doctor();
        $doctor->name = $request->name;
        $doctor->speciality = $request->speciality;
        $doctor->consultation_fee = $request->consultation_fee;
        $doctor->phone = $request->phone;

        if ($image = $request->file('image')) {
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('doctor_image'), $imageName);
            $doctor->image = $imageName;
        }

        $doctor->save();
        return response()->json($doctor, 201);
    }

    // Update the doctor's information in the database
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'speciality' => 'required|string|max:255',
            'phone' => 'required|string|max:11',
            'consultation_fee' => 'required|integer',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $doctor = Doctor::findOrFail($id);
        $doctor->name = $request->name;
        $doctor->speciality = $request->speciality;
        $doctor->consultation_fee = $request->consultation_fee;
        $doctor->phone = $request->phone;

        if ($image = $request->file('image')) {
            // Delete old image if it exists
            if ($doctor->image && file_exists(public_path('doctor_image/' . $doctor->image))) {
                unlink(public_path('doctor_image/' . $doctor->image));
            }

            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('doctor_image'), $imageName);
            $doctor->image = $imageName;
        }

        $doctor->save();
        return response()->json($doctor);
    }

    // Delete a specific doctor
    public function destroy($id)
    {
        $doctor = Doctor::findOrFail($id);

        // Delete doctor's image if it exists
        if ($doctor->image && file_exists(public_path('doctor_image/' . $doctor->image))) {
            unlink(public_path('doctor_image/' . $doctor->image));
        }

        $doctor->delete();
        return response()->json(null, 204);
    }

    // Search for doctors
    public function searchDoctor(Request $request)
    {
        $search = $request->input('search');
        $doctors = Doctor::where('name', 'LIKE', "%{$search}%")->get();

        return response()->json($doctors);
    }

    // Fetch doctors with appointment counts
    public function getDoctorsWithAppointments()
    {
        $doctors = Doctor::withCount('appointments')->get();

        // Prepare the doctor data
        $doctorData = $doctors->map(function ($doctor) {
            return [
                'name' => $doctor->name,
                'appointment_count' => $doctor->appointments_count,
            ];
        });

        return response()->json($doctorData);
    }
}
