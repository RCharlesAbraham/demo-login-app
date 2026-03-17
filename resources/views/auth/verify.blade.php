@extends('layouts.auth')

@section('title', 'Verification Code')

@section('content')
<div class="login-wrapper">
    <div class="login-card">
        <!-- Header Section -->
        <div class="login-header">
            <div class="logo-container">
                <img src="{{ asset('images/logo.png') }}" alt="IL2 Logo" class="logo" onerror="this.src='https://placehold.co/180x90/ffffff/0f2b60?text=IL%C2%B2+Logo'">
            </div>
            <h1 class="login-title" style="color: var(--deep-navy);">Enter Verification Code</h1>
        </div>

        <!-- Form Section -->
        <form action="{{ route('verification.verify') }}" method="POST" class="auth-form" id="verifyForm">
            @csrf
            <div class="verification-code">
                <input type="text" maxlength="1" pattern="[0-9]" required autocomplete="off">
                <input type="text" maxlength="1" pattern="[0-9]" required autocomplete="off">
                <input type="text" maxlength="1" pattern="[0-9]" required autocomplete="off">
                <input type="text" maxlength="1" pattern="[0-9]" required autocomplete="off">
                <input type="text" maxlength="1" pattern="[0-9]" required autocomplete="off">
                <input type="text" maxlength="1" pattern="[0-9]" required autocomplete="off">
            </div>

            <div class="form-actions" style="margin-top: 40px; margin-bottom: 20px;">
                <button type="submit" class="btn btn-primary" style="width: 100%; max-width: 220px; margin: 0 auto; display: block;">Verify</button>
            </div>
        </form>

        <div class="text-center">
            <p class="resend-text">Send code again <span>50 Sec</span></p>
            <div style="margin-top: 20px;">
                <a href="{{ route('login') }}" class="back-link">Back to Sign In</a>
            </div>
        </div>
    </div>
</div>
@endsection

