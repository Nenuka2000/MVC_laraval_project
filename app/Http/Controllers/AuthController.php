<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function register_form(){
        if(!Auth::check()){
            return view('auth.register');
        }
        return redirect()->intended('/');
    }

    public function register(Request $request)
    {
        // Validate the registration request
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'nullable|string|max:255',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Create a new user
        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {
            return redirect()->intended('/')->with('messsage', 'Registration Successful');
        } else {
            // Authentication failed
            throw ValidationException::withMessages([
                'email' => ['Registration failed.'],
            ]);
        }
    }

    public function login_form()
    {
        if(!Auth::check()){
            return view('auth.login');
        }
        return redirect()->intended('/');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Attempt to log the user in
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication successful
            $user = Auth::user();
            if($user->role == 'admin' || $user->role == 'superadmin'){
                return redirect()->intended('/admin');
            }
            // Cookie Session Authentication
            return redirect()->intended('/')->withErrors(['success' => 'Login Successful']);
        } else {
            // Authentication failed
            throw ValidationException::withMessages([
                'email' => ['Invalid credentials'],
            ]);
        }
    }

    public function profile_form()
    {   $user = Auth::user();
        return view('auth.profile', compact('user'));
    }

    public function profile(Request $request)
    {
        $user = Auth::user();

        // Validation rules
        $rules = [
            'first_name' => 'required|string|max:255',
            'last_name' => 'nullable|string|max:255',
            'email' => 'required|string|email|unique:users,email,' . $user->id,
            'phone' => 'nullable|string|min:10|unique:users,phone,' . $user->id,
        ];

        $password_rules = [
            'current_password' => 'required|string|current_password',
            'password' => 'required|string|min:8|confirmed',
        ];

        if($request->password){
            $request->validate(array_merge($rules, $password_rules));

            $user->forceFill([
                'password' => hash::make($request->password)
            ])->save();
        } else{
            $request->validate($rules);
        }

        $user->update( $request->only([
            'first_name',
            'last_name',
            'email',
            'phone',
        ]));

        return back()->with('messsage', 'Profile updated');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/login');
    }
}
