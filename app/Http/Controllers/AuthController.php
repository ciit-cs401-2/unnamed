<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
// use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function authenticate(Request $request)
    {
        // 1. Validate the incoming request data
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // 2. Attempt to log the user in
        // Auth::attempt() will try to find a user with the given credentials
        // and if found, and password matches, it will log them in and return true.
        // The 'remember' checkbox value is passed to Auth::attempt() to persist the session.
        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            // 3. Regenerate the session to prevent session fixation attacks
            $request->session()->regenerate();

            // 4. Redirect the user to their intended destination or a default dashboard
            return redirect()->intended('/')->with('success', 'You have been logged in!');
        }

        // 5. If authentication fails, throw a validation exception
        // This will redirect back to the form with an error message.
        throw ValidationException::withMessages([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function logout(Request $request)
    {
        // Log the user out
        Auth::logout();

        // Invalidate the session
        $request->session()->invalidate();

        // Regenerate the CSRF token
        $request->session()->regenerateToken();

        // Redirect to the login page or home page with a success message
        return redirect('/')->with('success', 'You have been logged out.');
    }

    public function register(Request $request)
    {
        //   dd('register reached', $request->all());

        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        // dd('Reached here', $request->all());

        try {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
        } catch (Exception $ex) {
            throw $ex;
        }

        // dd("User created!", $user);
        Auth::login($user);

        return redirect('/'); // Redirect to the home/welcome page after successful registration
    }
}
