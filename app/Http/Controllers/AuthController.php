<?php

namespace App\Http\Controllers;

use Log;
use App\Models\User;
use App\Models\Photographer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{

    public function showRegistrationForm()
    {
        return view('auth.register'); // Adjust the view path as necessary
    }

    public function register(Request $request)
    {
        // dd($request);
        // Validate the request
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'contact' => 'required|string|max:20|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'profile-photo' => 'nullable',
            'description' => 'nullable|string|max:500',
            'experience' => 'nullable|string|max:50',
            'category' => 'nullable|string|max:50',
            'area' => 'nullable|string|max:100',
            'city' => 'nullable|string|max:100',
            'role' => 'required|in:user,photographer', // Ensure role is either 'user' or 'photographer'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        // dd("hiii");
        try {
            // Handle the profile photo upload if the role is photographer
            $profilePhotoPath = null;

            if ($request->input('role') === 'photographer' && $request->hasFile('profile-photo')) {
                try {
                    // Ensure the file is valid
                    $request->validate([
                        'profile-photo' => 'nullable',
                    ]);

                    // Store the file
                    $profilePhotoPath = $request->file('profile-photo')->store('profile_photos', 'public');
                } catch (\Exception $e) {
                    // Log the exception
                    // \Log::error('File upload error: ' . $e->getMessage());

                    // Handle the error, e.g., redirect back with an error message
                    return redirect()->back()
                        ->with('error', 'There was an error uploading the profile photo. Please try again.')
                        ->withInput();
                }
            }

            // dd($profilePhotoPath);

            // Create a new user
            $user = User::create([
                'name' => $request->input('name'),
                'contact' => $request->input('contact'),
                'email' => $request->input('email'),
                'password' => Hash::make($request->input('password')),
                'role' => $request->input('role'),
            ]);

            // Create photographer-specific details if the role is photographer
            if ($user->role === 'photographer') {
                Photographer::create([
                    'user_id' => $user->id,
                    'profile_picture' => $profilePhotoPath, // Adjust the field name to match the migration
                    'description' => $request->input('description'),
                    'experience' => $request->input('experience'),
                    'category' => $request->input('category'),
                    'area' => $request->input('area'),
                    'city' => $request->input('city'),
                ]);
            }

            // Log in the user (optional)
            auth()->login($user);

            // Redirect to a specific route or view after registration
            return redirect()->route('login'); // Replace 'home' with the desired route name

        } catch (\Exception $e) {
            // Log the exception
            // Log::error('Registration error: ' . $e->getMessage());

            // Redirect back with an error message
            return redirect()->back()
                ->with('error', 'An error occurred during registration. Please try again.')
                ->withInput();
        }
    }

    // Show the login form
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Handle the login process
    public function login(Request $request)
    {
        // Validate the request
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:8',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Attempt to log the user in
        if (Auth::attempt([
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ])) {
            // Authentication passed
            $user = Auth::user(); // Get the authenticated user

            if ($user->role === 'photographer') {
                // Redirect to the photographer inbox
                // TO DO change
                return view('photographer.inbox'); // Ensure this route is defined
                // return redirect()->route('photographer.inbox'); // Ensure this route is defined
            }

            // Default redirect for other roles
            return redirect()->intended('home');
        }

        // Authentication failed
        return redirect()->back()
            ->withErrors(['email' => 'These credentials do not match our records.'])
            ->withInput();
    }

    // Handle the logout process
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login'); // Redirect to login page after logout
    }
}
