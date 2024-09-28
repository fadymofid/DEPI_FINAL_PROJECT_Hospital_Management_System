<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Medicine;
use Illuminate\Http\Request;

class MedicineController extends Controller
{
    // Fetch all medicines
    public function index()
    {
        $medicines = Medicine::all();
        return response()->json($medicines);
    }

    // Store the medicine in the database
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
            'category' => 'required|string|max:255',
            'price' => 'required|numeric',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        try {
            $medicine = new Medicine();
            if ($image = $request->file('image')) {
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('medicine_image'), $imageName);
                $medicine->image = $imageName;
            }

            $medicine->name = $validatedData['name'];
            $medicine->description = $validatedData['description'];
            $medicine->category = $validatedData['category'];
            $medicine->price = $validatedData['price'];
            $medicine->save();

            return response()->json($medicine, 201);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to save medicine information.'], 500);
        }
    }

    // Show the details of a specific medicine
    public function show($id)
    {
        $medicine = Medicine::findOrFail($id);
        return response()->json($medicine);
    }

    // Update the medicine in the database
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'category' => 'required|string|max:255',
            'price' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $medicine = Medicine::findOrFail($id);
        $medicine->name = $validatedData['name'];
        $medicine->description = $validatedData['description'];
        $medicine->category = $validatedData['category'];
        $medicine->price = $validatedData['price'];

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

        $medicine->save();
        return response()->json($medicine);
    }

    // Delete a medicine
    public function destroy($id)
    {
        $medicine = Medicine::findOrFail($id);

        // Delete the image if it exists
        if ($medicine->image && file_exists(public_path('medicine_image/' . $medicine->image))) {
            unlink(public_path('medicine_image/' . $medicine->image));
        }

        $medicine->delete();
        return response()->json(['message' => 'Medicine deleted successfully!']);
    }

    // Search for medicines
    public function searchMedicine(Request $request)
    {
        $search = $request->input('search');
        $medicines = Medicine::where('name', 'LIKE', "%{$search}%")->get();
        return response()->json($medicines);
    }
}
