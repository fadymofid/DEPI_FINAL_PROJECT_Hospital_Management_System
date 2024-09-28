<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;

class DoctorController extends Controller
{

    // Display a list of doctors
    public function index()
    {
        // Fetch all doctor records from the database
        $doctors = Doctor::all();
        if (auth()->check()) {
            $userType = auth()->user()->type; // Assuming 'type' is a field in your users table

            // Return different views based on user type
            if ($userType === 'admin') {
                return view('admin.showDoctors',compact('doctors'));
            } elseif ($userType === 'client') {
                return view('user.docPage', compact('doctors')); // Client view
            }
        }

        // Optionally, handle the case where the user is not authenticated
        return redirect()->route('login');
    }

    // Show the form to create a new doctor
    public function create()
    {
        return view('admin.add_doctor'); // Update with your form view path
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
        $doctor->consultation_fee=$request->consultation_fee;
        $doctor->phone = $request->phone;

        if ($image = $request->file('image')) {
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('doctor_image'), $imageName);
            $doctor->image = $imageName;
        }

        $doctor->save();

        return redirect()->back()->with('message', 'Doctor added successfully!');
    }

    // Show a specific doctor
    public function show($id)
    {
        $doctor = Doctor::with('appointments')->findOrFail($id);
        return view('admin.show_doctor', compact('doctor')); // Update with your view path
    }

    // Show the form to edit a doctor
    public function edit($id)
    {
        $doctor = Doctor::findOrFail($id);
        return view('admin.edit_doctor', compact('doctor')); // Update with your view path
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
        $doctor->consultation_fee=$request->consultation_fee;
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

        return redirect()->back()->with('message', 'Doctor updated successfully!');
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
        return redirect()->back()->with('message', 'Doctor deleted successfully!');

    }
    public function updateDoctor($id){
        $data=doctor::find($id);
        return view('admin.updateDoctor',compact('data'));

    }

    public function searchDoctor(Request $request)
    {
        $search = $request->input('search');
        $doctors = Doctor::where('name', 'LIKE', "%{$search}%")->get();

        return view('admin.showDoctors', compact('doctors'));
    }
    // Count the number of doctors
    public static function countDoctors()
    {
        $doctorCount = Doctor::count();
        return $doctorCount;
    }
    public function getDoctorsWithAppointments()
    {
        // Fetch doctors with appointment counts
        $doctors = Doctor::withCount('appointments')->get();

        // Prepare the doctor data
        $doctorData = $doctors->map(function ($doctor) {
            return [
                'name' => $doctor->name,
                'appointment_count' => $doctor->appointments_count,
            ];
        });

        // Return the doctor data as JSON for the chart
        return response()->json($doctorData);
    }
}
