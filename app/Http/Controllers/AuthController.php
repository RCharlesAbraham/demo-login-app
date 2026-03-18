<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function loginPost(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        // Support login by email OR username
        $loginType = filter_var($request->username, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        
        $loginAttempt = [
            $loginType => $credentials['username'],
            'password' => $credentials['password']
        ];

        if (Auth::attempt($loginAttempt)) {
            $request->session()->regenerate();
            return redirect()->route('dashboard.1');
        }

        return back()->withErrors([
            'username' => 'The provided credentials do not match our records.',
        ])->onlyInput('username');
    }

    public function registerPost(Request $request)
    {
        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'username' => 'required|string|unique:users|max:255',
            'email' => 'required|string|email|unique:users|max:255',
            'password' => 'required|string|min:8|confirmed',
            'dob' => 'required|string',
            'phone' => 'required|string',
            'country' => 'required|string',
            'role' => 'nullable|in:learner,guide'
        ]);

        $user = User::create([
            'name' => $validated['full_name'],
            'username' => $validated['username'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'dob' => $validated['dob'],
            'phone' => $validated['phone'],
            'country' => $validated['country'],
            'role' => $validated['role'] ?? 'learner',
        ]);

        Auth::login($user);

        return redirect()->route('dashboard.1');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function forgotPasswordPost(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        // Since this is a demo without a real SMTP configured, 
        // we will just show a success message to prove it dynamically registers the action.
        $userExists = User::where('email', $request->email)->exists();
        
        if ($userExists) {
            return back()->with('success', 'A password reset link has been magically sent to your email! (Demo Mode)');
        }

        return back()->withErrors(['email' => 'We could not find a user with that email address.']);
    }
}
