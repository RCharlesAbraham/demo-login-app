@extends('layouts.app')

@section('title', $title)

@section('content')
<div class="login-wrapper">
    <div class="login-card" style="max-width: 760px; text-align: center;">
        <h1 class="login-title" style="margin-bottom: 12px;">{{ $title }}</h1>
        <p style="color: #475569; margin-bottom: 24px;">{{ $description }}</p>

        <div style="display: flex; gap: 12px; justify-content: center; flex-wrap: wrap;">
            <a href="{{ route('home') }}" class="btn btn-primary">Go Home</a>
            <a href="{{ route('search') }}" class="btn btn-google" style="text-decoration: none;">Search Help</a>
        </div>
    </div>
</div>
@endsection
