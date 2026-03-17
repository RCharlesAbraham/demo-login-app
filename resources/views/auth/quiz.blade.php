@extends('layouts.dashboard')

@section('title', 'Quiz | IL² RMUTTO')

@push('styles')
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
    .quiz-card {
        background: #fff;
        border-radius: 24px;
        overflow: hidden;
        border: 1px solid #e2e8f0;
        transition: all 0.3s ease;
        padding: 20px;
    }
    .quiz-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 12px 30px rgba(0,0,0,0.06);
    }
    .quiz-image {
        position: relative;
        height: 180px;
    }
    .quiz-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    .quiz-time {
        position: absolute;
        bottom: 15px;
        right: 15px;
        background: rgba(15, 60, 110, 0.9);
        backdrop-filter: blur(4px);
        color: #fff;
        padding: 6px 14px;
        border-radius: 20px;
        font-size: 11px;
        font-weight: 700;
    }
    .quiz-
    .quiz-meta {
        display: flex;
        gap: 12px;
        margin-bottom: 12px;
    }
    .quiz-tag {
        background: #eff6ff;
        color: #3b82f6;
        padding: 4px 12px;
        border-radius: 6px;
        font-size: 11px;
        font-weight: 700;
    }
    .quiz-difficulty {
        background: #fff7ed;
        color: #f97316;
        padding: 4px 12px;
        border-radius: 6px;
        font-size: 11px;
        font-weight: 700;
    }
    .quiz-title {
        font-size: 18px;
        font-weight: 700;
        color: #1e293b;
        margin-bottom: 10px;
    }
    .quiz-text {
        font-size: 13.5px;
        color: #64748b;
        line-height: 1.6;
        margin-bottom: 24px;
    }
    .quiz-footer {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding-top: 20px;
        border-top: 1px dashed #e2e8f0;
    }
    .quiz-stats {
        display: flex;
        flex-direction: column;
        gap: 6px;
    }
    .q-stat {
        display: flex;
        align-items: center;
        gap: 6px;
        font-size: 12px;
        color: #94a3b8;
        font-weight: 500;
    }
    .btn-start-quiz {
        background: #0f3c6e;
        color: #fff;
        border: none;
        padding: 10px 20px;
        border-radius: 30px;
        font-size: 13px;
        font-weight: 600;
        cursor: pointer;
        transition: background 0.2s;
    }
    .btn-start-quiz:hover {
        background: #0a2e55;
    }
</style>
@endpush

@section('dashboard-content')
<div class="app-container">
    <div class="content-header">
        <h1 class="page-title">Active Quizzes</h1>
        <p class="page-subtitle">Test your knowledge and earn badges</p>
    </div>

    <div class="quiz-grid" style="display: grid; grid-template-columns: repeat(auto-fill, minmax(350px, 1fr)); gap: 30px; margin-top: 30px;">
        @for($i = 1; $i <= 3; $i++)
        <div class="quiz-card">
            <div class="quiz-image">
                <img src="{{ asset('images/learning.png') }}" alt="Quiz">
                <span class="quiz-time">15 Mins</span>
            </div>
            <div class="quiz-body">
                <div class="quiz-meta">
                    <span class="quiz-tag">Mathematics</span>
                    <span class="quiz-difficulty">Intermediate</span>
                </div>
                <h3 class="quiz-title">Algebra Fundamentals Quiz #{{ $i }}</h3>
                <p class="quiz-text">Test your understanding of linear equations, quadratic functions, and polynomial operations.</p>
                <div class="quiz-footer">
                    <div class="quiz-stats">
                        <div class="q-stat">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M12 20V10M18 20V4M6 20v-4"/></svg>
                            24 Questions
                        </div>
                        <div class="q-stat">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                            150 Attempted
                        </div>
                    </div>
                    <button class="btn-start-quiz">Start Now</button>
                </div>
            </div>
        </div>
        @endfor
    </div>
</div>
@endsection
