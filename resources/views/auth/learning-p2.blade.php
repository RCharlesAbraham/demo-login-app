<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Learning P2</title>
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

        .back-btn {
            background: var(--primary);
            color: var(--white);
            border: none;
            border-radius: 20px;
            padding: 8px 18px;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 8px;
            width: fit-content;
            margin-bottom: 25px;
        }

        .split-layout {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 30px;
        }
        
        .col-title {
            font-size: 16px;
            font-weight: 700;
            color: #1e293b;
            margin-bottom: 20px;
        }

        .panel {
            background: var(--white);
            border-radius: 30px;
            padding: 30px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.02);
            min-height: 500px;
        }

        .timeline-section {
            margin-bottom: 25px;
        }
        
        .date-header {
            font-size: 13px;
            color: #94a3b8;
            font-weight: 600;
            margin-bottom: 15px;
        }

        .event-row {
            display: flex;
            gap: 15px;
            margin-bottom: 25px;
        }

        .time-col {
            width: 50px;
            text-align: right;
            font-size: 12px;
            color: #64748b;
            font-weight: 500;
            line-height: 1.4;
            display: flex;
            flex-direction: column;
        }

        .time-now {
            color: #1e293b;
            font-weight: 800;
        }

        .line-col {
            position: relative;
            width: 2px;
        }
        
        .line-marker-blue {
            position: absolute;
            left: 0;
            top: 5px;
            bottom: -20px;
            width: 2px;
            background: var(--primary);
        }

        .line-marker-gray {
            position: absolute;
            left: 0;
            top: 5px;
            bottom: -20px;
            width: 2px;
            background: #e2e8f0;
        }

        .detail-col {
            flex: 1;
        }

        .tag-text {
            font-size: 11px;
            color: #94a3b8;
            margin-bottom: 4px;
        }

        .event-title {
            font-size: 15px;
            font-weight: 700;
            color: #1e293b;
            margin: 0 0 10px 0;
        }

        .action-btn {
            background: var(--primary);
            color: var(--white);
            border: none;
            border-radius: 20px;
            padding: 6px 16px;
            font-size: 12px;
            font-weight: 600;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }

        .thumb-col {
            width: 70px;
        }
        
        .thumb {
            width: 100%;
            height: 40px;
            border-radius: 8px;
            background-size: cover;
            background-position: center;
        }
        
        .icon-circ {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            border: 1px solid #e2e8f0;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            color: var(--primary);
            cursor: pointer;
            margin-right: 8px;
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
            <a href="{{ route('learning') }}" style="text-decoration: none;">
                <button class="back-btn">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><path d="m15 18-6-6 6-6"/></svg>
                    Back
                </button>
            </a>
            
            <div class="split-layout">
                <!-- Live Classes -->
                <div>
                    <h2 class="col-title">Live Classes</h2>
                    <div class="panel">
                        <div class="timeline-section">
                            <div class="date-header">December 20, Sunday</div>
                            
                            <div class="event-row">
                                <div class="time-col time-now">Now</div>
                                <div class="line-col"><div class="line-marker-blue"></div></div>
                                <div class="detail-col">
                                    <div class="tag-text">Morning Coffee</div>
                                    <h3 class="event-title">Breakfast with Mr. Cahyade</h3>
                                    <button class="action-btn">
                                        <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                                        Join
                                    </button>
                                </div>
                                <div class="thumb-col">
                                    <div class="thumb" style="background-image: url('{{ asset('images/math_bg.png') }}');"></div>
                                </div>
                            </div>
                            
                            <div class="event-row">
                                <div class="time-col">15:00 pm<br>to<br>18:00 pm</div>
                                <div class="line-col"><div class="line-marker-blue"></div></div>
                                <div class="detail-col">
                                    <div class="tag-text">Morning Coffee</div>
                                    <h3 class="event-title">Breakfast with Mr. Cahyade</h3>
                                    <button class="action-btn">
                                        <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                                        Starting Soon
                                    </button>
                                </div>
                                <div class="thumb-col">
                                    <div class="thumb" style="background-image: url('{{ asset('images/math_bg.png') }}');"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Recorded Classes -->
                <div>
                    <h2 class="col-title">Recorded Classes</h2>
                    <div class="panel">
                        <!-- Date Section 1 -->
                        <div class="timeline-section">
                            <div class="date-header">December 20, Sunday</div>
                            
                            <div class="event-row">
                                <div class="time-col">09:00 am<br>to<br>10:00 am</div>
                                <div class="line-col"><div class="line-marker-blue"></div></div>
                                <div class="detail-col">
                                    <div class="tag-text">Category</div>
                                    <h3 class="event-title">Course Title</h3>
                                    <div class="icon-circ"><svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><polygon points="5 3 19 12 5 21 5 3"/></svg></div>
                                    <div class="icon-circ" style="color: #94a3b8;"><svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="7 10 12 15 17 10"/><line x1="12" y1="15" x2="12" y2="3"/></svg></div>
                                </div>
                                <div class="thumb-col">
                                    <div class="thumb" style="background-image: url('{{ asset('images/math_bg.png') }}');"></div>
                                </div>
                            </div>
                        </div>

                        <!-- Date Section 2 -->
                        <div class="timeline-section">
                            <div class="date-header">December 20, Sunday</div>
                            
                            <div class="event-row">
                                <div class="time-col">09:00 am<br>to<br>10:00 am</div>
                                <div class="line-col"><div class="line-marker-blue"></div></div>
                                <div class="detail-col">
                                    <div class="tag-text">Category</div>
                                    <h3 class="event-title">Course Title</h3>
                                    <div class="icon-circ"><svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><polygon points="5 3 19 12 5 21 5 3"/></svg></div>
                                    <div class="icon-circ" style="color: #94a3b8;"><svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="7 10 12 15 17 10"/><line x1="12" y1="15" x2="12" y2="3"/></svg></div>
                                </div>
                                <div class="thumb-col">
                                    <div class="thumb" style="background-image: url('{{ asset('images/math_bg.png') }}');"></div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            
        </main>
    </div>

</body>
</html>
