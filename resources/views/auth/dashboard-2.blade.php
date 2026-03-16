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

        /* ─── HEADER (Pill Shape) ─── */
        header { padding: 15px 30px; display: flex; justify-content: center; position: sticky; top: 0; z-index: 1000; }
        .header-pill {
            background: #fff; width: 100%; max-width: 1400px; height: 68px; border-radius: 40px; 
            display: flex; align-items: center; justify-content: space-between; padding: 0 25px; 
            box-shadow: 0 4px 15px rgba(0,0,0,0.03);
        }
        .header-left { display: flex; align-items: center; gap: 20px; }
        .logo img { height: 38px; }
        .cat-dropdown { 
            display: flex; align-items: center; gap: 8px; background: #f1f5f9; padding: 10px 18px; 
            border-radius: 25px; font-size: 13.5px; font-weight: 500; color: #475569; 
            cursor: pointer; border: 1px solid #e2e8f0; 
        }
        .search-wrap { position: relative; width: 280px; }
        .search-wrap input { 
            width: 100%; height: 42px; background: #f1f5f9; border: none; border-radius: 25px; 
            padding: 0 15px 0 40px; font-size: 13.5px; outline: none; 
        }
        .search-wrap svg { position: absolute; left: 15px; top: 50%; transform: translateY(-50%); color: #94a3b8; }
        .header-right { display: flex; align-items: center; gap: 15px; }
        .h-icon-btn { width: 38px; height: 38px; display: flex; align-items: center; justify-content: center; color: #64748b; text-decoration: none; position: relative; }
        .notif-badge { position: absolute; top: 4px; right: 4px; background: #f97316; color: #fff; font-size: 9px; font-weight: 800; width: 15px; height: 15px; border-radius: 50%; display: flex; align-items: center; justify-content: center; border: 2px solid #fff; }
        .profile-pill { 
            display: flex; align-items: center; gap: 10px; padding: 5px 15px 5px 5px; border-radius: 35px; 
            background: #f8fafc; border: 1px solid #e2e8f0; color: #1e293b; font-weight: 600; font-size: 13.5px; 
            text-decoration: none; 
        }
        .avatar-head { width: 32px; height: 32px; border-radius: 50%; background: #94a3b8; }

        /* ─── MAIN LAYOUT ─── */
        .wrapper { display: grid; grid-template-columns: 240px 1fr; gap: 25px; max-width: 1450px; margin: 0 auto; padding: 10px 30px 50px; }

        /* ─── SIDEBAR ─── */
        .sidebar { background: #fff; border-radius: 20px; padding: 20px 10px; box-shadow: 0 4px 20px rgba(0,0,0,0.02); height: fit-content; }
        .nav-link { 
            display: flex; align-items: center; gap: 14px; padding: 12px 18px; border-radius: 12px; 
            text-decoration: none; color: #64748b; font-size: 14px; font-weight: 500; margin-bottom: 2px; transition: 0.2s; 
        }
        .nav-link:hover { background: #f1f5f9; color: #0f172a; }
        .nav-link.active { background: #f1f5f9; color: var(--primary); font-weight: 700; }
        .nav-link img { width: 20px; height: 20px; opacity: 0.7; }
        .nav-link.active img { opacity: 1; }

        /* ─── CONTENT AREA ─── */
        .content { display: flex; flex-direction: column; gap: 25px; }
        .flex-container { display: flex; gap: 25px; }

        .section-card { background: #fff; border-radius: 20px; padding: 25px; box-shadow: 0 4px 20px rgba(0,0,0,0.02); }
        .section-header { font-size: 17px; font-weight: 700; margin-bottom: 20px; }

        /* ─── EMPTY STATES ─── */
        .empty-row { display: flex; align-items: center; gap: 15px; padding: 20px; border-radius: 15px; border: 1px dashed #e2e8f0; position: relative; }
        .empty-icon { width: 50px; height: 50px; border-radius: 50%; background: #f1f5f9; flex-shrink: 0; }
        .empty-body { flex: 1; }
        .empty-body h4 { font-size: 14px; font-weight: 700; color: #475569; }
        .empty-body p { font-size: 12px; color: #94a3b8; }

        .btn-enrol { background: #003a70; color: #fff; border: none; padding: 8px 18px; border-radius: 8px; font-size: 12px; font-weight: 700; cursor: pointer; display: flex; align-items: center; gap: 6px; }

        /* ─── NOTES ─── */
        .notes-grid { display: grid; grid-template-columns: repeat(2, 1fr); gap: 20px; margin-top: 10px; }
        .note-column { background: #f8fafc; border-radius: 15px; padding: 15px; display: flex; flex-direction: column; gap: 12px; }
        .note-col-head { display: flex; justify-content: space-between; align-items: center; padding-bottom: 5px; font-size: 13.5px; font-weight: 700; }

        .add-task-form { background: #fff; border-radius: 12px; padding: 12px; border: 1px solid #e2e8f0; }
        .add-task-form input { width: 100%; border: none; outline: none; font-size: 12px; margin-bottom: 10px; }
        .prio-row { display: flex; gap: 8px; margin-bottom: 10px; }
        .prio-tag { font-size: 9px; font-weight: 700; padding: 3px 8px; border-radius: 4px; cursor: pointer; border: 1px solid #e2e8f0; }
        .prio-tag.low { background: #f0fdf4; color: #22c55e; }
        .prio-tag.med { background: #fff7ed; color: #f97316; }
        .prio-tag.high { background: #fef2f2; color: #ef4444; }
        .form-btns { display: flex; gap: 10px; }
        .btn-add { background: #003a70; color: #fff; border: none; padding: 6px 12px; border-radius: 6px; font-size: 11px; font-weight: 700; cursor: pointer; display: flex; align-items: center; gap: 4px; }
        .btn-cancel { background: #f1f5f9; border: none; padding: 6px 12px; border-radius: 6px; font-size: 11px; font-weight: 600; cursor: pointer; }

        /* ─── FOOTER ─── */
        footer { margin-top: 60px; background: #d8d8d8; padding: 60px 40px; border-top: 1px solid #e2e8f0; display: grid; grid-template-columns: 1.5fr 1fr 1fr 1.5fr; gap: 40px; }
        .footer-brand img { height: 60px; margin-bottom: 20px; }
        .footer-brand p { font-size: 14px; color: #64748b; line-height: 1.6; }
        .footer-col ul { list-style: none; display: flex; flex-direction: column; gap: 12px; }
        .footer-col ul li a { text-decoration: none; color: #4b5563; font-size: 14px; }
        .footer-right { display: flex; flex-direction: column; align-items: flex-end; gap: 20px; }
        .footer-lang { padding: 8px 15px; border: 1px solid #e2e8f0; border-radius: 8px; font-size: 14px; min-width: 120px; }
        .social-row { display: flex; gap: 15px; }
        .social-row img { width: 20px; height: 20px; }
        .app-row { display: flex; gap: 10px; }
        .app-row img { height: 35px; }

        @media (max-width: 1100px) { .wrapper { grid-template-columns: 1fr; } .flex-container { flex-direction: column; } .notes-grid { grid-template-columns: 1fr; } }
    </style>
</head>
<body>

    <header>
        <div class="header-pill">
            <div class="header-left">
                <a href="{{ route('home') }}" class="logo"><img src="{{ asset('images/logo.png') }}" alt="Logo"></a>
                
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
                <a href="{{ route('favorites') }}" class="h-icon-btn"><svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l8.78-8.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/></svg></a>
                <a href="{{ route('shopping.cart') }}" class="h-icon-btn"><svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="9" cy="21" r="1"/><circle cx="20" cy="21" r="1"/><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"/></svg></a>
                <div class="h-icon-btn"><svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"/><path d="M13.73 21a2 2 0 0 1-3.46 0"/></svg><span class="notif-badge">2</span></div>
                <a href="{{ route('account.new') }}" class="profile-pill"><div class="avatar-head"></div><span>{{ $user->name ?? 'Student' }}</span><svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" opacity="0.6"><path d="m6 9 6 6 6-6"/></svg></a>
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
                <!-- Enrolled Classes Empty -->
                <div style="flex: 2;">
                    <div class="section-card">
                        <div class="section-header">Enrolled Classes</div>
                        <div class="empty-row">
                            <div class="empty-icon"></div>
                            <div class="empty-body">
                                <h4>No classes enrolled yet</h4>
                                <p>Get started with us today</p>
                            </div>
                            <button class="btn-enrol" onclick="window.location.href='{{ route('courses') }}'">+ Enrol Now</button>
                        </div>
                    </div>
                </div>

                <!-- Courses Empty -->
                <div style="flex: 1;">
                    <div class="section-card">
                        <div class="section-header">Courses</div>
                        <div class="empty-row" style="flex-direction: column; align-items: flex-start; gap: 10px; border:none;">
                            <div style="display:flex; align-items:center; gap:15px;">
                                <div class="empty-icon"></div>
                                <div class="empty-body">
                                    <h4 style="font-size:13px;">Watch your progress as you enrol classes</h4>
                                </div>
                                <span style="font-size:11px; font-weight:700;">0%</span>
                            </div>
                            <div style="width:100%; height:6px; background:#f1f5f9; border-radius:3px;"></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Notes Section -->
            <div class="section-card">
                <div class="section-header" style="display:flex; justify-content:space-between;">
                    Notes
                    <button class="btn-add">+ Add List</button>
                </div>
                <div class="notes-grid">
                    <div class="note-column">
                        <div class="note-col-head">
                            <span>Notes</span>
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><circle cx="12" cy="12" r="1.5"/><circle cx="18" cy="12" r="1.5"/><circle cx="6" cy="12" r="1.5"/></svg>
                        </div>
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
                        <div style="background:#fff; border-radius:10px; height:40px; border:1px dashed #e2e8f0; display:flex; align-items:center; justify-content:center; color:#cbd5e0; font-size:20px;">+</div>
                    </div>
                    
                    <div class="note-column" style="background:transparent; border:1px dashed #e2e8f0;">
                         <div class="add-task-form" style="border:none;">
                            <input type="text" placeholder="Create list title..." style="font-weight:600; font-size:14px;">
                            <div class="form-btns">
                                <button class="btn-add">+ Add Task</button>
                                <button class="btn-cancel" style="background:#fff; border:1px solid #e2e8f0;">Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <footer>
        <div class="footer-brand">
            <img src="{{ asset('images/icons/logo.svg') }}" alt="Logo">
            <p>Learn anytime and anywhere<br>from IL2 career skills</p>
        </div>
        <div class="footer-col">
            <ul><li><a href="{{ route('info.page', ['topic' => 'teach']) }}">Teach on IL2</a></li><li><a href="{{ route('info.page', ['topic' => 'about']) }}">About Us</a></li><li><a href="{{ route('info.page', ['topic' => 'contact']) }}">Contact Us</a></li><li><a href="{{ route('info.page', ['topic' => 'support']) }}">Help and Support</a></li></ul>
        </div>
        <div class="footer-col">
            <ul><li><a href="{{ route('info.page', ['topic' => 'terms']) }}">Terms</a></li><li><a href="{{ route('info.page', ['topic' => 'privacy']) }}">Privacy Policy</a></li><li><a href="{{ route('info.page', ['topic' => 'cookies']) }}">Cookies Policy</a></li><li><a href="{{ route('info.page', ['topic' => 'careers']) }}">Career</a></li></ul>
        </div>
        <div class="footer-right">
            <select class="footer-lang"><option>English</option><option>Thai</option></select>
            <div class="social-row">
                <img src="https://upload.wikimedia.org/wikipedia/commons/b/b8/2021_Facebook_icon.svg">
                <img src="https://upload.wikimedia.org/wikipedia/commons/e/e7/Instagram_logo_2016.svg">
                <img src="https://upload.wikimedia.org/wikipedia/commons/c/ce/X_logo_2023.svg">
            </div>
            <div class="app-row">
                <img src="https://upload.wikimedia.org/wikipedia/commons/7/78/Google_Play_Store_badge_EN.svg">
                <img src="https://upload.wikimedia.org/wikipedia/commons/3/3c/Download_on_the_App_Store_Badge.svg">
            </div>
        </div>
    </footer>

</body>
</html>

