<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | IL² RMUTTO</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #003a70;
            --primary-light: #004d95;
            --bg: #f3f6f9;
            --sidebar-bg: #ffffff;
            --text-dark: #1e293b;
            --text-muted: #64748b;
            --border: #e2e8f0;
            --radius-md: 12px;
            --radius-pill: 50px;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Inter', sans-serif;
        }

        body {
            background-color: var(--bg);
            color: var(--text-dark);
            overflow-x: hidden;
        }

        /* ─── HEADER ─── */
        header { 
            padding: 15px 30px; 
            display: flex; 
            justify-content: center; 
            position: absolute; 
            top: 0; left: 0; right: 0; 
            z-index: 1000; 
        }

        .header-pill {
            background: #fff; width: 100%; max-width: 1400px; height: 68px; border-radius: 40px; 
            display: flex; align-items: center; justify-content: space-between; padding: 0 25px; 
            box-shadow: 0 4px 15px rgba(0,0,0,0.03);
        }

        .header-left { display: flex; align-items: center; gap: 20px; }
        .logo img { height: 38px; }
        .cat-dropdown { 
            display: flex; align-items: center; gap: 8px; background: #f1f5f9; padding: 10px 18px; 
            border-radius: 25px; font-size: 13.5px; font-weight: 500; color: #475569; border: 1px solid #e2e8f0; cursor: pointer;
        }
        .search-wrap { position: relative; width: 280px; }
        .search-wrap input { 
            width: 100%; height: 42px; background: #f1f5f9; border: none; border-radius: 25px; 
            padding: 0 15px 0 40px; font-size: 13.5px; outline: none; 
        }
        .search-wrap svg { position: absolute; left: 15px; top: 50%; transform: translateY(-50%); color: #94a3b8; }

        .header-right { display: flex; align-items: center; gap: 15px; }
        .h-icon-btn { 
            width: 38px; height: 38px; display: flex; align-items: center; justify-content: center; 
            color: #64748b; text-decoration: none; position: relative; 
        }
        .notif-badge { 
            position: absolute; top: 4px; right: 4px; background: #f97316; color: #fff; 
            font-size: 9px; font-weight: 800; width: 15px; height: 15px; border-radius: 50%; 
            display: flex; align-items: center; justify-content: center; border: 2px solid #fff; 
        }
        .profile-pill { 
            display: flex; align-items: center; gap: 10px; padding: 5px 15px 5px 5px; 
            border-radius: 35px; background: #f8fafc; border: 1px solid #e2e8f0; color: #1e293b; 
            font-weight: 600; font-size: 13.5px; text-decoration: none; 
        }
        .avatar-head { width: 32px; height: 32px; border-radius: 50%; background: #94a3b8; }

        /* ─── MAIN LAYOUT ─── */
        .wrapper {
            display: grid;
            grid-template-columns: 240px 1fr;
            gap: 25px;
            max-width: 1450px;
            margin: 0 auto;
            padding: 90px 30px 50px;
            flex: 1;
        }

        /* ─── SIDEBAR ─── */
        .sidebar {
            background: #fff;
            border-radius: 20px;
            padding: 20px 10px 40px; 
            box-shadow: 0 4px 20px rgba(0,0,0,0.02);
            min-height: 850px;
        }

        .nav-link {
            display: flex;
            align-items: center;
            gap: 14px;
            padding: 12px 18px;
            border-radius: 12px;
            text-decoration: none;
            color: #64748b;
            font-size: 14px;
            font-weight: 400;
            margin-bottom: 2px;
            transition: 0.2s;
        }

        .nav-link:hover {
            background: #f1f5f9;
            color: #0f172a;
        }

        .nav-link.active {
            background: #f1f5f9;
            color: var(--primary);
            font-weight: 800;
        }

        .nav-link img {
            width: 22px;
            height: 22px;
            opacity: 0.7;
        }

        .nav-link.active img {
            opacity: 1;
        }

        /* ─── CONTENT AREA ─── */
        .content {
            display: flex;
            flex-direction: column;
            gap: 25px;
        }

        .flex-container {
            display: flex;
            gap: 25px;
        }

        .main-col { flex: 2; display: flex; flex-direction: column; gap: 25px; }
        .side-col { flex: 1; display: flex; flex-direction: column; gap: 25px; }

        .section-card {
            background: #FFFFFF;
            border-radius: 26px; /* Matched Rectangle 1395 */
            padding: 25px 25px 60px;
            border: 1px solid #D7D7D7; /* Matched Rectangle 1395 */
            box-shadow: 0 4px 20px rgba(0,0,0,0.02);
            position: relative;
        }

        .section-header {
            font-size: 17px;
            font-weight: 700;
            margin-bottom: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        /* ─── CHART ─── */
        .chart-box {
            position: relative;
            height: 300px;
            margin-top: 40px;
            display: flex;
            align-items: flex-end;
            justify-content: space-between;
            padding: 0 10px 0 60px;
        }

        .y-labels {
            position: absolute;
            left: 0;
            top: 0;
            bottom: 30px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            font-size: 14px;
            font-weight: 500;
            color: #718096;
        }

        .y-labels span {
            transform: translateY(50%);
        }

        .grid-line {
            position: absolute;
            left: 45px;
            right: 0;
            height: 1px;
            border-top: 1px dashed #cbd5e0;
            z-index: 1;
        }
        
        /* The chart container that holds the bars */
        .bars-wrapper {
            display: flex;
            width: 100%;
            height: 100%;
            align-items: flex-end;
            justify-content: space-between;
            position: relative;
            z-index: 2;
            padding-bottom: 30px; /* Space for x-axis labels */
        }

        .bar-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            height: 100%;
            position: relative;
            width: 40px;
        }

        .bar-actual {
            width: 40px;
            position: absolute;
            bottom: 0;
            background: linear-gradient(180deg, #149AA3 0%, #08686E 100%);
            border-radius: 20px 20px 0px 0px;
            transition: height 0.5s ease;
            z-index: 2;
        }

        .x-label {
            position: absolute;
            bottom: -30px;
            font-size: 13px;
            color: #4a5568;
            font-weight: 500;
        }

        /* ─── ENROLLED CLASSES ─── */
        .enrolled-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 0;
            border-bottom: 1px dashed #edf2f7;
            position: relative;
            padding-left: 15px;
        }

        .enrolled-item:last-child { border-bottom: none; }

        .color-bar {
            position: absolute;
            left: 0;
            top: 15px;
            bottom: 15px;
            width: 4px;
            border-radius: 2px;
        }

        .enrolled-info h4 { font-size: 14px; font-weight: 700; color: #2d3748; }
        .enrolled-info p { font-size: 12px; color: #a0aec0; margin-top: 2px; }

        .chevron svg { color: #cbd5e0; }

        /* ─── COURSES ─── */
        .course-card {
            display: flex;
            align-items: center;
            gap: 15px;
            padding: 18px;
            border-radius: 16px;
            border: 1px solid #f1f5f9;
            margin-bottom: 15px;
        }

        .course-circ {
            width: 44px;
            height: 44px;
            border-radius: 50%;
            background: #e2e8f0;
            flex-shrink: 0;
        }

        .course-body { flex: 1; }
        .course-body h4 { font-size: 14px; font-weight: 700; }
        .course-body p { font-size: 12px; color: #a0aec0; }

        .progress-row {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-top: 10px;
        }

        .prog-bg {
            flex: 1;
            height: 6px;
            background: #f1f5f9;
            border-radius: 3px;
            overflow: hidden;
        }

        .prog-fill {
            height: 100%;
            background: linear-gradient(360deg, #08686E 0%, #149AA3 100%);
            border-radius: 3px;
        }

        .prog-val { font-size: 11px; font-weight: 800; color: #4a5568; }

        /* ─── NOTES ─── */
        .notes-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            margin-top: 10px;
        }

        .note-column {
            background: #f8fafc;
            border-radius: 15px;
            padding: 15px;
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .note-col-head {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-bottom: 5px;
        }

        .note-col-head span {
            font-size: 13.5px;
            font-weight: 700;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .count-badge {
            background: #f97316;
            color: #fff;
            font-size: 10px;
            padding: 2px 6px;
            border-radius: 6px;
        }

        .note-card {
            background: #fff;
            border-radius: 12px;
            padding: 15px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.02);
            border: 1px solid #f1f5f9;
        }

        .note-tag {
            font-size: 9px;
            font-weight: 800;
            padding: 3px 8px;
            border-radius: 5px;
            display: inline-block;
            margin-bottom: 8px;
        }

        .tag-med { background: #fff7ed; color: #f97316; }
        .tag-high { background: #fef2f2; color: #ef4444; }

        .note-text { font-size: 13px; color: #475569; line-height: 1.4; }

        .plus-btn-card {
            background: #fff;
            border-radius: 10px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #cbd5e0;
            cursor: pointer;
            border: 1px dashed #e2e8f0;
        }

        .add-task-form {
            background: #fff;
            border-radius: 12px;
            padding: 12px;
            border: 1px solid #e2e8f0;
        }

        .add-task-form input {
            width: 100%;
            border: none;
            outline: none;
            font-size: 12px;
            margin-bottom: 10px;
        }

        .prio-row {
            display: flex;
            gap: 8px;
            margin-bottom: 10px;
        }

        .prio-tag {
            font-size: 9px;
            font-weight: 700;
            padding: 3px 8px;
            border-radius: 4px;
            cursor: pointer;
            border: 1px solid #e2e8f0;
        }

        .prio-tag.low { background: #f0fdf4; color: #22c55e; }
        .prio-tag.med { background: #fff7ed; color: #f97316; }
        .prio-tag.high { background: #fef2f2; color: #ef4444; }

        .form-btns {
            display: flex;
            gap: 10px;
        }

        .btn-add {
            background: #003a70;
            color: #fff;
            border: none;
            padding: 6px 12px;
            border-radius: 6px;
            font-size: 11px;
            font-weight: 700;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 4px;
        }

        .btn-cancel {
            background: #f1f5f9;
            border: none;
            padding: 6px 12px;
            border-radius: 6px;
            font-size: 11px;
            font-weight: 600;
            cursor: pointer;
        }



        @media (max-width: 1100px) {
            .wrapper { grid-template-columns: 1fr; }
            .flex-container { flex-direction: column; }
            .notes-grid { grid-template-columns: 1fr; }
            footer { display: none; }
        }
    </style>
</head>
<body>

    <header>
        <div class="header-pill">
            <div class="header-left">
                <a href="{{ route('home') }}" class="logo">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo">
                </a>
                
                <a href="{{ route('category') }}" class="cat-dropdown" style="text-decoration:none;">
                    Categories 
                    <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="m6 9 6 6 6-6"/></svg>
                </a>

                <div class="search-wrap">
                    <a href="{{ route('search') }}" style="position:absolute;left:15px;top:50%;transform:translateY(-50%);color:#94a3b8;z-index:1;">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                    </a>
                    <input type="text" placeholder="Search here" onfocus="window.location.href='{{ route('search') }}'">
                </div>
            </div>

            <div class="header-right">
                <a href="{{ route('favorites') }}" class="h-icon-btn">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l8.78-8.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/></svg>
                </a>
                <a href="{{ route('shopping.cart') }}" class="h-icon-btn">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="9" cy="21" r="1"/><circle cx="20" cy="21" r="1"/><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"/></svg>
                </a>
                <div class="h-icon-btn">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"/><path d="M13.73 21a2 2 0 0 1-3.46 0"/></svg>
                    <span class="notif-badge">2</span>
                </div>
                <a href="{{ route('account.new') }}" class="profile-pill">
                    <div class="avatar-head"></div>
                    <span>{{ $user->name ?? 'Student' }}</span>
                    <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" opacity="0.6"><path d="m6 9 6 6 6-6"/></svg>
                </a>
            </div>
        </div>
    </header>

    <div class="wrapper">
        <aside class="sidebar">
            <a href="{{ route('dashboard.1') }}" class="nav-link active">
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
            <a href="{{ route('courses') }}" class="nav-link">
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
            <a href="{{ route('payment.method') }}" class="nav-link">
                <img src="{{ asset('images/icons/9.png') }}" style="width: 22px; height: 22px;">
                Payment
            </a>
        </aside>

        <main class="content">
            <div class="flex-container">
                <div class="main-col">
                    <div class="section-card">
                        <div class="section-header">Dashboard</div>
                        <p style="font-size:13px; font-weight:700; margin-bottom:10px;">This Week</p>
                        
                        <div class="chart-box">
                            <div class="y-labels">
                                <span>5h</span><span>4h</span><span>3h</span><span>2h</span><span>1h</span><span>0</span>
                            </div>
                            <!-- Grid lines -->
                            <div class="grid-line" style="top:0%"></div>
                            <div class="grid-line" style="top:20%"></div>
                            <div class="grid-line" style="top:40%"></div>
                            <div class="grid-line" style="top:60%"></div>
                            <div class="grid-line" style="top:80%"></div>

                            <div class="bars-wrapper">
                                @php
                                    $days = ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'];
                                    $vals = [80, 25, 80, 60, 40, 55, 15]; // Adjusted to match image exactly
                                @endphp
                                @foreach($days as $i => $day)
                                <div class="bar-container">
                                    <div class="bar-actual" style="height: {{ $vals[$i] }}%;"></div>
                                    <span class="x-label">{{ $day }}</span>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div class="section-card">
                        <div class="section-header">Enrolled Classes</div>
                        <div class="enrolled-list">
                            <div class="enrolled-item">
                                <div class="color-bar" style="background:#003a70;"></div>
                                <div class="enrolled-info">
                                    <h4>Maths</h4>
                                    <p>09:00 AM - 10:00 AM</p>
                                </div>
                                <div class="chevron"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="m9 18 6-6-6-6"/></svg></div>
                            </div>
                            <div class="enrolled-item">
                                <div class="color-bar" style="background:#22c55e;"></div>
                                <div class="enrolled-info">
                                    <h4>Science</h4>
                                    <p>11:00 AM - 01:00 PM</p>
                                </div>
                                <div class="chevron"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="m9 18 6-6-6-6"/></svg></div>
                            </div>
                            <div class="enrolled-item">
                                <div class="color-bar" style="background:#8b5cf6;"></div>
                                <div class="enrolled-info">
                                    <h4>Biology</h4>
                                    <p>01:00 PM - 01:30 PM</p>
                                </div>
                                <div class="chevron"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="m9 18 6-6-6-6"/></svg></div>
                            </div>
                            <div class="enrolled-item">
                                <div class="color-bar" style="background:#f97316;"></div>
                                <div class="enrolled-info">
                                    <h4>Art</h4>
                                    <p>03:30 PM - 04:30 PM</p>
                                </div>
                                <div class="chevron"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="m9 18 6-6-6-6"/></svg></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="side-col">
                    <div class="section-card">
                        <div class="section-header">Courses</div>
                        <a href="{{ route('course.detail') }}" class="course-card" style="text-decoration:none; color:inherit;">
                            <div class="course-circ"></div>
                            <div class="course-body">
                                <h4>Maths</h4>
                                <p>12 hours</p>
                                <div class="progress-row">
                                    <div class="prog-bg"><div class="prog-fill" style="width: 50%;"></div></div>
                                    <span class="prog-val">50%</span>
                                </div>
                            </div>
                        </a>
                        <a href="{{ route('course.detail') }}" class="course-card" style="text-decoration:none; color:inherit;">
                            <div class="course-circ"></div>
                            <div class="course-body">
                                <h4>Science</h4>
                                <p>32 hours</p>
                                <div class="progress-row">
                                    <div class="prog-bg"><div class="prog-fill" style="width: 90%;"></div></div>
                                    <span class="prog-val">90%</span>
                                </div>
                            </div>
                        </a>
                        <a href="{{ route('course.detail') }}" class="course-card" style="text-decoration:none; color:inherit;">
                            <div class="course-circ"></div>
                            <div class="course-body">
                                <h4>Science</h4>
                                <p>32 hours</p>
                                <div class="progress-row">
                                    <div class="prog-bg"><div class="prog-fill" style="width: 100%;"></div></div>
                                    <span class="prog-val">100%</span>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Notes Section -->
            <div class="section-card">
                <div class="section-header">
                    Notes
                    <div style="display:flex; gap:15px; align-items:center;">
                        <div class="search-wrap" style="width:180px;">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                            <input type="text" placeholder="Search here" style="height:32px; font-size:12px;">
                        </div>
                        <button class="btn-add" style="height:32px; padding:0 15px;">+ Add List</button>
                    </div>
                </div>

                <div class="notes-grid">
                    <div class="note-column">
                        <div class="note-col-head">
                            <span>Reminder <span class="count-badge">3</span></span>
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><circle cx="12" cy="12" r="1.5"/><circle cx="18" cy="12" r="1.5"/><circle cx="6" cy="12" r="1.5"/></svg>
                        </div>
                        <div class="note-card">
                            <span class="note-tag tag-med">Medium</span>
                            <p class="note-text">(New Feature) Task</p>
                        </div>
                        <div class="plus-btn-card"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg></div>
                        
                        <!-- Inline Add Form as shown in image -->
                        <div class="add-task-form">
                            <input type="text" placeholder="Enter task">
                            <div class="prio-row">
                                <span class="prio-tag low">Low</span>
                                <span class="prio-tag med">Medium</span>
                                <span class="prio-tag high">High</span>
                            </div>
                            <div class="form-btns">
                                <button class="btn-add">+ Add Task</button>
                                <button class="btn-cancel">Cancel</button>
                            </div>
                        </div>
                    </div>

                    <div class="note-column">
                        <div class="note-col-head">
                            <span>To Do <span class="count-badge">3</span></span>
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><circle cx="12" cy="12" r="1.5"/><circle cx="18" cy="12" r="1.5"/><circle cx="6" cy="12" r="1.5"/></svg>
                        </div>
                        <div class="note-card">
                            <span class="note-tag tag-high">High</span>
                            <p class="note-text">(New Feature) Task</p>
                        </div>
                        <div class="plus-btn-card"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg></div>
                    </div>

                    <div class="note-column" style="background:transparent; border:1px dashed #e2e8f0;">
                         <div class="add-task-form" style="border:none;">
                            <input type="text" placeholder="Edit list title..." style="font-weight:600; font-size:14px;">
                            <div class="form-btns">
                                <button class="btn-add">+ Add List</button>
                                <button class="btn-cancel" style="background:#fff; border:1px solid #e2e8f0;">Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

</body>
</html>

