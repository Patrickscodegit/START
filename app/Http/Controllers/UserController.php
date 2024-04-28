<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    // Show Register/Create Form
    public function create() {
        return view('users.register');
    }

    // Create New User
    public function store(Request $request) {
        $validatedData = $request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => 'required|confirmed|min:6'
        ]);

        $validatedData['password'] = bcrypt($validatedData['password']);
        $user = User::create($validatedData);
        Auth::login($user);

        return redirect('/')->with('message', 'User created and logged in');
    }

    // Logout User
    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/')->with('message', 'You have been logged out');
    }

    // Show Login Form
    public function login() {
        return view('users.login');
    }

    // Authenticate User
    public function authenticate(Request $request) {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect('/')->with('message', 'You are now logged in!');
        }

        return back()->withErrors(['email' => 'Invalid Credentials'])->onlyInput('email');
    }

    // Show User Profile
    public function show($id) {
        $user = User::findOrFail($id);
        $this->authorize('view', $user);
        return view('users.show', compact('user'));
    }

    // Show the edit form for a user
    public function edit($id) {
        $user = User::findOrFail($id);
        $this->authorize('update', $user);
        return view('users.edit', compact('user'));
    }

    // Update User Profile
    public function update(Request $request, $id) {
        $user = User::findOrFail($id);
        $this->authorize('update', $user);
    
        // Validate the form data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => ['required', 'email', 'max:255', Rule::unique('users', 'email')->ignore($user->id)],
            'password' => 'sometimes|nullable|min:6|confirmed'
        ]);
    
        // Conditionally hash password if it is provided
        if (!empty($validatedData['password'])) {
            $validatedData['password'] = bcrypt($validatedData['password']);
        } else {
            // Remove password from validated data if not provided to prevent empty password update
            unset($validatedData['password']);
        }
    
        // Attempt to update the user
        try {
            if ($user->update($validatedData)) {
                return redirect()->route('users.show', $user->id)->with('success', 'Profile updated successfully.');
            } else {
                // If the update method returns false, redirect back with an error message
                return back()->withInput()->withErrors('Failed to update the profile.');
            }
        } catch (\Exception $e) {
            // Log the exception and redirect back with an error message
            Log::error("Error updating user (ID: {$user->id}): " . $e->getMessage());
            return back()->withInput()->withErrors('An error occurred while updating the profile.');
        }
    }
    
}
