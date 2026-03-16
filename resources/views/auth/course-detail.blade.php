<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course Detail | Mathematic Class</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">
    <style>
        :root {
            --primary: #003a70;
            --primary-dark: #002b55;
            --orange: #f97316;
            --bg: #eff3f7;
            --text-dark: #1e293b;
            --text-muted: #94a3b8;
            --white: #ffffff;
            --tab-border: #e2e8f0;
        }

        * { box-sizing: border-box; margin: 0; padding: 0; font-family: 'Inter', sans-serif; }
        body { background-color: var(--bg); color: var(--text-dark); overflow-x: hidden; }

        /* ─── HEADER ─── */
        header { 
            background: transparent; padding: 25px 30px 10px; display: flex; justify-content: center; 
            position: relative; z-index: 1000;
        }
        .header-pill {
            width: 100%; max-width: 1600px; display: flex; align-items: center; justify-content: space-between;
            background: #fff; padding: 12px 30px; border-radius: 40px; box-shadow: 0 4px 20px rgba(0,0,0,0.03);
        }
        .h-left { display: flex; align-items: center; gap: 25px; }
        .logo img { height: 42px; display: block; }
        .cat-dropdown { 
            display: flex; align-items: center; gap: 10px; background: #f1f5f9; padding: 12px 22px; 
            border-radius: 30px; font-size: 14px; font-weight: 500; color: #64748b; border: 1.5px solid #e2e8f0; cursor: pointer; text-decoration: none;
        }
        .search-wrap { position: relative; width: 320px; }
        .search-wrap input { 
            width: 100%; height: 48px; background: #f1f5f9; border: none; border-radius: 30px; 
            padding: 0 15px 0 45px; font-size: 14px; outline: none; transition: 0.2s;
        }
        .search-wrap svg { position: absolute; left: 18px; top: 16px; color: #94a3b8; }
        .search-wrap input:focus { background: #fff; box-shadow: 0 0 0 2px #e2e8f0; }

        .h-right { display: flex; align-items: center; gap: 20px; }
        .h-icon { color: #64748b; display: flex; align-items: center; justify-content: center; width: 44px; height: 44px; position: relative; text-decoration: none; }
        .notif-badge { 
            position: absolute; top: 4px; right: 4px; background: var(--orange); color: #fff; 
            font-size: 9px; font-weight: 800; width: 15px; height: 15px; border-radius: 50%; 
            display: flex; align-items: center; justify-content: center; border: 2px solid #fff; 
        }
        .profile-btn { 
            display: flex; align-items: center; gap: 12px; padding: 6px 18px 6px 6px; 
            border-radius: 40px; background: #f8fafc; border: 1.5px solid #e2e8f0; text-decoration: none; color: inherit; font-weight: 700; font-size: 14px;
        }
        .avatar-circle { width: 36px; height: 36px; border-radius: 50%; background: #94a3b8; }

        /* ─── LAYOUT ─── */
        .wrapper { display: flex; max-width: 1600px; margin: 15px auto 40px; padding: 0 30px; gap: 30px; }

        /* ─── SIDEBAR ─── */
        .sidebar { 
            width: 200px; padding: 20px 0; height: fit-content; flex-shrink: 0;
        }
        .nav-link { 
            display: flex; align-items: center; gap: 16px; padding: 12px 20px; border-radius: 12px; 
            text-decoration: none; color: #475569; font-size: 14px; font-weight: 500; margin-bottom: 5px; transition: 0.2s; 
        }
        .nav-link:hover { background: #fff; color: #000; box-shadow: 0 4px 12px rgba(0,0,0,0.03); }
        .nav-link.active { background: #fff; color: #000; font-weight: 700; box-shadow: 0 4px 12px rgba(0,0,0,0.03); }
        .nav-link img { width: 20px; height: 20px; }

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
</head>
<body>

    <!-- ── HEADER ── -->
    <header>
        <div class="header-pill">
            <div class="h-left">
                <a href="{{ route('home') }}" class="logo"><img src="{{ asset('images/logo.png') }}" alt="Logo"></a>
                <a href="{{ route('category') }}" class="cat-dropdown">
                    Categories
                    <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="m6 9 6 6 6-6"/></svg>
                </a>
                <div class="search-wrap">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                    <input type="text" placeholder="Search here">
                </div>
            </div>
            <div class="h-right">
                <a href="{{ route('favorites') }}" class="h-icon"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l8.78-8.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/></svg></a>
                <a href="{{ route('shopping.cart') }}" class="h-icon"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="9" cy="21" r="1"/><circle cx="20" cy="21" r="1"/><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"/></svg></a>
                <div class="h-icon">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"/><path d="M13.73 21a2 2 0 0 1-3.46 0"/></svg>
                    <span class="notif-badge">2</span>
                </div>
                <a href="{{ route('account.new') }}" class="profile-btn">
                    <div class="avatar-circle"></div>
                    <span>Student</span>
                    <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" opacity="0.6"><path d="m6 9 6 6 6-6"/></svg>
                </a>
            </div>
        </div>
    </header>

    <div class="wrapper">
        <!-- ── SIDEBAR ── -->
        <aside class="sidebar">
            <a href="{{ route('home') }}" class="nav-link">
                <img src="{{ asset('images/icons/1.png') }}"> Dashboard
            </a>
            <a href="{{ route('calendar') }}" class="nav-link">
                <img src="{{ asset('images/icons/2.png') }}"> Calendar
            </a>
            <a href="{{ route('learning') }}" class="nav-link">
                <img src="{{ asset('images/icons/3.png') }}"> Learning
            </a>
            <a href="{{ route('courses') }}" class="nav-link active">
                <img src="{{ asset('images/icons/4.png') }}"> Exam
            </a>
            <a href="{{ route('quiz') }}" class="nav-link">
                <img src="{{ asset('images/icons/5.png') }}"> Quiz
            </a>
            <a href="{{ route('account.new') }}" class="nav-link">
                <img src="{{ asset('images/icons/6.png') }}"> Account
            </a>
            <a href="{{ route('wallet.address') }}" class="nav-link">
                <img src="{{ asset('images/icons/7.png') }}"> Wallet Address
            </a>
            <a href="{{ route('transaction') }}" class="nav-link">
                <img src="{{ asset('images/icons/8.png') }}"> Transaction
            </a>
            <a href="{{ route('payment.method') }}" class="nav-link">
                <img src="{{ asset('images/icons/9.png') }}"> Payment
            </a>
        </aside>

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

</body>
</html>
