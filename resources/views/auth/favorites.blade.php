@extends('layouts.app')

@section('title', 'Favorites | IL² RMUTTO')

@section('content')
<div class="app-container">
    <div class="content-header">
        <h1 class="page-title">My Favorites</h1>
        <p class="page-subtitle">You have 4 courses saved in your wishlist</p>
    </div>

    <div class="courses-grid" style="display: grid; grid-template-columns: repeat(auto-fill, minmax(300px, 1fr)); gap: 30px; margin-top: 30px;">
        @php
            $favs = [
                ['title' => 'Mastering Modern Art', 'badge' => 'Premium', 'is_favorite' => true],
                ['title' => 'Advanced Robotics', 'badge' => 'Free', 'is_favorite' => true],
                ['title' => 'Web Development 2024', 'badge' => 'New', 'is_favorite' => true],
                ['title' => 'Deep Focus Study Tips', 'badge' => 'Free', 'is_favorite' => true],
            ];
        @endphp

        @foreach($favs as $course)
            @include('partials.course-card', $course)
        @endforeach
    </div>
</div>

<style>
    .app-container {
        max-width: 1450px;
        margin: 0 auto;
        padding: 40px 30px;
        width: 100%;
    }
    .page-title {
        font-size: 28px;
        font-weight: 800;
        color: #1e293b;
        margin-bottom: 8px;
    }
    .page-subtitle {
        font-size: 15px;
        color: #64748b;
    }
    .content-header {
        margin-bottom: 20px;
    }
</style>
@endsection
