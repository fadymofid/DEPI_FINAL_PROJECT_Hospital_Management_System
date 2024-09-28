<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;
use App\Models\Medicine;

class MedicineController extends Controller
{


    public function index()
    {
        // Fetch all medicine records from the database
        // Fetch all doctor records from the database
        $medicines = Medicine::all();
        if (auth()->check()) {
            $userType = auth()->user()->type; // Assuming 'type' is a field in your users table

            // Return different views based on user type
            if ($userType === 'admin') {
                return view('admin.showMed',compact('medicines'));
            } elseif ($userType === 'client') {
                return view('user.medicines', compact('medicines')); // Client view
            }
        }

        // Optionally, handle the case where the user is not authenticated
        return redirect()->route('login');

    }

    public function create()
    {
        return view('admin.add_med'); // Update with your form view path
    }

    // Store the medicine in the database
    public function store(Request $request)
    {
        // Validation
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
            'category' => 'required|string|max:255',
            'price' => 'required|numeric',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Check if validation passes and data is coming through
        if ($request->isMethod('post')) {
            // Handle the file upload
            $medicine = new Medicine();

            if ($image = $request->file('image')) {
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('medicine_image'), $imageName);
                $medicine->image = $imageName;
            }

            // Save medicine details
            $medicine->name = $request->name;
            $medicine->description = $request->description;
            $medicine->category = $request->category;
            $medicine->price = $request->price;

            // Debug to check if the data is being saved
            if ($medicine->save()) {
                return redirect()->back()->with('message', 'Medicine added successfully!');
            } else {
                return redirect()->back()->with('error', 'Failed to save medicine information.');
            }
        } else {
            return redirect()->back()->with('error', 'Invalid request method.');
        }
    }



    // Show the form to edit a medicine
    public function edit($id)
    {
        $medicine = Medicine::findOrFail($id);
        return view('admin.updateMed', compact('medicine')); // Update with your view path
    }

    // Update the medicine in the database
    public function update(Request $request, $id)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'category' => 'required|string|max:255',
            'price' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Find the medicine by its ID
        $medicine = Medicine::findOrFail($id);

        // Update the medicine details
        $medicine->name = $request->name;
        $medicine->description = $request->description;
        $medicine->category = $request->category;
        $medicine->price = $request->price;

        // Check if a new image is uploaded
        if ($image = $request->file('image')) {
            // Delete the old image if it exists
            if ($medicine->image && file_exists(public_path('medicine_image/' . $medicine->image))) {
                unlink(public_path('medicine_image/' . $medicine->image));
            }

            // Save the new image
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('medicine_image'), $imageName);
            $medicine->image = $imageName;
        }

        // Save the updated medicine to the database
        $medicine->save();

        return redirect()->back()->with('message', 'Medicine updated successfully!');

    }

    public function destroy($id)
    {
        $medicine = medicine::findOrFail($id);

        // Delete doctor's image if it exists
        if ($medicine->image && file_exists(public_path('medicine_image/' . $medicine->image))) {
            unlink(public_path('medicine_image/' . $medicine->image));
        }
        $medicine->delete();
        return redirect()->back()->with('message', 'Doctor deleted successfully!');

    }

    public function searchMedicine(Request $request)
    {
        $search = $request->input('search');
        $medicines = Medicine::where('name', 'LIKE', "%{$search}%")->get();
        return view('admin.showMed', compact('medicines'));
    }

}

