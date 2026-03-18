<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home | IL² RMUTTO</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}?v={{ time() }}">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}?v={{ time() }}">
</head>
<body class="home-page">
    <!-- Header / Navigation -->
        <header class="glass-header">
        <div class="header-left">
            <a href="{{ route('home') }}">
                <img src="{{ asset('images/logo.png') }}" alt="Logo" class="logo">
            </a>
            
            <a href="{{ route('category') }}" class="category-btn">
                Categories
                <div class="arrow-icons">
                    <svg viewBox="0 0 24 24" style="width:8px;height:8px;" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="18 15 12 9 6 15"></polyline></svg>
                    <svg viewBox="0 0 24 24" style="width:8px;height:8px;" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="6 9 12 15 18 9"></polyline></svg>
                </div>
            </a>
            
            <div class="search-box">
                <a href="{{ route('search') }}" style="position:absolute;left:15px;top:50%;transform:translateY(-50%);color:#a0aec0; display: flex; align-items: center;">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                </a>
                <input type="text" placeholder="Search here" onfocus="window.location.href='{{ route('search') }}'">
            </div>
        </div>

        <div class="header-right">
            @auth
            <button class="icon-btn" title="Wishlist">
                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l8.78-8.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg>
            </button>
            <a href="{{ route('shopping.cart') }}" class="icon-btn" title="Cart">
                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path></svg>
            </a>
            <button class="icon-btn" title="Notifications" style="position:relative;">
                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path><path d="M13.73 21a2 2 0 0 1-3.46 0"></path></svg>
                <span style="position:absolute;top:-5px;right:-5px;background:#f97316;color:white;font-size:10px;border-radius:50%;width:16px;height:16px;display:flex;align-items:center;justify-content:center;">2</span>
            </button>
            
            <a href="{{ route('account.new') }}" class="user-profile">
                <div class="avatar-circle"></div>
                <span>{{ Auth::user()->name ?? 'User' }}</span>
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="m6 9 6 6 6-6"/></svg>
            </a>
            @endauth

            <!-- Mobile Menu Toggle -->
            <button class="mobile-menu-toggle" id="mobileMenuToggle">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg>
            </button>
        </div>
    </header>

    <!-- Mobile Sidebar Nav -->
    <div class="mobile-nav-overlay" id="mobileNavOverlay"></div>
    <div class="mobile-side-nav" id="mobileSideNav">
        <div class="mobile-nav-header">
            <img src="{{ asset('images/logo.png') }}" alt="Logo" class="logo">
            <button class="close-mobile-nav" id="closeMobileNav">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
            </button>
        </div>
        <div class="mobile-nav-body">
            <div class="mobile-search-box">
                <form action="{{ route('search') }}" method="GET">
                    <input type="text" placeholder="Search courses..." name="q">
                </form>
            </div>
            <ul class="mobile-nav-links">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><a href="{{ route('category') }}">Categories</a></li>
                <li><a href="{{ route('courses') }}">All Courses</a></li>
                <li><a href="{{ route('free.courses') }}">Free Courses</a></li>
                <li><a href="{{ route('dashboard.1') }}">My Dashboard</a></li>
            </ul>
            <div class="mobile-nav-footer">
                @guest
                    <a href="{{ route('login') }}" class="btn-step-1">Login</a>
                    <a href="{{ route('register') }}" class="btn-step-1" style="background: transparent; color: #0f3c6e; border: 1px solid #0f3c6e;">Signup</a>
                @else
                    <a href="{{ route('account.new') }}" class="mobile-user-profile">
                        <div class="avatar-circle"></div>
                        <span>{{ Auth::user()->name ?? 'User' }}</span>
                    </a>
                @endguest
            </div>
        </div>
    </div>

    <!-- HERO SECTION - STEP 1: CLEARING AND RESTRUCTURING -->
    <section class="hero-section hero-step-1-wrapper">
        <div class="hero-step-1-container">
            
            <!-- LEFT SIDE: Image + Gradients -->
            <!-- LEFT SIDE: Image + Gradients -->
            <div class="hero-left-column">
                <img src="{{ asset('images/math_bg.png') }}" alt="Hero Image" class="hero-img-math">
            </div>
            
            <!-- RIGHT SIDE: Text Content -->
            <div class="hero-right-column">
                <h1 class="hero-title-main">Investing in<br>Knowledge and<br>your future</h1>
                <p class="hero-desc-main">Tutor simulates a physical learning environment with interactive learning that allows instructors and students to engage with one another.</p>
                <div class="hero-action-btns">
                    <a href="{{ route('login') }}" class="btn-step-1">Login</a>
                    <a href="{{ route('register') }}" class="btn-step-1">Signup</a>
                </div>
            </div>

            <!-- Removed marked decoration -->

        </div>
    </section>

    <!-- FEATURES ROW -->
    <section class="features-section">
        <div class="features-grid">
            <div class="feature-card">
                <div class="feature-icon" style="background: #ff8a00;">
                    <img src="{{ asset('images/icons/badge 1.svg') }}" alt="Great Deals" style="width:36px;height:36px;object-fit:contain;">
                </div>
                <div>
                    <h4>Great Deals for you</h4>
                    <p>Get some great deals and discounts on courses. Avail Now. Happy teaching and learning, everyone!</p>
                </div>
            </div>
            <div class="feature-card">
                <div class="feature-icon" style="background: #93c5fd;">
                    <img src="{{ asset('images/icons/video streaming 1.svg') }}" alt="Audio & Video" style="width:36px;height:36px;object-fit:contain;">
                </div>
                <div>
                    <h4>Audio &amp; Video</h4>
                    <p>High-quality audio and video courses make it easy to learn and teach new skills. Get started right away!</p>
                </div>
            </div>
            <div class="feature-card">
                <div class="feature-icon" style="background: #34d399;">
                    <img src="{{ asset('images/icons/video call 1.svg') }}" alt="Virtual Classroom" style="width:36px;height:36px;object-fit:contain;">
                </div>
                <div>
                    <h4>Virtual Classroom</h4>
                    <p>Tutor simulates a physical learning environment with interactive learning that allows instructors and students to engage with one another.</p>
                </div>
            </div>
            <div class="feature-card">
                <div class="feature-icon" style="background: #0d9488;">
                    <img src="{{ asset('images/icons/study 1.svg') }}" alt="Group learning" style="width:36px;height:36px;object-fit:contain;">
                </div>
                <div>
                    <h4>Group learning</h4>
                    <p>Put your heads together and increase your knowledge base. With the right platform, transform your course into an interactive group experience.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- WIDE RANGE SECTION -->
    <section class="wide-range-section">
        <div class="wide-range-inner">
            <!-- Left Side: Heading and Staggered Images -->
            <div class="wide-range-left">
                <h2 class="section-heading">A wide range of<br>courses to spark<br>your creativity</h2>
                <div class="wide-range-images-custom">
                    <!-- Girl Image -->
                    <div class="wr-img-block wr-img-1">
                        <img src="{{ asset('images/learning.png') }}" alt="Learning Robotics">
                    </div>
                    <!-- Boy Image (Staggered) -->
                    <div class="wr-img-block wr-img-2">
                        <img src="{{ asset('images/testing1.png') }}" alt="Deep Focus">
                    </div>
                </div>
            </div>

            <!-- Right Side: Category Cards and CTA -->
            <div class="wide-range-right">
                <div class="category-cards-grid">
                    <div class="category-card-item">
                        <div class="cat-icon">
                            <img src="{{ asset('images/icons/007-vectors 1.svg') }}" alt="Modern Art & Ideas">
                        </div>
                        <div class="cat-text">
                            <h5>Modern</h5>
                            <p>Art &amp; Ideas</p>
                        </div>
                    </div>
                    <div class="category-card-item">
                        <div class="cat-icon">
                            <img src="{{ asset('images/icons/Group.svg') }}" alt="Ignite Your Everyday Creativity">
                        </div>
                        <div class="cat-text">
                            <h5>Ignite Your</h5>
                            <p>Everyday Creativity</p>
                        </div>
                    </div>
                    <div class="category-card-item">
                        <div class="cat-icon">
                            <img src="{{ asset('images/icons/science 1 (1).svg') }}" alt="Electrodynamics">
                        </div>
                        <div class="cat-text">
                            <h5>Electrodynamics</h5>
                            <p>Specialization</p>
                        </div>
                    </div>
                    <div class="category-card-item">
                        <div class="cat-icon">
                            <img src="{{ asset('images/icons/Group (1).svg') }}" alt="Postwar Abstract Painting">
                        </div>
                        <div class="cat-text">
                            <h5>Postwar</h5>
                            <p>Abstract Painting</p>
                        </div>
                    </div>
                </div>

                <ul class="wr-points">
                    <li>Find the top course that fits you from a wide range of online topics available with new additions published frequently and expand your career opportunities.</li>
                    <li>Explore our different categories to expand your creative skillset.</li>
                </ul>

                <a href="{{ route('register') }}" class="btn-get-started">Get Started</a>
            </div>
        </div>
    </section>

    <!-- CAREER PERSPECTIVE SECTION -->
    <section class="career-section">
        <div class="career-inner">
            <h2 class="section-heading-center">Construct a stunning career perspective</h2>
            <p class="section-sub-center">We just don't give our students only lecture but real life experience</p>
            
            <div class="live-classes-grid" style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 24px;">
                @for($i = 0; $i < 3; $i++)
                <div class="free-session-card">
                    <div class="free-session-thumb">
                        <img src="{{ asset('images/learning.png') }}" alt="Live Class">
                    </div>
                    <div class="free-session-info">
                        <div class="free-card-meta">
                            <span class="teacher-tag">Teacher</span>
                            <div class="live-badge-target">
                                <div class="target-icon"></div>
                                Live
                            </div>
                        </div>
                        <h4>Mastering Maths</h4>
                        <p class="topic-text">Topic Description</p>
                        <div class="free-card-footer">
                            <div class="footer-item">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
                                29 June 2023
                            </div>
                            <div class="footer-item">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                                02:00 PM
                            </div>
                        </div>
                    </div>
                </div>
                @endfor
            </div>
        </div>
    </section>

    <!-- FREE SESSION COURSES -->
    <section class="course-section" style="background: white;">
        <div class="course-section-header">
            <div>
                <h2 class="section-heading" style="font-size: 24px; margin-bottom: 8px;">Pick a free session course<br>to get started</h2>
                <p class="section-sub">Once you done with your free videos, for continue you have to subscribe the course</p>
            </div>
            <div style="display: flex; align-items: center; gap: 20px;">
                <a href="{{ route('free.courses') }}" style="font-size: 14px; font-weight: 700; color: #003a70; text-decoration: none;">View All</a>
                <div class="carousel-arrows" style="display: flex; gap: 12px;">
                    <button class="arrow-btn" style="width: 32px; height: 32px; border-radius: 50%; border: 1.5px solid #dbeafe; background: #eff6ff; color: #3b82f6; display: flex; align-items: center; justify-content: center; cursor: pointer; padding: 0;">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="15 18 9 12 15 6"/></svg>
                    </button>
                    <button class="arrow-btn" style="width: 32px; height: 32px; border-radius: 50%; border: 1.5px solid #dbeafe; background: #eff6ff; color: #3b82f6; display: flex; align-items: center; justify-content: center; cursor: pointer; padding: 0;">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="9 18 15 12 9 6"/></svg>
                    </button>
                </div>
            </div>
        </div>
        <div class="course-cards-row" style="display: grid; grid-template-columns: repeat(4, 1fr); gap: 24px; max-width: 1400px; margin: 0 auto;">
            @for($i = 0; $i < 4; $i++)
            <a href="{{ route('dashboard.1') }}" class="vertical-course-card" style="text-decoration:none; color:inherit;">
                <div class="card-image-wrap">
                    <img src="{{ asset('images/learning.png') }}" alt="Course">
                    <span class="badge-orange-free">Free</span>
                </div>
                <div class="vertical-card-body">
                    <h4 class="vertical-card-title">The most complete scien..</h4>
                    <p class="vertical-card-desc">Topic Description Lorem ipsum<br>dolor sit amet, consectetur adip..</p>
                    <div class="vertical-card-footer">
                        <div class="footer-stats-wrap">
                            <div class="instructor-avatar-circle"></div>
                            <div class="stat-v-item">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
                                4k
                            </div>
                            <div class="stat-v-item">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                                200
                            </div>
                            <div class="stat-v-item">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="m12 2 3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
                                4.5
                            </div>
                        </div>
                        <div class="heart-action-wrap" style="position: relative;">
                            @if($i == 2)
                            <div class="tooltip-added">Added to Wishlist!</div>
                            <svg class="heart-action-btn active" width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l8.78-8.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/></svg>
                            @else
                            <svg class="heart-action-btn" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l8.78-8.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/></svg>
                            @endif
                        </div>
                    </div>
                </div>
            </a>
            @endfor
        </div>
    </section>

    {{-- 
    <!-- ONGOING COURSES -->
    <section class="course-section" style="background: white; border-top: none;">
        <div class="course-section-header">
            <h2 class="section-heading" style="font-size: 24px; margin-bottom: 0;">Ongoing Courses</h2>
            <div class="carousel-arrows">
                <button class="arrow-btn" style="border-color: #bfdbfe; color: #3b82f6; background: #eff6ff;">‹</button>
                <button class="arrow-btn" style="border-color: #bfdbfe; color: #3b82f6; background: #eff6ff;">›</button>
            </div>
        </div>
        <div class="course-cards-row">
            @for($i = 0; $i < 6; $i++)
            <a href="{{ route('course.detail') }}" class="course-card-home-main" style="text-decoration:none; color:inherit; min-width: 300px;">
                <div class="course-card-home">
                    <div class="course-card-thumb">
                        <img src="{{ asset('images/learning.png') }}" alt="Course">
                        <span class="free-badge" style="background: #f97316;">Free</span>
                    </div>
                    <div class="course-card-body">
                        <h4>Sample Course {{ $i+1 }}</h4>
                        <p>Topic Description Lorem ipsum dolor sit amet, consectetur adip...</p>
                        <div class="course-card-footer">
                            <div class="course-card-avatar" style="background: #EDF2F7;"></div>
                            <div class="course-card-stats">
                                <span>👁 4k</span>
                                <span>⭐ 4.5</span>
                            </div>
                            <button class="heart-btn">♡</button>
                        </div>
                    </div>
                </div>
            </a>
            @endfor
        </div>
    </section>
    --}}

    <!-- POPULAR COURSES -->
    <section class="course-section" style="background: white; border-top: none;">
        <div class="course-section-header">
            <h2 class="section-heading" style="font-size: 24px; margin-bottom: 0;">Popular Courses</h2>
            <div class="carousel-arrows" style="display: flex; gap: 12px;">
                <button class="arrow-btn" style="width: 32px; height: 32px; border-radius: 50%; border: 1.5px solid #dbeafe; background: #eff6ff; color: #3b82f6; display: flex; align-items: center; justify-content: center; cursor: pointer; padding: 0;">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="15 18 9 12 15 6"/></svg>
                </button>
                <button class="arrow-btn" style="width: 32px; height: 32px; border-radius: 50%; border: 1.5px solid #dbeafe; background: #eff6ff; color: #3b82f6; display: flex; align-items: center; justify-content: center; cursor: pointer; padding: 0;">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="9 18 15 12 9 6"/></svg>
                </button>
            </div>
        </div>
        <div class="course-cards-row" style="display: grid; grid-template-columns: repeat(4, 1fr); gap: 24px; max-width: 1400px; margin: 0 auto;">
            @for($i = 0; $i < 4; $i++)
            <a href="{{ route('dashboard.1') }}" class="vertical-course-card" style="text-decoration:none; color:inherit;">
                <div class="card-image-wrap">
                    <img src="{{ asset('images/learning.png') }}" alt="Course">
                    <span class="badge-orange-free">Free</span>
                </div>
                <div class="vertical-card-body">
                    <h4 class="vertical-card-title">The most complete scien..</h4>
                    <p class="vertical-card-desc">Topic Description Lorem ipsum<br>dolor sit amet, consectetur adip..</p>
                    <div class="vertical-card-footer">
                        <div class="footer-stats-wrap">
                            <div class="instructor-avatar-circle"></div>
                            <div class="stat-v-item">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
                                4k
                            </div>
                            <div class="stat-v-item">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                                200
                            </div>
                            <div class="stat-v-item">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="m12 2 3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
                                4.5
                            </div>
                        </div>
                        <svg class="heart-action-btn" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l8.78-8.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/></svg>
                    </div>
                </div>
            </a>
            @endfor
        </div>
    </section>

    {{-- 
    <!-- COMPLETED COURSES -->
    <section class="course-section" style="background: white; border-top: none; padding-bottom: 80px;">
        <div class="course-section-header">
            <h2 class="section-heading" style="font-size: 24px; margin-bottom: 0;">Completed Courses</h2>
            <div class="carousel-arrows">
                <button class="arrow-btn" style="border-color: #bfdbfe; color: #3b82f6; background: #eff6ff;">‹</button>
                <button class="arrow-btn" style="border-color: #bfdbfe; color: #3b82f6; background: #eff6ff;">›</button>
            </div>
        </div>
        <div class="course-cards-row">
            @for($i = 0; $i < 6; $i++)
            <a href="{{ route('course.detail') }}" class="course-card-home-main" style="text-decoration:none; color:inherit; min-width: 300px;">
                <div class="course-card-home">
                    <div class="course-card-thumb">
                        <img src="{{ asset('images/learning.png') }}" alt="Course">
                        <span class="free-badge" style="background: #f97316;">Free</span>
                    </div>
                    <div class="course-card-body">
                        <h4>Sample Course {{ $i+1 }}</h4>
                        <p>Topic Description Lorem ipsum dolor sit amet, consectetur adip...</p>
                        <div class="course-card-footer">
                            <div class="course-card-avatar" style="background: #EDF2F7;"></div>
                            <div class="course-card-stats">
                                <span>👁 4k</span>
                                <span>⭐ 4.5</span>
                            </div>
                            <button class="heart-btn">♡</button>
                        </div>
                    </div>
                </div>
            </a>
            @endfor
        </div>
    </section>
    --}}

    <!-- FOOTER -->
    <footer class="home-footer">
        <div class="home-footer-inner">
            <div class="footer-brand-section">
                <div class="footer-logo-circle">
                    <img src="{{ asset('images/icons/logo.svg') }}" alt="IL2 Logo">
                </div>
                <p>Learn anytime and anywhere from IL2 career skills</p>
            </div>
            
            <div class="footer-links-column">
                <ul>
                    <li><a href="{{ route('info.page', ['topic' => 'teach']) }}">Teach on IL2</a></li>
                    <li><a href="{{ route('info.page', ['topic' => 'about']) }}">About Us</a></li>
                    <li><a href="{{ route('info.page', ['topic' => 'contact']) }}">Contact Us</a></li>
                    <li><a href="{{ route('info.page', ['topic' => 'support']) }}">Help and Support</a></li>
                </ul>
            </div>

            <div class="footer-links-column">
                <ul>
                    <li><a href="{{ route('info.page', ['topic' => 'terms']) }}">Terms</a></li>
                    <li><a href="{{ route('info.page', ['topic' => 'privacy']) }}">Privacy Policy</a></li>
                    <li><a href="{{ route('info.page', ['topic' => 'cookies']) }}">Cookies Policy</a></li>
                    <li><a href="{{ route('info.page', ['topic' => 'careers']) }}">Career</a></li>
                </ul>
            </div>

            <div class="footer-right-section">
                <select class="footer-lang-select">
                    <option>English</option>
                    <option>Thai</option>
                </select>
                
                <div class="footer-socials">
                    <a href="https://www.facebook.com/" class="social-icon facebook">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path></svg>
                    </a>
                    <a href="https://www.instagram.com/" class="social-icon instagram">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg>
                    </a>
                    <a href="https://x.com/" class="social-icon twitter">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"></path></svg>
                    </a>
                </div>

                <div class="app-btns">
                    <a href="https://play.google.com/store" class="app-btn-img">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/7/78/Google_Play_Store_badge_EN.svg" alt="Google Play">
                    </a>
                    <a href="https://www.apple.com/app-store/" class="app-btn-img">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/3/3c/Download_on_the_App_Store_Badge.svg" alt="App Store">
                    </a>
                </div>
            </div>
        </div>
    </footer>

    <script>
        // Mobile Menu Toggle
        const mobileMenuToggle = document.getElementById('mobileMenuToggle');
        const closeMobileNav = document.getElementById('closeMobileNav');
        const mobileSideNav = document.getElementById('mobileSideNav');
        const mobileNavOverlay = document.getElementById('mobileNavOverlay');

        function toggleMobileNav() {
            mobileSideNav.classList.toggle('active');
            mobileNavOverlay.classList.toggle('active');
            document.body.style.overflow = mobileSideNav.classList.contains('active') ? 'hidden' : '';
        }

        if(mobileMenuToggle) mobileMenuToggle.addEventListener('click', toggleMobileNav);
        if(closeMobileNav) closeMobileNav.addEventListener('click', toggleMobileNav);
        if(mobileNavOverlay) mobileNavOverlay.addEventListener('click', toggleMobileNav);

        // Search dropdown toggle
        const searchInput = document.getElementById('homeSearchInput');
        const searchDropdown = document.getElementById('searchDropdown');
        if(searchInput) {
            searchInput.addEventListener('focus', () => { if(searchDropdown) searchDropdown.style.display = 'block'; });
        }
        document.addEventListener('click', (e) => {
            if (searchInput && !e.target.closest('.search-bar')) {
                if(searchDropdown) searchDropdown.style.display = 'none';
            }
        });
        // Search tabs
        document.querySelectorAll('.search-tab').forEach(tab => {
            tab.addEventListener('click', () => {
                document.querySelectorAll('.search-tab').forEach(t => t.classList.remove('active'));
                tab.classList.add('active');
            });
        });
    </script>
</body>
</html>

