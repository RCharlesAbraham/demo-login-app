@extends('layouts.dashboard')

@section('title', 'Course Detail | IL² RMUTTO')

@push('styles')
<style>


        
        

        
        
        
        
        
        
        
        
        
        

        
        
        
        
        

        
        

        
        
        
        
        
        

        /* ─── MAIN CONTENT ─── */
        .content { 
            flex: 1; background: #fff; border-radius: 35px; overflow: hidden;
            box-shadow: 0 10px 40px rgba(0,0,0,0.02); display: flex; flex-direction: column; 
        }

        /* HERO SECTION */
        .hero { display: flex; gap: 40px; padding: 40px; border-bottom: 1px solid #f1f5f9; }
        .hero-left { flex: 1.1; }
        
        .teacher-meta { display: flex; justify-content: space-between; align-items: center; margin-bottom: 25px; }
        .t-profile { display: flex; align-items: center; gap: 15px; }
        .t-labels p { font-size: 12px; color: #94a3b8; margin: 0; font-weight: 500; }
        .t-labels span { color: #2563eb; font-weight: 800; }
        .t-stats-row { display: flex; gap: 15px; margin-top: 5px; font-size: 12px; font-weight: 700; color: #94a3b8; }
        .t-actions-wrap { display: flex; gap: 10px; }
        .btn-pill-small { 
            padding: 8px 25px; border: 1.5px solid #e2e8f0; border-radius: 20px; 
            font-size: 11px; font-weight: 800; color: #64748b; text-decoration: none;
        }

        .title-row { display: flex; justify-content: space-between; align-items: center; margin-bottom: 15px; }
        .title-row h1 { font-size: 32px; font-weight: 900; color: #0f172a; margin: 0; letter-spacing: -0.5px; }
        .price-text { font-size: 28px; font-weight: 900; color: #f97316; }
        .updated-date { font-size: 11px; color: #94a3b8; margin-bottom: 20px; font-weight: 500; }
        .course-summary { font-size: 14px; color: #64748b; line-height: 1.7; margin-bottom: 25px; }

        .dates-flex { display: flex; gap: 30px; font-size: 12px; color: #64748b; margin-bottom: 35px; font-weight: 600; }
        .dates-flex span { color: #2563eb; font-weight: 800; }

        .btn-group { display: flex; gap: 15px; }
        .btn-sub { background: #003a70; color: #fff; padding: 14px 40px; border-radius: 12px; font-size: 14px; font-weight: 800; text-decoration: none; }
        .btn-cart { background: #002b55; color: #fff; padding: 14px 40px; border-radius: 12px; font-size: 14px; font-weight: 800; text-decoration: none; }

        /* VIDEO PLAYER */
        .hero-right { flex: 0.9; }
        .video-box { 
            width: 100%; aspect-ratio: 16/10; border-radius: 25px; background: linear-gradient(180deg, #c8cdd6 0%, #6b7280 100%);
            position: relative; display: flex; align-items: center; justify-content: center; box-shadow: 0 20px 50px rgba(0,0,0,0.1);
        }
        .pause-btn { background: #e11d1d; border-radius: 50px; width: 72px; height: 36px; display: flex; align-items: center; justify-content: center; gap: 6px; cursor: pointer; box-shadow: 0 4px 15px rgba(225,29,29,0.4); transition: transform 0.2s ease; }
        .pause-btn:hover { transform: scale(1.08); }
        .pause-bar { width: 4px; height: 14px; background: #ffffff; border-radius: 2px; }

        /* TABS NAVIGATION */
        .tabs-nav {
            display: flex; background: #f8fafc; border-bottom: 1px solid #e2e8f0; padding: 0 40px;
        }
        .tab-item {
            padding: 18px 25px; font-size: 13px; font-weight: 700; color: #64748b; cursor: pointer; border-bottom: 3px solid transparent; transition: 0.2s; text-decoration: none;
        }
        .tab-item.active {
            color: #000; border-bottom-color: #003a70; background: #fff; border-radius: 12px 12px 0 0; margin-top: 10px; border: 1px solid #e2e8f0; border-bottom: none;
        }

        /* SECTION CONTENT AREA */
        .section-container { display: grid; grid-template-columns: 1fr 340px; gap: 60px; padding: 50px 40px; }
        
        /* CONTENT SECTIONS */
        .content-left { }
        .content-section { margin-bottom: 50px; }
        .content-section h2 { font-size: 18px; font-weight: 900; color: #0f172a; margin-bottom: 25px; }
        
        /* LEARN LIST */
        .learn-list { list-style: none; }
        .learn-list li { 
            position: relative; padding-left: 20px; margin-bottom: 12px; font-size: 14px; color: #475569; font-weight: 500; line-height: 1.6;
        }
        .learn-list li::before { content: '•'; position: absolute; left: 0; color: #000; font-weight: 900; }

        /* PILL TAGS */
        .pill-group { display: flex; flex-wrap: wrap; gap: 10px; margin-top: 20px; }
        .pill-tag { 
            background: #f1f5f9; padding: 8px 20px; border-radius: 30px; 
            font-size: 13px; font-weight: 600; color: #475569; border: 1.5px solid #e2e8f0;
        }
        .pill-tag.blue { color: #2563eb; }
        .show-all-link { color: #2563eb; font-weight: 800; font-size: 13px; margin-left: 10px; cursor: pointer; text-decoration: none; }

        /* RIGHT SIDEBAR */
        .sidebar-right { display: flex; flex-direction: column; gap: 40px; }
        .about-course h3 { font-size: 16px; font-weight: 900; color: #0f172a; margin-bottom: 8px; }
        .course-id { font-size: 12px; color: #94a3b8; font-family: monospace; }
        
        .free-banner { 
            background: #f1f7fe; padding: 25px; border-radius: 20px; margin-top: 20px;
            display: flex; justify-content: space-between; align-items: center; border: 1px solid #e2e8f0;
        }
        .free-text h4 { font-size: 14px; font-weight: 900; color: #0f172a; margin-bottom: 5px; }
        .free-text p { font-size: 12px; color: #64748b; font-weight: 500; }
        .btn-free { background: #003a70; color: #fff; padding: 10px 25px; border-radius: 10px; font-size: 13px; font-weight: 800; text-decoration: none; }

        /* FEATURE ICONS GRID */
        .feature-v-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-top: 40px; }
        .fv-item { background: #f8fafc; padding: 25px 20px; border-radius: 20px; display: flex; flex-direction: column; gap: 12px; }
        .fv-item img { width: 32px; height: 32px; }
        .fv-item .lab { font-size: 14px; font-weight: 800; color: #0f172a; }
        .fv-item .val { font-size: 12px; color: #94a3b8; font-weight: 600; }
</style>
@endpush

@section('dashboard-content')
<!-- ── HEADER ── -->
    

    <div class="app-container" style="max-width: 1450px; margin: 0 auto; padding: 20px 0; width: 100%;">
        <!-- ── SIDEBAR ── -->
        

        <!-- ── MAIN CONTENT ── -->
        <main class="content">
            <!-- HERO -->
            <div class="hero">
                <div class="hero-left">
                    <div class="teacher-meta">
                        <div class="t-profile">
                            <div class="avatar-circle" style="width:44px; height:44px;"></div>
                            <div class="t-labels">
                                <p>Created by : <span>Teacher</span></p>
                                <div class="t-stats-row"><span>⭐ 0 Ratings</span> <span>👥 0 Students</span></div>
                            </div>
                        </div>
                        <div class="t-actions-wrap">
                            <a href="{{ route('favorites') }}" class="btn-pill-small">Save</a>
                            <a href="{{ route('recommendations') }}" class="btn-pill-small">Share</a>
                        </div>
                    </div>

                    <div class="title-row">
                        <h1>Mathematic Class</h1>
                        <span class="price-text">$10.99</span>
                    </div>
                    <div class="updated-date">📅 Updated date : 26 June 2023</div>
                    <p class="course-summary">Tutor simulates a physical learning environment with interactive learning that allows instructors and students to engage with one another.</p>
                    <div class="dates-flex">
                        <p>Course start date : <span>26 June 2023</span></p>
                        <p>Course end date : <span>26 June 2023</span></p>
                    </div>
                    <div class="btn-group">
                        <a href="{{ route('shopping.cart') }}" class="btn-sub">Subscribe Now</a>
                        <a href="{{ route('shopping.cart') }}" class="btn-cart">Add to Cart</a>
                    </div>
                </div>

                <div class="hero-right">
                    <div class="video-box">
                        <div class="pause-btn"><div class="pause-bar"></div><div class="pause-bar"></div></div>
                    </div>
                </div>
            </div>

            <!-- TABS -->
            <nav class="tabs-nav">
                <a href="{{ route('course.detail') }}" class="tab-item active">About</a>
                <a href="{{ route('courses') }}" class="tab-item">Outcomes</a>
                <a href="{{ route('modules') }}" class="tab-item">Modules</a>
                <a href="{{ route('recommendations') }}" class="tab-item">Recommendations</a>
                <a href="{{ route('testimonials') }}" class="tab-item">Testimonials</a>
                <a href="{{ route('reviews') }}" class="tab-item">Reviews</a>
            </nav>

            <!-- SECTION CONTAINER -->
            <div class="section-container">
                <div class="content-left">
                    <div class="content-section">
                        <h2>What you'll learn</h2>
                        <ul class="learn-list">
                            <li>Understand essential e-commerce strategies and practices</li>
                            <li>Explain what e-commerce stores and platforms are and how they work</li>
                            <li>Create an engaging customer experience online using best practices</li>
                            <li>Set up a mock e-commerce store using Shopify</li>
                        </ul>
                    </div>

                    <div class="content-section">
                        <h2>Skills you'll gain</h2>
                        <div class="pill-group">
                            <span class="pill-tag">Target Audience</span>
                            <span class="pill-tag">Digital Advertising</span>
                            <span class="pill-tag">E-Commerce</span>
                            <span class="pill-tag">Market Trend</span>
                            <span class="pill-tag">Shipping and Receiving</span>
                            <span class="pill-tag">Market Research</span>
                            <span class="pill-tag">Customer Experience Improvement</span>
                            <span class="pill-tag">Order Fulfilment</span>
                            <span class="pill-tag">Process Optimization</span>
                            <span class="pill-tag">Sales</span>
                            <a href="{{ route('courses') }}" class="show-all-link">Show all</a>
                        </div>
                    </div>

                    <div class="content-section">
                        <h2>Tools you'll learn</h2>
                        <div class="pill-group">
                            <span class="pill-tag">Google Ads</span>
                        </div>
                    </div>
                </div>

                <!-- RIGHT SIDEBAR -->
                <div class="sidebar-right">
                    <div class="about-course">
                        <h3>About this course</h3>
                        <span class="course-code">34765879709809</span>
                        
                        <div class="free-banner">
                            <div class="free-text">
                                <h4>Get a free sessions - hello maths</h4>
                                <p>Watch your favorite guide's free content</p>
                            </div>
                            <a href="{{ route('free.courses') }}" class="btn-free">Free</a>
                        </div>

                        <div class="feature-v-grid">
                            <div class="fv-item">
                                <img src="{{ asset('images/icons/duration.png') }}">
                                <span class="lab">Duration</span>
                                <span class="val">23 Days</span>
                            </div>
                            <div class="fv-item">
                                <img src="{{ asset('images/icons/weelkly.png') }}">
                                <span class="lab">Weekly Study</span>
                                <span class="val">32 Hours</span>
                            </div>
                            <div class="fv-item">
                                <img src="{{ asset('images/icons/100%.png') }}">
                                <span class="lab">100% Online</span>
                                <span class="val">Learn at your own place</span>
                            </div>
                            <div class="fv-item">
                                <img src="{{ asset('images/icons/quiz.png') }}">
                                <span class="lab">Quiz</span>
                                <span class="val">Total Quizzes: 3</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </main>
    </div>
@endsection
