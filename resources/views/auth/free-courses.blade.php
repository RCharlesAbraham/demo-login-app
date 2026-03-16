<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Free Courses | IL² RMUTTO</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">
    <style>
        :root {
            --primary: #003a70;
            --orange: #f97316;
            --bg: #f3f6f9;
            --text-dark: #1e293b;
            --text-muted: #94a3b8;
            --white: #ffffff;
            --border: #e2e8f0;
        }

        * { box-sizing: border-box; margin: 0; padding: 0; font-family: 'Inter', sans-serif; }
        
        body { 
            background-color: var(--bg); 
            color: var(--text-dark); 
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            padding: 20px;
        }

        /* ─── HEADER ─── */
        header {
            width: 100%;
            max-width: 1600px;
            margin: 0 auto 30px;
        }

        .header-pill {
            background: #fff;
            padding: 12px 30px;
            border-radius: 50px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            box-shadow: 0 4px 20px rgba(0,0,0,0.03);
            border: 1px solid rgba(0,0,0,0.02);
        }

        .h-left { display: flex; align-items: center; gap: 25px; }
        .logo img { height: 40px; }

        .cat-select {
            display: flex;
            align-items: center;
            gap: 10px;
            background: #f1f5f9;
            padding: 10px 18px;
            border-radius: 40px;
            font-size: 13.5px;
            font-weight: 500;
            color: #64748b;
            border: 1.5px solid #e2e8f0;
            cursor: pointer;
        }

        .search-wrap { 
            position: relative; 
            width: 320px; 
        }
        .search-wrap input {
            width: 100%;
            height: 44px;
            background: #f1f5f9;
            border: none;
            border-radius: 40px;
            padding: 0 20px 0 45px;
            font-size: 14px;
            outline: none;
            color: #333;
        }
        .search-wrap svg {
            position: absolute;
            left: 18px;
            top: 50%;
            transform: translateY(-50%);
            color: #94a3b8;
        }

        .h-right { display: flex; align-items: center; gap: 20px; }
        .h-icons { display: flex; align-items: center; gap: 15px; }
        .icon-btn { color: #64748b; text-decoration: none; position: relative; display: flex; align-items: center; justify-content: center; width: 40px; height: 40px; }
        .badge {
            position: absolute; top: 4px; right: 4px; background: var(--orange); color: #fff;
            font-size: 10px; font-weight: 800; width: 16px; height: 16px; border-radius: 50%;
            display: flex; align-items: center; justify-content: center; border: 2px solid #fff;
        }
        .profile-btn {
            display: flex; align-items: center; gap: 12px; padding: 6px 18px 6px 6px;
            border-radius: 40px; background: #f8fafc; border: 1.5px solid #e2e8f0;
            text-decoration: none; color: inherit; font-weight: 700; font-size: 13.5px;
        }
        .avatar-head { width: 34px; height: 34px; border-radius: 50%; background: #94a3b8; }

        /* ─── MAIN SHELL ─── */
        .wrapper {
            width: 100%;
            max-width: 1600px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: 200px 1fr;
            gap: 25px;
            flex: 1;
        }

        /* ─── SIDEBAR ─── */
        .sidebar {
            background: #fff;
            padding: 25px 15px;
            border-radius: 30px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.02);
            height: fit-content;
            grid-row: 1 / span 2;
        }
        .nav-link {
            display: flex;
            align-items: center;
            gap: 15px;
            padding: 14px 18px;
            border-radius: 15px;
            text-decoration: none;
            color: #64748b;
            font-size: 14px;
            font-weight: 500;
            margin-bottom: 4px;
            transition: 0.2s;
        }
        .nav-link:hover { background: #f8fafc; color: #000; }
        .nav-link img { width: 20px; height: 20px; opacity: 0.6; }
        .nav-link.active { color: #000; font-weight: 700; }
        .nav-link.active img { opacity: 1; }

        /* ─── CONTENT AREA ─── */
        .main-content {
            background: #fff;
            border-radius: 35px;
            padding: 40px;
            box-shadow: 0 4px 25px rgba(0,0,0,0.01);
            display: flex;
            flex-direction: column;
            gap: 25px;
        }

        /* ─── COURSE CARD ─── */
        .course-card {
            border: 1px solid #e2e8f0;
            border-radius: 25px;
            padding: 30px;
            display: flex;
            align-items: center;
            gap: 30px;
            transition: 0.3s;
        }
        .course-card:hover { transform: translateY(-3px); box-shadow: 0 10px 30px rgba(0,0,0,0.03); }

        .card-thumb {
            width: 220px;
            aspect-ratio: 16/10;
            border-radius: 20px;
            overflow: hidden;
            flex-shrink: 0;
            background: #f1f5f9;
        }
        .card-thumb img { width: 100%; height: 100%; object-fit: cover; }

        .card-info { flex: 1; display: flex; flex-direction: column; gap: 8px; }
        .card-meta-top { font-size: 13px; color: #94a3b8; font-weight: 500; }
        .card-meta-top span { color: var(--orange); font-weight: 800; margin-right: 5px; }

        .card-title { font-size: 18px; font-weight: 900; color: #0f172a; }
        .card-desc { font-size: 13.5px; color: #64748b; line-height: 1.6; max-width: 550px; }

        .card-footer { display: flex; align-items: center; gap: 15px; margin-top: 10px; }
        .avatar-sm { width: 32px; height: 32px; border-radius: 50%; background: #cbd5e1; }
        .stats-row { display: flex; align-items: center; gap: 15px; }
        .stat-item { display: flex; align-items: center; gap: 5px; font-size: 12px; font-weight: 600; color: #94a3b8; }
        .stat-item svg { width: 14px; height: 14px; }
        .heart-icon { width: 18px; height: 18px; color: #1e293b; margin-left: 5px; cursor: pointer; transition: 0.2s; }
        .heart-icon:hover { color: #f43f5e; }

        /* ─── ACTION AREA ─── */
        .card-action { width: 140px; display: flex; justify-content: flex-end; align-items: center; }

        .btn-play {
            width: 58px;
            height: 58px;
            border-radius: 50%;
            background: #003a70;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 10px 20px rgba(0,58,112,0.2);
            cursor: pointer;
            transition: 0.2s;
        }
        .btn-play:hover { transform: scale(1.1); }
        .btn-play svg { fill: #fff; color: #fff; margin-left: 3px; }

        .btn-soon {
            display: flex;
            align-items: center;
            gap: 10px;
            background: #cbd5e1;
            padding: 12px 22px;
            border-radius: 30px;
            font-size: 12px;
            font-weight: 800;
            color: #475569;
            border: none;
            cursor: default;
        }
        .btn-soon svg { width: 16px; height: 16px; }

        /* ─── FOOTER ─── */
        footer {
            grid-column: 2;
            background: #fff;
            padding: 60px 40px;
            border-radius: 35px;
            border-top: 1px solid #f1f5f9;
            display: flex;
            justify-content: center;
            width: 100%;
            margin-top: 10px;
            box-sizing: border-box;
        }
        .footer-inner {
            max-width: 1400px;
            width: 100%;
            display: grid;
            grid-template-columns: 1.5fr repeat(2, 1fr) 1.2fr;
            gap: 40px;
        }
        .f-brand p { font-size: 14px; color: #64748b; line-height: 1.6; margin-top: 20px; }
        .f-logo-wrap { width: 60px; height: 60px; border-radius: 50%; background: #f8fafc; display: flex; align-items: center; justify-content: center; border: 1px solid #e2e8f0; }
        .f-logo-wrap img { height: 35px; }
        .f-col ul { list-style: none; }
        .f-col li { margin-bottom: 12px; }
        .f-col a { font-size: 14px; color: #64748b; text-decoration: none; }
        .f-right-col { display: flex; flex-direction: column; align-items: flex-end; gap: 20px; }
        .lang-select { padding: 10px 20px; border-radius: 10px; border: 1px solid #e2e8f0; font-size: 13px; color: #475569; outline: none; }
        .socials { display: flex; gap: 12px; }
        .social-link { width: 36px; height: 36px; border-radius: 50%; background: #f1f5f9; display: flex; align-items: center; justify-content: center; }
        .social-link img { width: 18px; height: 18px; }
        .apps { display: flex; gap: 10px; }
        .apps img { height: 32px; }

    </style>
</head>
<body>
    <!-- HEADER -->
    <header>
        <div class="header-pill">
            <div class="h-left">
                <a href="{{ route('dashboard.1') }}" class="logo"><img src="{{ asset('images/logo.png') }}" alt="Logo"></a>
                <div class="cat-select">
                    Categories
                    <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><path d="m6 9 6 6 6-6"/></svg>
                </div>
                <div class="search-wrap">
                    <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                    <input type="text" placeholder="Search here">
                </div>
            </div>

            <div class="h-right">
                <div class="h-icons">
                    <a href="{{ route('favorites') }}" class="icon-btn"><svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l8.78-8.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/></svg></a>
                    <a href="{{ route('shopping.cart') }}" class="icon-btn"><svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="9" cy="21" r="1"/><circle cx="20" cy="21" r="1"/><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"/></svg></a>
                    <div class="icon-btn">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"/><path d="M13.73 21a2 2 0 0 1-3.46 0"/></svg>
                        <span class="badge">2</span>
                    </div>
                </div>
                <a href="{{ route('account.new') }}" class="profile-btn">
                    <div class="avatar-head"></div>
                    <span>{{ $user->name ?? 'Student' }}</span>
                    <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" opacity="0.6"><path d="m6 9 6 6 6-6"/></svg>
                </a>
            </div>
        </div>
    </header>

    <div class="wrapper">
        <!-- SIDEBAR -->
        <aside class="sidebar">
            <a href="{{ route('dashboard.1') }}" class="nav-link">
                <img src="{{ asset('images/icons/1.png') }}"> Dashboard
            </a>
            <a href="{{ route('calendar') }}" class="nav-link">
                <img src="{{ asset('images/icons/2.png') }}"> Calendar
            </a>
            <a href="{{ route('learning') }}" class="nav-link">
                <img src="{{ asset('images/icons/3.png') }}"> Learning
            </a>
            <a href="{{ route('courses') }}" class="nav-link">
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

        <!-- MAIN CONTENT -->
        <main class="main-content">
            
            <!-- COURSE CARD 1 -->
            <div class="course-card">
                <div class="card-thumb">
                    <img src="{{ asset('images/learning.png') }}" alt="Course Thumb">
                </div>
                <div class="card-info">
                    <div class="card-meta-top"><span>29 May 2023</span> | 03:30PM</div>
                    <h3 class="card-title">The most complete science</h3>
                    <p class="card-desc">Topic Description Lorem ipsum Topic Description Lorem ipsum dolor sit amet, consectetur adip dolor sit amet, consectetur adip</p>
                    <div class="card-footer">
                        <div class="avatar-sm"></div>
                        <div class="stats-row">
                            <div class="stat-item"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z"/><circle cx="12" cy="12" r="3"/></svg> 4k</div>
                            <div class="stat-item"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg> 200</div>
                            <div class="stat-item">⭐ 4.5</div>
                            <svg class="heart-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l8.78-8.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/></svg>
                        </div>
                    </div>
                </div>
                <div class="card-action">
                    <a href="{{ route('course.detail') }}" class="btn-play">
                        <svg width="24" height="24" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                    </a>
                </div>
            </div>

            <!-- COURSE CARD 2 -->
            <div class="course-card">
                <div class="card-thumb">
                    <img src="{{ asset('images/learning.png') }}" alt="Course Thumb">
                </div>
                <div class="card-info">
                    <div class="card-meta-top"><span>01 June 2023</span> | 12:00PM-01:30PM</div>
                    <h3 class="card-title">The most complete science</h3>
                    <p class="card-desc">Topic Description Lorem ipsum Topic Description Lorem ipsum dolor sit amet, consectetur adip dolor sit amet, consectetur adip</p>
                    <div class="card-footer">
                        <div class="avatar-sm"></div>
                        <div class="stats-row">
                            <div class="stat-item"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z"/><circle cx="12" cy="12" r="3"/></svg> 4k</div>
                            <div class="stat-item"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg> 200</div>
                            <div class="stat-item">⭐ 4.5</div>
                            <svg class="heart-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l8.78-8.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/></svg>
                        </div>
                    </div>
                </div>
                <div class="card-action">
                    <div class="btn-soon">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                        Starting Soon
                    </div>
                </div>
            </div>

        </main>

        <footer>
            <div class="footer-inner">
                <div class="f-brand">
                    <div class="f-logo-wrap"><img src="{{ asset('images/icons/logo.svg') }}" alt="Logo"></div>
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
                    <select class="lang-select"><option>English</option></select>
                    <div class="socials">
                        <a href="https://www.facebook.com/" class="social-link"><img src="https://upload.wikimedia.org/wikipedia/commons/5/51/Facebook_f_logo_%282019%29.svg"></a>
                        <a href="https://www.instagram.com/" class="social-link"><img src="https://upload.wikimedia.org/wikipedia/commons/e/e7/Instagram_logo_2016.svg"></a>
                        <a href="https://x.com/" class="social-link"><img src="https://upload.wikimedia.org/wikipedia/commons/c/ce/Twitter_Logo.png"></a>
                    </div>
                    <div class="apps">
                        <a href="https://play.google.com/store"><img src="https://upload.wikimedia.org/wikipedia/commons/7/78/Google_Play_Store_badge_EN.svg"></a>
                        <a href="https://www.apple.com/app-store/"><img src="https://upload.wikimedia.org/wikipedia/commons/3/3c/Download_on_the_App_Store_Badge.svg"></a>
                    </div>
                </div>
            </div>
        </footer>
    </div>

</body>
</html>
