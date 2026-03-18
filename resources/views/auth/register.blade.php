@extends('layouts.auth')

@section('title', 'Sign Up')

@section('content')
<div class="login-wrapper register-wrapper" style="margin: 40px auto;">
    <div class="login-card" style="padding: 60px 80px;">
        <!-- Title -->
        <h1 class="login-title" style="color: #333; font-size: 26px; margin-bottom: 40px; font-weight: 700;">Sign Up and Start Learning!</h1>

            <form action="{{ route('register.post') }}" method="POST" class="auth-form">
                @csrf

                <!-- Role Toggle -->
                <div class="role-toggle-container">
                    <div class="role-toggle">
                        <input type="radio" id="role-learner" name="role" value="learner" {{ old('role', 'learner') === 'learner' ? 'checked' : '' }}>
                        <label for="role-learner" class="toggle-btn" id="label-learner">Learner</label>
                        
                        <input type="radio" id="role-guide" name="role" value="guide" {{ old('role') === 'guide' ? 'checked' : '' }}>
                        <label for="role-guide" class="toggle-btn" id="label-guide">Guide</label>
                        
                        <div class="toggle-slider"></div>
                    </div>
                </div>

                @if ($errors->any())
                    <div style="color: red; margin-bottom: 20px; font-size: 14px;">
                        @foreach ($errors->all() as $error)
                            <div>- {{ $error }}</div>
                        @endforeach
                    </div>
                @endif

                <div class="form-grid">
                    <!-- Row 1 -->
                    <div class="label-field">
                        <label for="full_name">Full Name<span style="color:red">*</span></label>
                        <input type="text" id="full_name" name="full_name" placeholder="Student" required>
                    </div>
                    <div class="label-field">
                        <label for="username">Username<span style="color:red">*</span></label>
                        <input type="text" id="username" name="username" placeholder="@Student2" required>
                    </div>

                    <!-- Row 2 -->
                    <div class="label-field">
                        <label for="password">Create Password<span style="color:red">*</span></label>
                        <input type="password" id="password" name="password" required>
                    </div>
                    <div class="label-field">
                        <label for="password_confirmation">Confirm Password<span style="color:red">*</span></label>
                        <input type="password" id="password_confirmation" name="password_confirmation" required>
                    </div>

                    <!-- Row 3 -->
                    <div class="label-field">
                        <label for="email">Email<span style="color:red">*</span></label>
                        <input type="email" id="email" name="email" placeholder="123@gmail.com" required>
                    </div>
                    <div class="label-field">
                        <label for="dob">Date of birth<span style="color:red">*</span></label>
                        <input type="text" id="dob" name="dob" placeholder="Teacher" required>
                    </div>

                    <!-- Row 4 -->
                    <div class="label-field">
                        <label for="phone">Phone No<span style="color:red">*</span></label>
                        <input type="text" id="phone" name="phone" placeholder="000-0000 0000" required>
                    </div>
                    <div class="label-field">
                        <label for="country">Country<span style="color:red">*</span></label>
                        <select id="country" name="country">
                            <option value="Malaysia">Malaysia</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>
                </div>

                <p class="tc-text">By signing up, you agree to our Terms, Data Policy & Cookies Policy.</p>

                <div class="form-actions row-actions" style="margin-top: 30px; justify-content: center; gap: 20px;">
                    <button type="submit" class="btn btn-primary" style="max-width: 280px;">Save & Continue</button>
                    <a href="{{ route('login') }}" class="btn btn-secondary" style="max-width: 280px; text-decoration: none; color: #4b5563;">Cancel</a>
                </div>
            </form>

            <div class="signup-container" style="margin-top: 30px;">
                <p>Already have an Account? <a href="{{ route('login') }}" class="signup-link">Sign in</a></p>
            </div>
        </div>
    </div>
</div>
@endsection

