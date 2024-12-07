@extends('layouts.layout')
@section("title", "Terms and Conditions")
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Terms and Conditions</title>
    <link rel="stylesheet" href="{{ asset('css/terms-and-conditions.css') }}">
</head>
<body>
    <div class="terms-container">
        <!-- Header Section -->
        <div class="terms-header">
            <h1>Terms and Conditions</h1>
            <p>Effective Date: {{ date('F d, Y') }}</p>
        </div>

        <!-- General Information -->
        <div class="terms-section">
            <h2>1. General Information</h2>
            <p>Welcome to EQUICKSERV, the Audio Visual Room Reservation System for the University of Cebu Lapu-Lapu and Mandaue. By accessing or using our system, you agree to comply with these terms and conditions.</p>
        </div>

        <!-- User Responsibilities -->
        <div class="terms-section">
            <h2>2. User Responsibilities</h2>
            <p>As a user, you agree to:</p>
            <ul>
                <li>Provide accurate and up-to-date information during registration and reservation processes.</li>
                <li>Ensure that reserved rooms are used for their intended purposes only.</li>
                <li>Follow the university’s rules and regulations regarding the use of audio-visual equipment and facilities.</li>
                <li>Report any damages or technical issues immediately to the administration.</li>
            </ul>
        </div>

        <!-- Reservation Guidelines -->
        <div class="terms-section">
            <h2>3. Reservation Guidelines</h2>
            <p>Reservations must adhere to the following guidelines:</p>
            <ul>
                <li>Reservations can only be made by registered users.</li>
                <li>Booking must be completed at least 24 hours in advance.</li>
                <li>Cancellation should be done at least 12 hours before the reserved time.</li>
                <li>Late arrivals may result in forfeiture of the reservation.</li>
            </ul>
        </div>

        <!-- Privacy Policy -->
        <div class="terms-section">
            <h2>4. Privacy Policy</h2>
            <p>We value your privacy. Your data will only be used for reservation purposes and will not be shared with unauthorized parties.</p>
        </div>

        <!-- Limitation of Liability -->
        <div class="terms-section">
            <h2>5. Limitation of Liability</h2>
            <p>EQUICKSERV is not responsible for:</p>
            <ul>
                <li>Personal items left in the reserved room.</li>
                <li>Unavailability of rooms due to unforeseen circumstances (e.g., technical issues, maintenance).</li>
                <li>Unauthorized use of your account.</li>
            </ul>
        </div>

        <!-- Changes to Terms -->
        <div class="terms-section">
            <h2>6. Changes to Terms</h2>
            <p>We reserve the right to update these terms at any time. Users will be notified of changes through the system dashboard.</p>
        </div>

        <!-- Footer Section -->
        <a href="{{ route('register') }}" class="back-button">Back to Registration</a>
    </div>
</body>
</html>
@endsection
