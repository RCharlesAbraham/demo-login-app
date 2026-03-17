@extends('layouts.auth')

@section('title', 'New Password')

@section('content')
<div class="login-wrapper">
    <div class="login-card">
        <!-- Header Section -->
        <div class="login-header">
            <div class="logo-container">
                <img src="{{ asset('images/logo.png') }}" alt="IL2 Logo" class="logo" onerror="this.src='https://placehold.co/180x90/ffffff/0f2b60?text=IL%C2%B2+Logo'">
            </div>
            <h1 class="login-title" style="color: var(--deep-navy);">New Password</h1>
        </div>

        <!-- Form Section -->
        <form action="{{ route('password.update') }}" method="POST" class="auth-form" id="resetPasswordForm">
            @csrf
            <div class="input-group password-group">
                <input type="password" id="new_password" name="new_password" placeholder="Enter New Password" required>
                <button type="button" class="toggle-password" aria-label="Toggle Password Visibility">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24"></path>
                        <line x1="1" y1="1" x2="23" y2="23"></line>
                    </svg>
                </button>
            </div>

            <div class="input-group password-group" style="margin-bottom: 40px;">
                <input type="password" id="confirm_password" name="confirm_password" placeholder="Confirm New Password" required>
                <button type="button" class="toggle-password" aria-label="Toggle Password Visibility">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24"></path>
                        <line x1="1" y1="1" x2="23" y2="23"></line>
                    </svg>
                </button>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn btn-primary" style="width: 100%; max-width: 220px; margin: 0 auto; display: block;">Submit</button>
            </div>
        </form>

        <div class="text-center" style="margin-top: 20px;">
            <a href="{{ route('login') }}" class="back-link">Back to Sign In</a>
        </div>
    </div>
</div>
@endsection

