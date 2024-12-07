@extends('layouts.layout')
@section("title", "Forgot Password")
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="{{ asset('css/forgot-password.css') }}">
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
            <form method="POST" action="{{ route('forgot-password.post') }}">
            @csrf          
                
                <!-- Username Input -->
                <input type="email" class="input-field" placeholder="Email" id="email" name="email"  value="{{ old('email') }}" required autofocus>
                @if($errors->has('email'))
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                @endif

                <!-- Login Button -->
                <button class="login-button">Submit</button>
                
                <div class="account-link-container">
                     <a href="/login">Back to Login</a>
                </div>
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