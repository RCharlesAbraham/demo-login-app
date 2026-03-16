<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Learning</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #004b87;
            --teal: #14a098;
            --bg-body: #f1f4f8;
            --white: #ffffff;
            --text-dark: #1e293b;
            --text-muted: #64748b;
            --card-gray: #e2e8f0;
        }

        body {
            background-color: var(--bg-body);
            font-family: 'Inter', sans-serif;
            margin: 0;
            padding: 0;
            color: var(--text-dark);
        }

        /* HEADER */
        header {
            padding: 24px 30px;
            display: flex;
            justify-content: center;
        }

        .header-pill {
            background: var(--white);
            width: 100%;
            max-width: 1500px;
            height: 72px;
            border-radius: 40px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 30px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.02);
        }

        .header-left {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .logo-img { height: 35px; }

        .cat-btn {
            display: flex;
            align-items: center;
            gap: 15px;
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            padding: 10px 20px;
            border-radius: 25px;
            font-size: 13px;
            font-weight: 500;
            color: #475569;
            cursor: pointer;
        }

        .search-box {
            position: relative;
            width: 320px;
        }

        .search-box input {
            width: 100%;
            height: 44px;
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 25px;
            padding: 0 20px 0 45px;
            font-size: 14px;
            outline: none;
            color: #333;
        }

        .search-box svg {
            position: absolute;
            left: 18px;
            top: 50%;
            transform: translateY(-50%);
            color: #94a3b8;
        }

        .header-right {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .h-icon {
            color: #64748b;
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
        }

        .badge {
            position: absolute;
            top: -4px;
            right: -4px;
            background: #f97316;
            color: white;
            font-size: 10px;
            font-weight: 800;
            width: 16px;
            height: 16px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 2px solid #fff;
        }

        .user-profile {
            display: flex;
            align-items: center;
            gap: 10px;
            cursor: pointer;
        }

        .avatar {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            background: #94a3b8;
        }

        .user-profile span {
            font-size: 14px;
            font-weight: 500;
            color: #1e293b;
        }

        /* MAIN LAYOUT */
        .wrapper {
            display: flex;
            max-width: 1500px;
            margin: 0 auto;
            padding: 0 30px;
            gap: 30px;
        }

        /* SIDEBAR */
        .sidebar {
            width: 240px;
            background: var(--white);
            border-radius: 24px;
            padding: 30px 20px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.02);
        }

        .nav-item {
            display: flex;
            align-items: center;
            gap: 15px;
            padding: 14px 20px;
            border-radius: 12px;
            color: #475569;
            text-decoration: none;
            font-size: 14px;
            font-weight: 500;
            margin-bottom: 5px;
            transition: 0.2s;
        }

        .nav-item svg { width: 18px; height: 18px; opacity: 0.7; }
        .nav-item:hover, .nav-item.active {
            background: #f8fafc;
            color: #0f172a;
        }

        /* CONTENT */
        .content {
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        .page-title {
            font-size: 18px;
            font-weight: 700;
            color: #1e293b;
            margin: 0 0 15px 10px;
        }

        .main-card {
            background: var(--white);
            border-radius: 30px;
            padding: 30px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.02);
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .tabs {
            display: flex;
            background: #f1f5f9;
            padding: 5px;
            border-radius: 20px;
            width: 100%;
            margin-bottom: 40px;
        }

        .tab {
            flex: 1;
            text-align: center;
            padding: 14px;
            font-size: 13px;
            font-weight: 500;
            color: #64748b;
            border-radius: 16px;
            cursor: pointer;
        }

        .tab.active {
            background: var(--white);
            color: #1e293b;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        }

        /* GRID */
        .grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
            width: 100%;
        }

        .course-wrap {
            background: #e2e8f0;
            border-radius: 24px;
            padding: 12px;
        }

        .course-card {
            background: var(--white);
            border-radius: 20px;
            padding: 18px;
            height: 100%;
            display: flex;
            flex-direction: column;
        }

        .cc-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
        }

        .cc-date {
            font-size: 12px;
            font-weight: 600;
            color: #1e293b;
        }

        .cc-img {
            width: 100%;
            height: 120px;
            border-radius: 12px;
            background-size: cover;
            background-position: center;
            margin-bottom: 15px;
        }

        .cc-badge {
            font-size: 9px;
            font-weight: 700;
            color: #64748b;
            margin-bottom: 8px;
            text-transform: uppercase;
        }

        .cc-title {
            font-size: 16px;
            font-weight: 800;
            color: #1e293b;
            margin: 0 0 15px 0;
        }

        .progress-bar-wrap {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 20px;
        }

        .progress-bg {
            flex: 1;
            height: 6px;
            background: #e2e8f0;
            border-radius: 10px;
            overflow: hidden;
        }

        .progress-fill {
            height: 100%;
            background: var(--teal);
            border-radius: 10px;
        }

        .progress-text {
            font-size: 11px;
            font-weight: 700;
            color: #94a3b8;
        }

        .cc-desc {
            font-size: 12px;
            line-height: 1.6;
            color: #475569;
            margin: 0;
            border-top: 1px solid #f1f5f9;
            padding-top: 20px;
        }

    </style>
</head>
<body>

    <header>
        <div class="header-pill">
            <div class="header-left">
                <img src="{{ asset('images/logo.png') }}" alt="Logo" class="logo-img">
                <div class="cat-btn">
                    Categories 
                    <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="m6 9 6 6 6-6"/></svg>
                </div>
                <div class="search-box">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.3-4.3"/></svg>
                    <input type="text" placeholder="Search here">
                </div>
            </div>
            
            <div class="header-right">
                <div class="h-icon"><svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l8.78-8.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/></svg></div>
                <div class="h-icon"><svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="9" cy="21" r="1"/><circle cx="20" cy="21" r="1"/><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"/></svg></div>
                <div class="h-icon">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"/><path d="M13.73 21a2 2 0 0 1-3.46 0"/></svg>
                    <div class="badge">2</div>
                </div>
                <a href="{{ route('account.new') }}" style="text-decoration: none;">
                    <div class="user-profile">
                        <div class="avatar"></div>
                        <span>Student</span>
                        <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="m6 9 6 6 6-6"/></svg>
                    </div>
                </a>
            </div>
        </div>
    </header>

    <div class="wrapper">
        <aside class="sidebar">
            <a href="{{ route('dashboard.1') }}" class="nav-link nav-item">
                <img src="{{ asset('images/icons/1.png') }}" style="width: 22px; height: 22px;">
                Dashboard
            </a>
            <a href="{{ route('calendar') }}" class="nav-link nav-item">
                <img src="{{ asset('images/icons/2.png') }}" style="width: 22px; height: 22px;">
                Calendar
            </a>
            <a href="{{ route('learning') }}" class="nav-link nav-item active">
                <img src="{{ asset('images/icons/3.png') }}" style="width: 22px; height: 22px;">
                Learning
            </a>
            <a href="{{ route('courses') }}" class="nav-link nav-item">
                <img src="{{ asset('images/icons/4.png') }}" style="width: 22px; height: 22px;">
                Exam
            </a>
            <a href="{{ route('quiz') }}" class="nav-link nav-item">
                <img src="{{ asset('images/icons/5.png') }}" style="width: 22px; height: 22px;">
                Quiz
            </a>
            <a href="{{ route('account.new') }}" class="nav-link nav-item">
                <img src="{{ asset('images/icons/6.png') }}" style="width: 22px; height: 22px;">
                Account
            </a>
            <a href="{{ route('wallet.address') }}" class="nav-link nav-item">
                <img src="{{ asset('images/icons/7.png') }}" style="width: 22px; height: 22px;">
                Wallet Address
            </a>
            <a href="{{ route('transaction') }}" class="nav-link nav-item">
                <img src="{{ asset('images/icons/8.png') }}" style="width: 22px; height: 22px;">
                Transaction
            </a>
            <a href="{{ route('payment.method') }}" class="nav-link nav-item">
                <img src="{{ asset('images/icons/9.png') }}" style="width: 22px; height: 22px;">
                Payment
            </a>
        </aside>

        <main class="content">
            <h2 class="page-title">Learning</h2>
            
            <div class="main-card">
                <div class="tabs">
                    <div class="tab active">Ongoing courses</div>
                    <div class="tab">Completed courses</div>
                </div>

                <div class="grid">
                    @for($i = 0; $i < 4; $i++)
                    <a href="{{ route('learning.p2') }}" style="text-decoration: none; color: inherit;">
                        <div class="course-wrap">
                            <div class="course-card">
                                <div class="cc-header">
                                    <span class="cc-date">01 June 2023</span>
                                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#94a3b8" stroke-width="2"><circle cx="12" cy="12" r="1"/><circle cx="19" cy="12" r="1"/><circle cx="5" cy="12" r="1"/></svg>
                                </div>
                                <div class="cc-img" style="background-image: url('{{ asset('images/math_bg.png') }}');"></div>
                                <div class="cc-badge">(New Feature) Task</div>
                                <h3 class="cc-title">Mathematic</h3>
                                <div class="progress-bar-wrap">
                                    <div class="progress-bg"><div class="progress-fill" style="width: 90%;"></div></div>
                                    <span class="progress-text">90%</span>
                                </div>
                                <p class="cc-desc">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                            </div>
                        </div>
                    </a>
                    @endfor
                </div>
            </div>
        </main>
    </div>

</body>
</html>
