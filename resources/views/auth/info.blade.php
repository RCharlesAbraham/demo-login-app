@extends('layouts.app')

@section('title', $title . ' | IL² RMUTTO')

@push('styles')
<style>
    .info-header {
        background: #f8fafc;
        padding: 80px 20px;
        text-align: center;
        border-bottom: 1px solid #e2e8f0;
    }
    .info-title {
        font-size: 36px;
        font-weight: 800;
        color: #1e293b;
        margin-bottom: 16px;
    }
    .info-subtitle {
        font-size: 18px;
        color: #64748b;
        max-width: 600px;
        margin: 0 auto;
    }
    .info-content-wrap {
        max-width: 900px;
        margin: -40px auto 60px;
        background: #fff;
        border-radius: 20px;
        box-shadow: 0 10px 40px rgba(0,0,0,0.06);
        position: relative;
        z-index: 10;
        overflow: hidden;
    }
    .info-body {
        padding: 50px;
        font-size: 16px;
        line-height: 1.8;
        color: #475569;
    }
    .info-body h2 {
        font-size: 24px;
        font-weight: 700;
        color: #0f172a;
        margin-top: 40px;
        margin-bottom: 20px;
    }
    .info-body h2:first-child {
        margin-top: 0;
    }
    .info-body p {
        margin-bottom: 20px;
    }
    .info-actions {
        padding: 30px 50px;
        background: #f8fafc;
        border-top: 1px solid #f1f5f9;
        display: flex;
        gap: 16px;
        justify-content: center;
    }
    .btn-outline {
        padding: 12px 30px;
        border-radius: 12px;
        font-weight: 600;
        font-size: 15px;
        text-decoration: none;
        border: 2px solid #e2e8f0;
        color: #475569;
        transition: 0.2s;
    }
    .btn-outline:hover {
        border-color: #cbd5e1;
        background: #fff;
        color: #1e293b;
    }
</style>
@endpush

@section('content')
<main>
    <div class="info-header">
        <h1 class="info-title">{{ $title }}</h1>
        <p class="info-subtitle">{{ $description }}</p>
    </div>

    <div class="info-content-wrap">
        <div class="info-body">
            @if(request()->route('topic') == 'teach')
                <h2>Become an Instructor Today</h2>
                <p>Join our thriving community of educators and experts. IL2 provides you with the modern tools and massive reach you need to construct high-quality, impactful courses. We believe teaching should be rewarding, easy, and accessible to anyone with knowledge to share.</p>
                <h2>Benefits of Teaching</h2>
                <p>Enjoy flexible course building, advanced student metrics, and a dedicated support team helping you succeed as a mentor to thousands. You set the price, you own your content, and we help bring the students to your digital doorstep.</p>
            @elseif(request()->route('topic') == 'about')
                <h2>Connecting Students to Knowledge</h2>
                <p>IL² RMUTTO was born out of a desire to make world-class education accessible. Whether you are looking to advance your career or discover a new hobby, we provide courses across all disciplines taught by industry experts.</p>
            @elseif(request()->route('topic') == 'terms')
                <h2>Terms and Conditions</h2>
                <p>These terms and conditions outline the rules and regulations for the use of IL² RMUTTO's Website. By accessing this website we assume you accept these terms and conditions. Do not continue to use IL2 if you do not agree to take all of the terms and conditions stated on this page.</p>
                <h2>License</h2>
                <p>Unless otherwise stated, IL² RMUTTO and/or its licensors own the intellectual property rights for all material on IL² RMUTTO. All intellectual property rights are reserved. You may access this from IL² RMUTTO for your own personal use subjected to restrictions set in these terms and conditions.</p>
            @elseif(request()->route('topic') == 'privacy')
                <h2>Privacy Policy</h2>
                <p>Your privacy is critically important to us. It is IL² RMUTTO's policy to respect your privacy globally regarding any information we may collect from you across our website and applications.</p>
                <p>We only ask for personal information when we truly need it to provide a service to you. We collect it by fair and lawful means, with your knowledge and consent. We also let you know why we’re collecting it and how it will be used. We don't share any personally identifying information publicly or with third-parties, except when required to by law.</p>
            @elseif(request()->route('topic') == 'cookies')
                <h2>How We Use Cookies</h2>
                <p>We use cookies for a variety of reasons detailed below. Unfortunately, in most cases, there are no industry standard options for disabling cookies without completely disabling the functionality and features they add to this site.</p>
                <p>It is recommended that you leave on all cookies if you are not sure whether you need them or not, in case they are used to provide a service that you use.</p>
            @else
                <h2>Welcome to {{ $title }}</h2>
                <p>Thank you for visiting this section. We are currently updating our {{ strtolower($title) }} documentation to provide you with the most accurate and up-to-date information.</p>
                <p>If you have any immediate concerns or questions, feel free to reach out to our support team.</p>
            @endif
        </div>
        
        <div class="info-actions">
            <a href="{{ route('home') }}" class="btn btn-primary" style="padding: 12px 30px;">Back to Homepage</a>
            <a href="{{ route('search') }}" class="btn-outline">Browse Courses</a>
        </div>
    </div>
</main>
@endsection
