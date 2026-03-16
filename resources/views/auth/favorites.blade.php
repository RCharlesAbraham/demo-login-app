@extends('layouts.app')

@section('title', 'Favorites')

@section('content')
<div class="login-wrapper">
    <div class="login-card" style="max-width: 760px; text-align: center;">
        <h1 class="login-title" style="margin-bottom: 12px;">Favorites</h1>
        <p style="color: #475569; margin-bottom: 24px;">
            Your saved courses and items will appear here.
        </p>

        <div style="display: flex; gap: 12px; justify-content: center; flex-wrap: wrap;">
            <a href="{{ route('courses') }}" class="btn btn-primary">Explore Courses</a>
            <a href="{{ route('shopping.cart') }}" class="btn btn-google" style="text-decoration: none;">Open Cart</a>
        </div>
    </div>
</div>
@endsection
