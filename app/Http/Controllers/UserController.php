<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all(); // Retrieve all users from the database
        return view('admin.showUsers', compact('users'));
    }
    // Show the registration form
    public function create()
    {
        return view('auth.register'); // Update with your form view path
    }

    // Register a new user
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'phone' => 'nullable|string|max:15',
            'address' => 'nullable|string|max:255',
        ]);

        $validatedData['password'] = Hash::make($request->password);

        User::create($validatedData);

        return redirect()->route('login')->with('message', 'Registration successful! You can now log in.');
    }

    // Show the user profile
    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('user.profile', compact('user')); // Update with your view path
    }

    // Show the form to edit user information
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.updateUsers', compact('user')); // Update with your view path
    }

    // Update user information
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            'phone' => 'nullable|string|max:15',
            'address' => 'nullable|string|max:255',
        ]);

        $user = User::findOrFail($id);
        $user->update($validatedData);

        return redirect()->route('users.index', $id)->with('message', 'Profile updated successfully!');
    }

    public static function countUsers()
    {
        $userCount = User::count();
        return $userCount;
    }
    public function search(Request $request)
    {
        $search = $request->input('search');
        $users = User::where('name', 'like', '%' . $search . '%')
            ->orWhere('email', 'like', $search . '%')
            ->get();
        return view('admin.showUsers', compact('users'));
    }
    public function delete($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->back()->with('message', 'user deleted successfully!');

    }
}
