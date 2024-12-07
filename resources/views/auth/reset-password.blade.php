@extends('layouts.layout')
@section("title", "Reset Password")
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="{{ asset('css/reset-password.css') }}">
</head>
<body>
    
        @if(session()->has("success"))
        <div class="alert alert-success">
            {{session()->get("success")}}
        </div>
        @endif
        
        @if(session()->has("error"))
        <div class="alert alert-success">
            {{session()->get("error")}}
        </div>
        @endif

            <!-- Icon-->        
            <div class="icon-container">
                <img src="{{ asset('images/Equickserv_Icon.png') }}" alt="Icon" class="icon">
            </div>    
        
        <div class="rectangle">
        <!-- Left Content -->
        <div class="content">
            <form method="POST" action="{{ route('password.update') }}">
            @csrf          
                
                <!-- Email Input -->
                <input type="hidden" name="token" value="{{ request()->route('token') }}">
                <input type="hidden" name="email" value="{{ request()->input('email') }}">

                <!-- Password input fields -->
                <input type="password" class="input-field" name="password" required placeholder="New Password">
                <input type="password" class="input-field" name="password_confirmation" required placeholder="Confirm New Password">                        
                
                <!-- Login Button -->
                <button type="submit" class="login-button">Reset Password</button>
            </form>
        </div>

        <!-- Right Image Section -->
        <div class="image-section">
            <img src="{{ asset('images/sample.jpg') }}" alt="Login Image">
            <div class="sign-up-text">
            Sign Up
            </div>
        </div>

        <!-- Welcome Text Positioned Absolutely -->
        <div class="welcome-text">
            Reset Password
        </div>
        
    </div>
</body>
</html>
@endsection