<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AppointmentController extends Controller
{
    // Show all appointments for the current user (patient)
    public function index()
    {
        if (auth()->check()) {
            $userType = auth()->user()->type; // Assuming 'type' is a field in your users table

            // Return different views based on user type
            if ($userType === 'admin') {
                $appoint = Appointment::all();
                return view('admin.showAppointments', compact('appoint'));
            } elseif ($userType === 'client') {
                $appoint = Appointment::where('user_id', auth()->id())->get();
                return view('user.my-appointments', compact('appoint')); // Client view
            }
        }
    }

    // Show the form to create a new appointment
    public function create()
    {
        $doctors = Doctor::all(); // Assuming you have a Doctor model
        return view('user.book_appointment', compact('doctors')); // Update with your view path
    }

    // Store the new appointment in the database
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'date' => 'required|date|after:today',
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string|max:15',
            'doctor_id' => 'required|exists:doctors,id', // Ensure doctor_id exists in doctors table
            'speciality' => 'required|string', // Assuming speciality is passed from the form
        ]);

        try {
            $data = new Appointment();
            $data->name = $request->name;
            $data->email = $request->email;
            $data->phone = $request->phone;
            $data->doctor_id = $request->doctor_id; // Foreign key doctor_id
            $data->date = $request->date;
            $data->speciality = $request->speciality;
            $data->message = $request->message;
            $data->status = 'In Progress';
            if (auth()->check()) {
                $data->user_id = auth()->id();
            }
            $data->save();

            return redirect()->back()->with('message', 'Appointment Request Sent');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred while saving the appointment.');
        }
    }

    // Show the details of a specific appointmenta
    public function show($id)
    {
        $appointment = Appointment::findOrFail($id);
        return view('user.appointment_details', compact('appointment')); // Update with your view path
    }

    // Show the form to edit an existing appointment
    public function edit($id)
    {
        $appointment = Appointment::findOrFail($id);
        $doctors = Doctor::all(); // Fetch available doctors
        return view('user.edit_appointment', compact('appointment', 'doctors')); // Update with your view path
    }

    // Update the appointment in the database
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'doctor_id' => 'required|exists:doctors,id',
            'appointment_date' => 'required|date|after:today',
            'appointment_time' => 'required',
        ]);

        $appointment = Appointment::findOrFail($id);
        $appointment->doctor_id = $request->doctor_id; // Update the doctor_id
        $appointment->appointment_date = $request->appointment_date;
        $appointment->appointment_time = $request->appointment_time;
        $appointment->save();

        return redirect()->route('appointments.show', $id)->with('message', 'Appointment updated successfully!');
    }

    // Cancel an appointment
    public function destroy($id)
    {
        $appointment = Appointment::find($id);
        if (auth()->check()) {
            $userType = auth()->user()->type; // Assuming 'type' is a field in your users table
            if ($appointment) {
                $appointment->delete(); // Delete the appointment if found
            }

            // Return different views based on user type
            if ($userType === 'admin' || $userType === 'client') {
                return redirect()->back()->with('message', 'Appointment canceled successfully');
            }
        }
    }

    // Approve an appointment
    public function approve($id)
    {
        $appointment = Appointment::find($id);
        $appointment->status = 'Approved';
        $appointment->save();

        return redirect()->back()->with('message', 'Appointment Approved successfully!');
    }

    // Search appointments by name or doctor
    public function searchAppointments(Request $request)
    {
        $search = $request->input('search');
        $appoint = Appointment::where('name', 'LIKE', "%{$search}%")
            ->orWhereHas('doctor', function ($query) use ($search) {
                $query->where('name', 'LIKE', "%{$search}%");
            })
            ->get();

        return view('admin.showAppointments', compact('appoint'));
    }

    public static function  countAppointments()
    {
        $appointmentCount = Appointment::count();
        return $appointmentCount;

    }
}
