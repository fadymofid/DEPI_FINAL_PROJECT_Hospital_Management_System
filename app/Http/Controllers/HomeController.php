<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Medicine;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function redirect(){
        if(auth()->id()){
              if(auth()->user()->type == 'client'){
                  $doctor= doctor::all();
                  return view('user.home',compact('doctor'));
              }
              else{
                  $userCount = UserController::countUsers(); // Adjust the method as needed
                  $doctorCount = DoctorController::countDoctors(); // Adjust the method as needed
                  $appointmentCount = AppointmentController::countAppointments(); // Adjust the method as needed

                  return view('admin.home', compact('userCount', 'doctorCount', 'appointmentCount'));
              }
        }
        else{
            return redirect()->back();
        }

    }
    public function index(){
        if(auth()->id()){
            return redirect('home');

        }
        else{
            $doctor= doctor::all();

            return view('user.home',compact('doctor'));
        }

    }



}
