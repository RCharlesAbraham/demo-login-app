<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reviews | IL² RMUTTO</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">
    <style>
        :root {
            --primary: #003a70;
            --orange: #f97316;
            --bg-gray: #f1f4f6;
            --text-dark: #1e293b;
            --text-muted: #64748b;
            --white: #ffffff;
            --border: #e2e8f0;
            --blue-link: #2563eb;
        }

        body {
            background-color: var(--bg-gray);
            color: var(--text-dark);
            margin: 0;
            padding: 0;
            font-family: 'Inter', sans-serif;
        }

        header { 
            background: #fff; 
            height: 74px; 
            display: flex; 
            align-items: center; 
            justify-content: center; 
            position: fixed; 
            top: 0; left: 0; right: 0; 
            z-index: 1000; 
            box-shadow: 0 4px 15px rgba(0,0,0,0.03); 
            padding: 0 30px;
        }
        .header-pill { width: 100%; max-width: 1400px; display: flex; align-items: center; justify-content: space-between; }
        .header-left { display: flex; align-items: center; gap: 20px; }
        .logo img { height: 38px; }
        .search-wrap { position: relative; width: 280px; }
        .search-wrap input { width: 100%; height: 42px; background: #f1f5f9; border: none; border-radius: 25px; padding: 0 15px 0 40px; font-size: 13.5px; outline: none; }
        .search-wrap svg { position: absolute; left: 15px; top: 50%; transform: translateY(-50%); color: #94a3b8; }
        .header-right { display: flex; align-items: center; gap: 15px; }
        .h-icon-btn { width: 38px; height: 38px; display: flex; align-items: center; justify-content: center; color: #64748b; text-decoration: none; position: relative; }
        .profile-pill { display: flex; align-items: center; gap: 10px; padding: 5px 15px 5px 5px; border-radius: 35px; background: #f8fafc; border: 1px solid #e2e8f0; color: #1e293b; font-weight: 600; font-size: 13.5px; text-decoration: none; }
        .avatar-head { width: 32px; height: 32px; border-radius: 50%; background: #94a3b8; }

        .wrapper { display: grid; grid-template-columns: 240px 1fr; gap: 30px; max-width: 1450px; margin: 0 auto; padding: 100px 30px 40px; }
        .sidebar { background: #fff; border-radius: 24px; padding: 25px 15px; box-shadow: 0 4px 20px rgba(0,0,0,0.02); position: sticky; top: 100px; height: fit-content; grid-row: 1/span 2; }
        .nav-link { display: flex; align-items: center; gap: 14px; padding: 12px 18px; border-radius: 14px; text-decoration: none; color: #64748b; font-size: 14px; font-weight: 500; margin-bottom: 4px; transition: 0.2s; }
        .nav-link:hover { background: #f8fafc; color: #0f172a; }
        .nav-link.active { background: #f8fafc; color: var(--primary); font-weight: 700; }
        .nav-link img { width: 22px; height: 22px; opacity: 0.7; }

        .main-card { background: #fff; border-radius: 30px; padding: 40px; box-shadow: 0 4px 25px rgba(0,0,0,0.02); }

        .course-hero { display: grid; grid-template-columns: 1fr 1fr; gap: 50px; margin-bottom: 40px; }
        .hero-left .teacher-row { display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 25px; }
        .t-info { display: flex; align-items: center; gap: 12px; }
        .t-avatar { width: 44px; height: 44px; border-radius: 50%; background: #6b7280; }
        .t-content p { font-size: 11px; color: #94a3b8; margin: 0; }
        .t-content span { color: #2563eb; font-weight: 700; cursor: pointer; }
        .t-meta { display: flex; gap: 15px; margin-top: 4px; font-size: 11px; color: #94a3b8; }
        .hero-left-actions { display: flex; gap: 10px; }
        .btn-outline-sm { padding: 6px 20px; border: 1px solid #e2e8f0; border-radius: 20px; font-size: 11px; font-weight: 700; color: #64748b; text-decoration: none; }

        .title-price-row { display: flex; justify-content: space-between; align-items: center; margin-bottom: 15px; }
        .title-price-row h1 { font-size: 32px; font-weight: 800; margin: 0; color: #1e293b; }
        .price-text { font-size: 28px; font-weight: 800; color: #f97316; }

        .update-date { font-size: 11px; color: #94a3b8; margin-bottom: 20px; }
        .course-short-desc { font-size: 14px; color: #64748b; line-height: 1.6; margin-bottom: 25px; }
        .date-info { font-size: 12px; color: #64748b; margin-top: 15px; }
        .date-info span { color: #2563eb; font-weight: 700; margin-right: 15px; }
        .hero-btns { display: flex; gap: 12px; margin-top: 30px; }
        .btn-dark-blue { padding: 12px 30px; border-radius: 10px; font-size: 14px; font-weight: 700; color: #fff; background: #003a70; text-decoration: none; border: none; cursor: pointer; }

        .hero-right .video-preview { 
            width: 100%; 
            aspect-ratio: 1.6; 
            background: linear-gradient(180deg, #c8cdd6 0%, #6b7280 100%); 
            border-radius: 20px; 
            position: relative; 
            display: flex; 
            align-items: center; 
            justify-content: center; 
        }
        .pause-btn {
            background: #e11d1d;
            border-radius: 50px;
            width: 72px;
            height: 36px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
            cursor: pointer;
            box-shadow: 0 4px 15px rgba(225,29,29,0.4);
            transition: transform 0.2s ease;
        }
        .pause-btn:hover { transform: scale(1.08); }
        .pause-bar {
            width: 4px;
            height: 14px;
            background: #ffffff;
            border-radius: 2px;
        }

        .tab-strip { display: flex; justify-content: center; gap: 60px; border-bottom: 1px solid #f1f5f9; margin-bottom: 50px; }
        .tab-item { padding: 15px 0; font-size: 13px; font-weight: 500; color: #94a3b8; border-bottom: 3px solid transparent; cursor: pointer; transition: 0.2s; text-decoration: none; }
        .tab-item:hover { color: #1e293b; }
        .tab-item.active { color: #1e293b; border-bottom-color: var(--primary); font-weight: 600; background: #fff; border-radius: 10px 10px 0 0; box-shadow: 0 -4px 10px rgba(0,0,0,0.02); padding-left: 30px; padding-right: 30px; position: relative; bottom: -1px; }

        /* REVIEWS CONTENT */
        .reviews-container { display: grid; grid-template-columns: 350px 1fr; gap: 50px; }
        
        .rev-left h2 { font-size: 16px; font-weight: 800; color: #1e293b; margin-bottom: 20px; }
        .rating-summary { margin-bottom: 30px; }
        .rating-big { display: flex; align-items: center; gap: 8px; font-size: 24px; font-weight: 800; color: #1e293b; }
        .rating-big span { color: #f97316; }
        .rating-count { font-size: 14px; color: #94a3b8; margin-top: 5px; }
        
        .rating-bars { margin-top: 25px; }
        .rb-row { display: flex; align-items: center; gap: 15px; margin-bottom: 10px; font-size: 13px; font-weight: 700; color: #1e293b; }
        .rb-label { width: 50px; white-space: nowrap; }
        .rb-bar-wrap { flex: 1; height: 8px; background: #e2e8f0; border-radius: 10px; overflow: hidden; }
        .rb-bar-fill { height: 100%; background: #008080; border-radius: 10px; }
        .rb-percent { width: 40px; color: #1e293b; }

        .rev-right-header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px; }
        .rev-right-header p { font-size: 14px; color: #94a3b8; margin: 0; }
        
        .rev-list { display: grid; gap: 20px; }
        .rev-card { border: 1px solid #eef6ff; border-radius: 20px; padding: 30px; display: flex; gap: 25px; align-items: flex-start; }
        .rev-avatar { width: 55px; height: 55px; border-radius: 50%; background: #4477ce; flex-shrink: 0; }
        .rev-card-content { flex: 1; }
        .rev-header-row { display: flex; align-items: center; gap: 10px; margin-bottom: 12px; }
        .rev-header-row span { font-size: 11px; font-weight: 700; color: #f97316; }
        .rev-header-row p { font-size: 11px; color: #94a3b8; margin: 0; }
        .rev-body-text { font-size: 13.5px; color: #475569; line-height: 1.6; margin: 0; }
        
        .view-more-rev { display: inline-block; font-size: 13.5px; font-weight: 800; color: var(--blue-link); text-decoration: underline; margin-top: 30px; cursor: pointer; }

        footer { grid-column: 2; border-radius: 26px; background: #fff; padding: 60px 40px; border-top: 1px solid #f1f5f9; display: flex; justify-content: center; width: 100%; margin-top: 10px; box-sizing: border-box; }
        .footer-inner { max-width: 1400px; width: 100%; display: grid; grid-template-columns: 1.5fr repeat(2, 1fr) 1.2fr; gap: 60px; }
        .f-brand .f-logo-circle { width: 70px; height: 70px; border-radius: 50%; background: #fff; box-shadow: 0 4px 15px rgba(0,0,0,0.05); display: flex; align-items: center; justify-content: center; margin-bottom: 30px; }
        .f-brand .f-logo-circle img { height: 45px; }
        .f-brand p { font-size: 13px; color: #64748b; line-height: 1.6; max-width: 250px; }
        .f-col h4 { font-size: 14px; font-weight: 700; color: #1e293b; margin-bottom: 25px; }
        .f-col ul { list-style: none; padding: 0; margin: 0; }
        .f-col li { margin-bottom: 18px; }
        .f-col a { font-size: 13.5px; color: #64748b; text-decoration: none; transition: 0.2s; }
        .f-col a:hover { color: #2563eb; text-decoration: underline; }
        .f-right-col { display: flex; flex-direction: column; align-items: flex-end; gap: 30px; }
        .lang-picker { padding: 10px 20px; border: 1px solid #cbd5e1; border-radius: 20px; font-size: 13px; color: #475569; background: #fff; outline: none; min-width: 120px; }
        .social-row { display: flex; gap: 15px; }
        .s-link { width: 34px; height: 34px; border-radius: 50%; background: #fff; display: flex; align-items: center; justify-content: center; box-shadow: 0 2px 8px rgba(0,0,0,0.05); }
        .s-link img { width: 18px; height: 18px; }
        .app-badges { display: flex; gap: 12px; }
        .app-badges img { height: 36px; border-radius: 6px; }

    </style>
</head>
<body>

    <header>
        <div class="header-pill">
            <div class="header-left">
                <a href="{{ route('dashboard.1') }}" class="logo"><img src="{{ asset('images/logo.png') }}" alt="Logo"></a>
                <div class="search-wrap"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg><input type="text" placeholder="Search here"></div>
            </div>
            <div class="header-right">
                <div class="h-icon-btn"><svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l8.78-8.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/></svg></div>
                <div class="h-icon-btn"><svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="9" cy="21" r="1"/><circle cx="20" cy="21" r="1"/><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"/></svg></div>
                <a href="{{ route('account.new') }}" class="profile-pill"><div class="avatar-head"></div><span>Student</span><svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" opacity="0.6"><path d="m6 9 6 6 6-6"/></svg></a>
            </div>
        </div>
    </header>

    <div class="wrapper">
        <aside class="sidebar">
            <a href="{{ route('dashboard.1') }}" class="nav-link">
                <img src="{{ asset('images/icons/1.png') }}" style="width: 22px; height: 22px;">
                Dashboard
            </a>
            <a href="{{ route('calendar') }}" class="nav-link">
                <img src="{{ asset('images/icons/2.png') }}" style="width: 22px; height: 22px;">
                Calendar
            </a>
            <a href="{{ route('learning') }}" class="nav-link">
                <img src="{{ asset('images/icons/3.png') }}" style="width: 22px; height: 22px;">
                Learning
            </a>
            <a href="{{ route('courses') }}" class="nav-link active">
                <img src="{{ asset('images/icons/4.png') }}" style="width: 22px; height: 22px;">
                Exam
            </a>
            <a href="{{ route('quiz') }}" class="nav-link">
                <img src="{{ asset('images/icons/5.png') }}" style="width: 22px; height: 22px;">
                Quiz
            </a>
            <a href="{{ route('account.new') }}" class="nav-link">
                <img src="{{ asset('images/icons/6.png') }}" style="width: 22px; height: 22px;">
                Account
            </a>
            <a href="{{ route('wallet.address') }}" class="nav-link">
                <img src="{{ asset('images/icons/7.png') }}" style="width: 22px; height: 22px;">
                Wallet Address
            </a>
            <a href="{{ route('transaction') }}" class="nav-link">
                <img src="{{ asset('images/icons/8.png') }}" style="width: 22px; height: 22px;">
                Transaction
            </a>
            <a href="{{ route('shopping.cart') }}" class="nav-link">
                <img src="{{ asset('images/icons/9.png') }}" style="width: 22px; height: 22px;">
                Payment
            </a>
        </aside>

        <main class="main-card">
            <div class="course-hero">
                <div class="hero-left">
                    <div class="teacher-row">
                        <div class="t-info">
                            <div class="t-avatar"></div>
                            <div class="t-content">
                                <p>Created by : <span>Teacher</span></p>
                                <div class="t-meta"><span>⭐ 0 Ratings</span><span>👥 0 Students</span></div>
                            </div>
                        </div>
                        <div class="hero-left-actions">
                            <a href="{{ route('favorites') }}" class="btn-outline-sm">Save</a>
                            <a href="{{ route('recommendations') }}" class="btn-outline-sm">Share</a>
                        </div>
                    </div>
                    <div class="title-price-row">
                        <h1>Mathematic Class</h1>
                        <span class="price-text">$10.99</span>
                    </div>
                    <div class="update-date">📅 Updated date : 26 June 2023</div>
                    <p class="course-short-desc">Tutor simulates a physical learning environment with interactive learning that allows instructors and students to engage with one another.</p>
                    <div class="date-info">
                        Course start date : <span>26 June 2023</span>
                        Course end date : <span>26 June 2023</span>
                    </div>
                    <div class="hero-btns">
                        <button class="btn-dark-blue">Subscribe Now</button>
                        <button class="btn-dark-blue" style="background: #002b55;">Add to Cart</button>
                    </div>
                </div>
                <div class="hero-right">
                    <div class="video-preview">
                        <div class="pause-btn">
                            <div class="pause-bar"></div>
                            <div class="pause-bar"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="tab-strip">
                <a href="{{ route('course.detail') }}" class="tab-item">About</a>
                <a href="{{ route('courses') }}" class="tab-item">Outcomes</a>
                <a href="{{ route('modules') }}" class="tab-item">Modules</a>
                <a href="{{ route('recommendations') }}" class="tab-item">Recommendations</a>
                <a href="{{ route('testimonials') }}" class="tab-item">Testimonials</a>
                <div class="tab-item active">Reviews</div>
            </div>

            <div class="reviews-container">
                <div class="rev-left">
                    <h2>Learner reviews</h2>
                    <div class="rating-summary">
                        <div class="rating-big"><span>⭐</span> 4.0</div>
                        <div class="rating-count">1,993 reviews</div>
                    </div>

                    <div class="rating-bars">
                        <div class="rb-row">
                            <div class="rb-label">5 Stars</div>
                            <div class="rb-bar-wrap"><div class="rb-bar-fill" style="width: 100%;"></div></div>
                            <div class="rb-percent">100%</div>
                        </div>
                        <div class="rb-row">
                            <div class="rb-label">4 Stars</div>
                            <div class="rb-bar-wrap"><div class="rb-bar-fill" style="width: 0%;"></div></div>
                            <div class="rb-percent">0%</div>
                        </div>
                        <div class="rb-row">
                            <div class="rb-label">3 Stars</div>
                            <div class="rb-bar-wrap"><div class="rb-bar-fill" style="width: 0%;"></div></div>
                            <div class="rb-percent">0%</div>
                        </div>
                        <div class="rb-row">
                            <div class="rb-label">2 Stars</div>
                            <div class="rb-bar-wrap"><div class="rb-bar-fill" style="width: 0%;"></div></div>
                            <div class="rb-percent">0%</div>
                        </div>
                        <div class="rb-row">
                            <div class="rb-label">1 Star</div>
                            <div class="rb-bar-wrap"><div class="rb-bar-fill" style="width: 0%;"></div></div>
                            <div class="rb-percent">0%</div>
                        </div>
                    </div>
                </div>

                <div class="rev-right">
                    <div class="rev-right-header">
                        <p>Showing 3 of 1993</p>
                    </div>
                    <div class="rev-list">
                        @for($i=0; $i<3; $i++)
                        <div class="rev-card">
                            <div class="rev-avatar"></div>
                            <div class="rev-card-content">
                                <div class="rev-header-row">
                                    <span>⭐ 5</span>
                                    <p>Reviewed on Jul 9, 2022</p>
                                </div>
                                <p class="rev-body-text">I really enjoyed the videos, course work and practical applications. It definitely build my confidence with building, launching and managing an E-commerce store.</p>
                            </div>
                        </div>
                        @endfor
                    </div>
                    <a class="view-more-rev">View more reviews</a>
                </div>
            </div>
        </main>

        <footer>
            <div class="footer-inner">
                <div class="f-brand">
                    <div class="f-logo-circle"><img src="{{ asset('images/icons/logo.svg') }}"></div>
                    <p>Learn anytime and anywhere from IL2 career skills</p>
                </div>
                <div class="f-col">
                    
                    <ul>
                        <li><a href="{{ route('info.page', ['topic' => 'teach']) }}">Teach on IL2</a></li>
                        <li><a href="{{ route('info.page', ['topic' => 'about']) }}">About Us</a></li>
                        <li><a href="{{ route('info.page', ['topic' => 'contact']) }}">Contact Us</a></li>
                        <li><a href="{{ route('info.page', ['topic' => 'support']) }}">Help and Support</a></li>
                    </ul>
                </div>
                <div class="f-col">
                    
                    <ul>
                        <li><a href="{{ route('info.page', ['topic' => 'terms']) }}">Terms</a></li>
                        <li><a href="{{ route('info.page', ['topic' => 'privacy']) }}">Privacy Policy</a></li>
                        <li><a href="{{ route('info.page', ['topic' => 'cookies']) }}">Cookies Policy</a></li>
                        <li><a href="{{ route('info.page', ['topic' => 'careers']) }}">Career</a></li>
                    </ul>
                </div>
                <div class="f-right-col">
                    <select class="lang-picker"><option>English</option></select>
                    <div class="social-row">
                        <div class="s-link"><img src="https://upload.wikimedia.org/wikipedia/commons/5/51/Facebook_f_logo_%282019%29.svg"></div>
                        <div class="s-link"><img src="https://upload.wikimedia.org/wikipedia/commons/e/e7/Instagram_logo_2016.svg"></div>
                        <div class="s-link"><img src="https://upload.wikimedia.org/wikipedia/commons/c/ce/Twitter_Logo.png"></div>
                    </div>
                    <div class="app-badges">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/7/78/Google_Play_Store_badge_EN.svg">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/3/3c/Download_on_the_App_Store_Badge.svg">
                    </div>
                </div>
            </div>
        </footer>
    </div>
</body>
</html>
