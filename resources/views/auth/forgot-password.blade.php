@extends('layouts.auth')

@section('title', 'Forgot Password')

@section('content')
<div class="login-wrapper">
    <div class="login-card">
        <!-- Header Section -->
        <div class="login-header">
            <div class="logo-container">
                <img src="{{ asset('images/logo.png') }}" alt="IL2 Logo" class="logo" onerror="this.src='https://placehold.co/180x90/ffffff/0f2b60?text=IL%C2%B2+Logo'">
            </div>
            <h1 class="login-title" style="color: var(--deep-navy);">Enter Email Address</h1>
        </div>

        <!-- Form Section -->
        <form action="{{ route('password.email') }}" method="POST" class="auth-form" id="forgotPasswordForm">
            @csrf

            @if (session('success'))
                <div style="color: green; margin-bottom: 20px; font-weight: 600; font-size: 14px; text-align: center;">
                    {{ session('success') }}
                </div>
            @endif

            @if ($errors->any())
                <div style="color: red; margin-bottom: 15px; font-size: 14px; text-align: center;">
                    {{ $errors->first() }}
                </div>
            @endif

            <div class="input-group" style="margin-bottom: 40px;">
                <input type="email" id="email" name="email" placeholder="Email" required>
            </div>

            <div class="form-actions" style="margin-bottom: 25px;">
                <button type="submit" class="btn btn-primary" style="width: 100%; max-width: 220px; margin: 0 auto; display: block;">Send</button>
            </div>
        </form>

        <div class="text-center">
            <a href="{{ route('login') }}" class="back-link">Back to Sign In</a>
        </div>

    </div>
</div>
@endsection

