<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;

class AuthController extends Controller
{
    public function login()
    {
        return view("auth.login");
    }

    public function loginPost(Request $request)
    {
    
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        // Check if the email exists in the database
        $user = UserModel::where('email', $request->email)->first();
        if (!$user) {
            return redirect()->back()->withErrors(['email' => 'This email is not registered.']);
        }
    
        // Check if the password is correct
        if (!Hash::check($request->password, $user->password)) {
            return redirect()->back()->withErrors(['password' => 'Wrong password.']);
        }

        $credentials = $request->only("email","password");

        if(Auth::attempt($credentials))
        {
            return redirect()->intended(route("dashboard"));
        }

        return redirect(route("login"))->with("error","Login failed");
    }

    public function register()
    {
        return view("auth.register");
    }
    
    public function registerPost(Request $request)
    {

        $customMessages = 
        [
            'email.email' => 'Invalid email',
            'email.unique' => 'Email already exists',
            'password.confirmed' => "Password doesn't match"
        ];

            $request->validate([
                'username' => 'required|string|max:255',
                'password' => 'required|string|max:255|confirmed',
                'email' => 'required|email|max:255|unique:user,email',]
                ,$customMessages
            ); 

            $user = new UserModel();
            $user->email = $request->email;
            $user->username = $request->username;
            $user->password = Hash::make($request->password);

            if ($user->save())
            {
                $user->sendEmailVerificationNotification();

                return redirect(route("login"))->with("success","User created successfully. Please check your email for the verification");
            }

        return redirect(route("register"))->with("error","Failed to create account");
    }

    public function forgotPassword()
    {
        return view('auth.forgot-password');
    }

    public function forgotPasswordPost(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:user,email',
        ]);
    
        // Send the reset link to the user's email
        $status = Password::sendResetLink(
            $request->only('email')
        );
    
        // Check the status of the reset link
        return $status === Password::RESET_LINK_SENT
            ? back()->with('success', 'Password reset link sent to your email.')
            : back()->withErrors(['email' => 'Failed to send reset link.']);    
    }

// Display password reset form
public function showResetForm($token)
{
    $email = request()->query('email');
    return view('auth.reset-password', compact('token', 'email'));
}

// Handle password reset request
public function resetPassword(Request $request)
{
    // Attempt to reset the user's password
    $resetStatus = Password::reset(
        $request->only('email', 'password', 'password_confirmation', 'token'),
        function ($user) use ($request) {
            // Update the password in the database
            $user->forceFill([
                'password' => Hash::make($request->password),
            ])->save();
        }
    );

    if ($resetStatus == Password::PASSWORD_RESET) 
    {
        // Password reset was successful, redirect to login or home
        return redirect()->route('login')->with('status', 'Password has been reset!');
    }   
    
    else 
        {
            // If the password reset fails, redirect back with an error
            return back()->withErrors(['email' => [trans($resetStatus)]]);
        }
    }

    public function logout(Request $request)
    {
        Auth::logout(); // Logs out the user
        $request->session()->invalidate(); // Invalidates the session
        $request->session()->regenerateToken(); // Regenerates the CSRF token for security

        return redirect(route('login'))->with('success', 'You have been logged out successfully.');
    }
}