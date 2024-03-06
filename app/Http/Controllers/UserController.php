<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', ['users' => $users]);
    }

    public function create()
    {
        return view('admin.users.manage'); 
    }

    public function store(Request $request)
    {
        // Validate the user creation request
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'nullable|string|max:255',
            'role' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Create a new user
        $user = User::create([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'role' => $request->input('role'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ]);

        if ($user) {
            return redirect('/admin/users')->with('message', 'User created successfully');
        } else {
            // User creation failed
            throw ValidationException::withMessages([
                'email' => ['User creation failed.'],
            ]);
        }
    }

    public function edit(User $user)
    {
        return view('admin.users.manage', compact('user')); 
    }

    public function update(Request $request, User $user)
    {
        // Validate the user update request
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'nullable|string|max:255',
            'role' => 'required|string',
            'email' => 'required|string|email|unique:users,email,' . $user->id,
        ]);

        // Update the user
        $user->update([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'email' => $request->input('email'),
            'role' => $request->input('role'),  
        ]);    
    
        return redirect('/admin/users')->with('message', 'User updated successfully');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect('/admin/users'); // Corrected the redirect route
    }
}
