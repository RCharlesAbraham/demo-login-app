<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Account | IL² RMUTTO</title>
    
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">
    
    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}?v={{ time() }}">
    <style>
        body {
            background-color: #f1f4f9;
            margin: 0;
            padding: 0;
            font-family: 'Inter', sans-serif;
            color: #1e293b;
        }

        /* Standardized Header UI */
        .top-header {
            background: #f1f4f9;
            padding: 15px 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .header-inner-pill {
            max-width: 1400px;
            width: 100%;
            background: #fff;
            height: 64px;
            border-radius: 60px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 24px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.03);
        }

        .header-left {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .header-logo img {
            height: 38px;
            width: auto;
            display: block;
        }

        .category-select-pill {
            display: flex;
            align-items: center;
            gap: 12px;
            background: #f8fafc;
            padding: 10px 20px;
            border-radius: 30px;
            font-size: 14px;
            font-weight: 500;
            color: #475569;
            text-decoration: none;
            border: 1px solid #e2e8f0;
        }

        .search-bar-pill {
            display: flex;
            align-items: center;
            background: #f1f5f9;
            border-radius: 30px;
            padding: 0 20px;
            height: 44px;
            width: 320px;
            gap: 12px;
        }

        .search-bar-pill input {
            background: transparent;
            border: none;
            outline: none;
            flex: 1;
            font-size: 14px;
            color: #475569;
        }

        .header-right {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .h-icon-btn {
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #64748b;
            text-decoration: none;
            position: relative;
        }

        .h-icon-btn svg {
            width: 22px;
            height: 22px;
            stroke-width: 1.5;
        }

        .notification-badge {
            position: absolute;
            top: 5px;
            right: 5px;
            background: #f97316;
            color: #fff;
            font-size: 10px;
            min-width: 16px;
            height: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            font-weight: 700;
            border: 2px solid #fff;
        }

        .profile-dropdown {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 6px 16px 6px 6px;
            border-radius: 40px;
            background: #f8fafc;
            text-decoration: none;
            color: #1e293b;
            font-size: 14px;
            font-weight: 600;
            border: 1px solid #e2e8f0;
        }

        .profile-avatar-head {
            width: 34px;
            height: 34px;
            border-radius: 50%;
            background: #94a3b8;
        }

        /* Account Layout */
        .account-container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 20px 24px 80px;
            display: grid;
            grid-template-columns: 260px 1fr;
            gap: 30px;
        }

        .sidebar {
            background: #fff;
            border-radius: 24px;
            padding: 24px 12px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.02);
            height: fit-content;
        }

        .nav-item {
            display: flex;
            align-items: center;
            gap: 14px;
            padding: 12px 20px;
            border-radius: 14px;
            text-decoration: none;
            color: #64748b;
            font-size: 15px;
            font-weight: 500;
            margin-bottom: 4px;
            transition: all 0.2s;
        }

        .nav-item:hover {
            background: #f1f5f9;
            color: #0f172a;
        }

        .nav-item.active {
            background: #f1f5f9;
            color: #3b82f6;
            font-weight: 700;
        }

        .nav-item img {
            width: 22px;
            height: 22px;
            opacity: 0.7;
        }

        .nav-item.active img {
            opacity: 1;
        }

        /* Main Content */
        .content-header {
            margin-bottom: 24px;
        }

        .content-title {
            font-size: 20px;
            font-weight: 800;
            color: #1a202c;
        }

        .account-card {
            background: #fff;
            border-radius: 24px;
            padding: 60px;
            box-shadow: 0 10px 40px rgba(0,0,0,0.02);
            min-height: 600px;
        }

        /* Avatar Section */
        .avatar-section {
            position: relative;
            width: 120px;
            height: 120px;
            margin-bottom: 50px;
        }

        .avatar-main {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            background: #94a3b8;
        }

        .edit-btn {
            position: absolute;
            bottom: -5px;
            left: 50%;
            transform: translateX(-50%);
            background: #003a70;
            color: #fff;
            border: none;
            padding: 6px 18px;
            border-radius: 20px;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
            display: flex;
            align-items: center;
            gap: 8px;
            white-space: nowrap;
        }

        /* Form */
        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 24px 40px;
            align-items: flex-end;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .form-group label {
            font-size: 14px;
            font-weight: 700;
            color: #1a202c;
        }

        .form-group label span {
            color: #ef4444;
            margin-left: 2px;
        }

        .form-group input, .form-group select {
            height: 52px;
            background: #fff;
            border: 1.5px solid #e2e8f0;
            border-radius: 12px;
            padding: 0 18px;
            font-size: 14px;
            color: #4a5568;
            outline: none;
            transition: border-color 0.2s;
        }

        .form-group input:focus {
            border-color: #3b82f6;
        }

        .btn-navy {
            height: 52px;
            background: #003a70;
            color: #fff;
            border: none;
            border-radius: 12px;
            padding: 0 24px;
            font-size: 14px;
            font-weight: 700;
            cursor: pointer;
        }

        .btn-update {
            margin-top: 50px;
            height: 52px;
            width: 220px;
            background: #003a70;
            color: #fff;
            border: none;
            border-radius: 12px;
            font-size: 15px;
            font-weight: 700;
            cursor: pointer;
            transition: opacity 0.2s;
        }

        .btn-update:hover {
            opacity: 0.9;
        }

        /* Footer */
        .footer {
            background: #d8d8d8;
            padding: 80px 40px;
            border-top: 1px solid #f1f5f9;
        }

        .footer-inner {
            max-width: 1400px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
        }

        .footer-logo-section {
            flex: 1;
        }

        .logo-circle {
            width: 100px;
            height: 100px;
            background: #fff;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 15px rgba(0,0,0,0.05);
            margin-bottom: 24px;
        }

        .logo-circle img {
            width: 70px;
        }

        .footer-tagline {
            font-size: 14px;
            color: #64748b;
            line-height: 1.6;
        }

        .footer-links-container {
            flex: 2;
            display: flex;
            justify-content: center;
            gap: 100px;
        }

        .footer-col {
            display: flex;
            flex-direction: column;
            gap: 16px;
        }

        .footer-col a {
            font-size: 14px;
            color: #475569;
            text-decoration: none;
        }

        .footer-right {
            flex: 1;
            display: flex;
            flex-direction: column;
            align-items: flex-end;
            gap: 24px;
        }

        .footer-lang {
            padding: 10px 24px;
            border-radius: 10px;
            border: 1px solid #e2e8f0;
            font-size: 14px;
            color: #64748b;
            min-width: 140px;
            appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 24 24' fill='none' stroke='%2364748b' stroke-width='3'%3E%3Cpath d='m6 9 6 6 6-6'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 15px center;
        }

        .social-icons {
            display: flex;
            gap: 16px;
        }

        .social-icons a img {
            width: 24px;
            height: 24px;
        }

        .app-badges {
            display: flex;
            gap: 12px;
            margin-top: 10px;
        }

        .app-badges img {
            height: 38px;
        }

        @media (max-width: 1024px) {
            .account-container { grid-template-columns: 1fr; }
            .footer-inner { flex-direction: column; gap: 40px; }
            .footer-links-container { justify-content: flex-start; gap: 40px; }
            .footer-right { align-items: flex-start; }
            .form-grid { grid-template-columns: 1fr; }
        }
    </style>
</head>
<body>

<header class="top-header">
    <div class="header-inner-pill">
        <div class="header-left">
            <a href="{{ route('home') }}" class="header-logo">
                <img src="{{ asset('images/logo.png') }}" alt="Logo">
            </a>
            <a href="{{ route('category') }}" class="category-select-pill">
                Categories
                <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="#3b82f6" stroke-width="3"><path d="m6 9 6 6 6-6"/></svg>
            </a>
            <div class="search-bar-pill">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#94a3b8" stroke-width="2"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                <input type="text" placeholder="Search here">
            </div>
        </div>

        <div class="header-right">
            <a href="{{ route('favorites') }}" class="h-icon-btn"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l8.78-8.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/></svg></a>
            <a href="{{ route('shopping.cart') }}" class="h-icon-btn"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="9" cy="21" r="1"/><circle cx="20" cy="21" r="1"/><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"/></svg></a>
            <div class="h-icon-btn">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"/><path d="M13.73 21a2 2 0 0 1-3.46 0"/></svg>
                <span class="notification-badge">2</span>
            </div>
            <a href="{{ route('account') }}" class="profile-dropdown">
                <div class="profile-avatar-head"></div>
                <span>Student</span>
                <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" opacity="0.6"><path d="m6 9 6 6 6-6"/></svg>
            </a>
        </div>
    </div>
</header>

<div class="account-container">
    <aside class="sidebar">
        <a href="{{ route('dashboard.1') }}" class="nav-item">
            <img src="{{ asset('images/icons/1.png') }}" style="width: 22px; height: 22px;">
            Dashboard
        </a>
        <a href="{{ route('calendar') }}" class="nav-item">
            <img src="{{ asset('images/icons/2.png') }}" style="width: 22px; height: 22px;">
            Calendar
        </a>
        <a href="{{ route('learning') }}" class="nav-item">
            <img src="{{ asset('images/icons/3.png') }}" style="width: 22px; height: 22px;">
            Learning
        </a>
        <a href="{{ route('courses') }}" class="nav-item">
            <img src="{{ asset('images/icons/4.png') }}" style="width: 22px; height: 22px;">
            Exam
        </a>
        <a href="{{ route('quiz') }}" class="nav-item">
            <img src="{{ asset('images/icons/5.png') }}" style="width: 22px; height: 22px;">
            Quiz
        </a>
        <a href="{{ route('account.new') }}" class="nav-item active">
            <img src="{{ asset('images/icons/6.png') }}" style="width: 22px; height: 22px;">
            Account
        </a>
        <a href="{{ route('wallet.address') }}" class="nav-item">
            <img src="{{ asset('images/icons/7.png') }}" style="width: 22px; height: 22px;">
            Wallet Address
        </a>
        <a href="{{ route('transaction') }}" class="nav-item">
            <img src="{{ asset('images/icons/8.png') }}" style="width: 22px; height: 22px;">
            Transaction
        </a>
        <a href="{{ route('payment.method') }}" class="nav-item">
            <img src="{{ asset('images/icons/9.png') }}" style="width: 22px; height: 22px;">
            Payment
        </a>
    </aside>

    <main class="account-content">
        <div class="content-header">
            <h1 class="content-title">My Account</h1>
        </div>

        <div class="account-card">
            <div class="avatar-section">
                <div class="avatar-main"></div>
                <button class="edit-btn">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 1 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/></svg>
                    Edit
                </button>
            </div>

            <form action="#">
                <div class="form-grid">
                    <div class="form-group">
                        <label>Full Name<span>*</span></label>
                        <input type="text" value="Student">
                    </div>
                    <div class="form-group">
                        <label>Username<span>*</span></label>
                        <input type="text" value="@Student2">
                    </div>

                    <div class="form-group">
                        <label>Current Password<span>*</span></label>
                        <input type="password" value="••••••••">
                    </div>
                    <div class="form-group" style="padding-bottom: 2px;">
                        <a href="{{ route('password.change') }}" class="btn-navy" style="display: flex; align-items: center; justify-content: center; text-decoration: none;">Change</a>
                    </div>

                    <div class="form-group">
                        <label>Old Password<span>*</span></label>
                        <input type="password" placeholder="Enter old password">
                    </div>
                    <div class="form-group">
                        <label>New Password<span>*</span></label>
                        <input type="password" placeholder="Enter new password">
                    </div>

                    <div class="form-group">
                        <label>Email<span>*</span></label>
                        <input type="email" value="123@gmail.com">
                    </div>
                    <div class="form-group">
                        <label>Date of birth<span>*</span></label>
                        <input type="text" value="Teacher">
                    </div>

                    <div class="form-group">
                        <label>Phone No<span>*</span></label>
                        <input type="tel" value="000-0000 0000">
                    </div>
                    <div class="form-group">
                        <label>Country<span>*</span></label>
                        <select>
                            <option>Malaysia</option>
                            <option>Thailand</option>
                            <option>Singapore</option>
                        </select>
                    </div>
                </div>

                <div style="display: flex;">
                    <button type="submit" class="btn-update">Update</button>
                </div>
            </form>
        </div>
    </main>
</div>

<footer class="footer">
    <div class="footer-inner">
        <div class="footer-logo-section">
            <div class="logo-circle">
                <img src="{{ asset('images/icons/logo.svg') }}" alt="Logo">
            </div>
            <p class="footer-tagline">Learn anytime and anywhere<br>from IL2 career skills</p>
        </div>

        <div class="footer-links-container">
            <div class="footer-col">
                <a href="{{ route('info.page', ['topic' => 'teach']) }}">Teach on IL2</a>
                <a href="{{ route('info.page', ['topic' => 'about']) }}">About Us</a>
                <a href="{{ route('info.page', ['topic' => 'contact']) }}">Contact Us</a>
                <a href="{{ route('info.page', ['topic' => 'support']) }}">Help and Support</a>
            </div>
            <div class="footer-col">
                <a href="{{ route('info.page', ['topic' => 'terms']) }}">Terms</a>
                <a href="{{ route('info.page', ['topic' => 'privacy']) }}">Privacy Policy</a>
                <a href="{{ route('info.page', ['topic' => 'cookies']) }}">Cookies Policy</a>
                <a href="{{ route('info.page', ['topic' => 'careers']) }}">Career</a>
            </div>
        </div>

        <div class="footer-right">
            <select class="footer-lang">
                <option>English</option>
                <option>Thai</option>
            </select>
            
            <div class="social-icons">
                <a href="https://www.facebook.com/"><img src="https://upload.wikimedia.org/wikipedia/commons/b/b8/2021_Facebook_icon.svg" alt="Facebook"></a>
                <a href="https://www.instagram.com/"><img src="https://upload.wikimedia.org/wikipedia/commons/e/e7/Instagram_logo_2016.svg" alt="Instagram"></a>
                <a href="https://x.com/"><img src="https://upload.wikimedia.org/wikipedia/commons/6/6f/Logo_of_Twitter.svg" alt="Twitter"></a>
            </div>

            <div class="app-badges">
                <img src="https://upload.wikimedia.org/wikipedia/commons/7/78/Google_Play_Store_badge_EN.svg" alt="Google Play">
                <img src="https://upload.wikimedia.org/wikipedia/commons/3/3c/Download_on_the_App_Store_Badge.svg" alt="App Store">
            </div>
        </div>
    </div>
</footer>

</body>
</html>

