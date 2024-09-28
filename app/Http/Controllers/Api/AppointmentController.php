<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Models\Doctor;
use Illuminate\Support\Facades\Auth;

class AppointmentController extends Controller
{
    // Show all appointments for the current user (patient)
    public function index()
    {
        if (Auth::check()) {
            $userType = Auth::user()->type;

            // Return different data based on user type
            if ($userType === 'admin') {
                $appointments = Appointment::all();
            } elseif ($userType === 'client') {
                $appointments = Appointment::where('user_id', Auth::id())->get();
            }
            return response()->json($appointments);
        }

        return response()->json(['message' => 'Unauthorized'], 401);
    }

    // Show the form to create a new appointment (API should not have this view)
    // Store the new appointment in the database
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'date' => 'required|date|after:today',
            'doctor_id' => 'required|exists:doctors,id',
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string|max:15',
            'speciality' => 'required|string',
            'message' => 'nullable|string',
        ]);

        try {
            $appointment = new Appointment();
            $appointment->fill($validatedData);
            $appointment->user_id = Auth::id(); // Assuming the user is logged in
            $appointment->status = 'In Progress';
            $appointment->save();

            return response()->json($appointment, 201);
        } catch (\Exception $e) {
            return response()->json(['error' => 'An error occurred while saving the appointment.'], 500);
        }
    }

    // Show the details of a specific appointment
    public function show($id)
    {
        $appointment = Appointment::findOrFail($id);
        return response()->json($appointment);
    }

    // Update the appointment in the database
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'doctor_id' => 'required|exists:doctors,id',
            'date' => 'required|date|after:today',
            'speciality' => 'required|string',
        ]);

        $appointment = Appointment::findOrFail($id);
        $appointment->update($validatedData);
        return response()->json($appointment);
    }

    // Cancel an appointment
    public function destroy($id)
    {
        $appointment = Appointment::find($id);
        if (Auth::check() && $appointment) {
            $appointment->delete();
            return response()->json(['message' => 'Appointment canceled successfully']);
        }

        return response()->json(['message' => 'Unauthorized or appointment not found'], 401);
    }

    // Approve an appointment
    public function approve($id)
    {
        $appointment = Appointment::find($id);
        if ($appointment) {
            $appointment->status = 'Approved';
            $appointment->save();
            return response()->json(['message' => 'Appointment approved successfully!']);
        }

        return response()->json(['message' => 'Appointment not found'], 404);
    }

    // Search for appointments
    public function searchAppointments(Request $request)
    {
        $search = $request->input('search');
        $appointments = Appointment::where('name', 'LIKE', "%{$search}%")
            ->orWhereHas('doctor', function ($query) use ($search) {
                $query->where('name', 'LIKE', "%{$search}%");
            })
            ->get();

        return response()->json($appointments);
    }
}
