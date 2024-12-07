@extends('layouts.layout')
@section("title", "Sign Up")
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page</title>
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
</head>
<body>
<!------------------------------------[ICON]-------------------------------------------->        
<div class="icon-container">
    <img src="{{ asset('images/Equickserv_Icon.png') }}" alt="Icon" class="icon">
</div>    

<!------------------------------------[Rectangle]-------------------------------------------->        
    <div class="rectangle">
            <!-- Left Content -->
        <div class="content">
            <form method="POST" action="{{ route('register.post') }}">
            @csrf          
                                
                <!-- Username Input -->
                   <input type="text" value="{{ old('username') }}" placeholder="Username" class="input-field"  id="username" name="username" required>
                    @if($errors->has('username'))
                    <span class="text-danger"> {{ $errors->first('username') }} </span>
                    @endif

                    <!-- Email Input -->
                    <input type="text" value="{{ old('email') }}" placeholder="Email" class="input-field"  id="email" name="email" required autofocus>
                    @if($errors->has('email'))
                    <span class="text-danger"> {{ $errors->first('email') }} </span>
                    @endif

                    <!-- Password Input -->
                    <input type="password" placeholder="Password" class="input-field"  id="password" name="password" required>
                    @if($errors->has('password'))
                    <span class="text-danger"> {{ $errors->first('password') }} </span>
                    @endif

                    <!-- Confirm Password Input -->
                    <input type="password" placeholder="Confirm Password" class="input-field"  id="confirmpassword" name="password_confirmation" required>
                    @if($errors->has('password_confirmation'))
                    <span class="text-danger"> {{ $errors->first('password_confirmation') }} </span>
                    @endif

                    <!-- Login Button -->
                    <button class="login-button">Sign up</button>
                

            <!-- Label and Create Account Link -->
                <div class="account-link-container">
                    <p>Already have an account? <a href="/login">Sign In</a></p>
                </div>

            <!--close container class-->
        </div>

        <!-- Right Image Section -->
        <div class="image-section">
            <img src="{{ asset('images/sample.jpg') }}" alt="Login Image">
            <div class="sign-up-text"> Sign Up</div>          
        </div>
        
         <!-- Social Media Icons Container -->
            <div class="social-icons-container">
                <!-- Gmail Icon -->
                <a href="https://mail.google.com" target="_blank">
                    <div class="circle-container"> <img src="{{ asset('images/gmail.png') }}" alt="Gmail Logo"> </div>
                </a>
                <!-- Facebook Icon -->
                <a href="https://facebook.com" target="_blank">
                    <div class="circle-container"> <img src="{{ asset('images/facebook.png') }}" alt="Facebook Logo"> </div>
                </a>
                <!-- Twitter Icon -->
                <a href="https://twitter.com" target="_blank">
                    <div class="circle-container"> <img src="{{ asset('images/twitter.png') }}" alt="Twitter Logo">  </div>
                </a>
            </div>

       
                <div class="terms-container">
                    <label class="terms-label">
                        <input type="checkbox" class="terms-checkbox" name="terms_and_conditions" required>
                        <p>By signing up I agree with <a href="/terms-and-conditions" target="_blank">terms and conditions</a>.</p>
                    </label>
                    @error('terms_and_conditions')
                        <div class="text-danger mt-2">{{ $message }}</div>
                    @enderror

                </div>
                
            <div class="welcome-text"> Create Account </div>

    </div>
       
</form>

</body>
</html>
@endsection