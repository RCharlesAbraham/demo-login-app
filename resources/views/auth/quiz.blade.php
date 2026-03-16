@extends('layouts.app')

@section('title', 'Quiz')

@section('content')
<div class="login-wrapper">
    <div class="login-card" style="max-width: 760px; text-align: center;">
        <h1 class="login-title" style="margin-bottom: 12px;">Quiz Center</h1>
        <p style="color: #475569; margin-bottom: 24px;">
            Practice quizzes are being organized by course and module.
        </p>

        <div style="display: flex; gap: 12px; justify-content: center; flex-wrap: wrap;">
            <a href="{{ route('courses') }}" class="btn btn-primary">Browse Courses</a>
            <a href="{{ route('learning') }}" class="btn btn-google" style="text-decoration: none;">Back to Learning</a>
        </div>
    </div>
</div>
@endsection
