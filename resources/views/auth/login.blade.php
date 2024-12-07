@extends('layouts.layout')
@section("title", "Login")
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>
<body>
    
            <!-- Icon-->        
            <div class="icon-container">
                <img src="{{ asset('images/Equickserv_Icon.png') }}" alt="Icon" class="icon">
            </div>    
        
        <div class="rectangle">
        <!-- Left Content -->
        <div class="content">
            <form method="POST" action="{{ route('login.post') }}">
            @csrf          
                
                <!-- Username Input -->
                <input type="email" class="input-field" placeholder="Email" id="email" name="email"  value="{{ old('email') }}" required autofocus>
                @if($errors->has('email'))
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                @endif
                <!-- Password Input -->
                <input type="password" class="input-field" placeholder="Password" id="password" name="password" required>
                @if($errors->has('password'))
                    <span class="text-danger">{{ $errors->first('password') }}</span>
                @endif

                <!-- Login Button -->
                <button class="login-button">Login</button>
            </form>
            <div>
        <a class="forgotpass" href="{{ route('forgot-password') }}">Forgot Password?</a>
        </div>        
        </div>

        <!-- Right Image Section -->
        <div class="image-section">
            <img src="{{ asset('images/sample.jpg') }}" alt="Login Image">
            <div class="sign-up-text">
            Sign In
            </div>
              
 <!-- Social Media Icons Container -->
 <div class="social-icons-container">
                <!-- Gmail Icon -->
                <a href="https://mail.google.com" target="_blank">
                    <div class="circle-container">
                        <img src="{{ asset('images/gmail.png') }}" alt="Gmail Logo">
                    </div>
                </a>
                <!-- Facebook Icon -->
                <a href="https://facebook.com" target="_blank">
                    <div class="circle-container">
                        <img src="{{ asset('images/facebook.png') }}" alt="Facebook Logo">
                    </div>
                </a>
                <!-- Twitter Icon -->
                <a href="https://twitter.com" target="_blank">
                    <div class="circle-container">
                        <img src="{{ asset('images/twitter.png') }}" alt="Twitter Logo">
                    </div>
                </a>

            </div>
        </div>
        <!-- Label and Create Account Link -->
        <div class="account-link-container">
            <p>Don't have an account? <a href="/register">Create account</a></p>
        </div>
        <!-- Member Login -->
        <div class="welcome-text">
            Member Login
        </div>


    </div>
</body>
</html>
@endsection