<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Account | IL2 RMUTTO</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-blue: #003a70;
            --bg-gray: #f1f4f9;
            --text-dark: #1f2937;
            --text-muted: #6b7280;
            --border-light: #e5e7eb;
            --white: #ffffff;
            --success-green: #10b981;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Inter', sans-serif;
        }

        body {
            background-color: var(--bg-gray);
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
            grid-row: 1 / span 2;
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
            color: var(--primary-blue);
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
        .content-header {
            margin-bottom: 24px;
        }

        .content-header h1 {
            font-size: 22px;
            font-weight: 800;
            color: #1a202c;
        }

        .account-card {
            background: var(--white);
            border-radius: 24px;
            padding: 50px 60px;
            box-shadow: 0 10px 40px rgba(0,0,0,0.02);
            min-height: 700px;
        }

        /* ─── AVATAR ─── */
        .avatar-section {
            position: relative;
            width: 100px;
            height: 100px;
            margin-bottom: 45px;
        }

        .avatar-lg {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            background: #94a3b8;
        }

        .edit-btn {
            position: absolute;
            bottom: -8px;
            left: 50%;
            transform: translateX(-50%);
            background: #003a70;
            color: #fff;
            border: none;
            border-radius: 20px;
            padding: 6px 16px;
            font-size: 12px;
            font-weight: 700;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 8px;
            white-space: nowrap;
        }

        /* ─── FORM ─── */
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

        .form-group input, 
        .form-group select {
            height: 52px;
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
            height: 44px;
            background: #003a70;
            color: #fff;
            border: none;
            border-radius: 12px;
            padding: 0 30px;
            font-size: 14px;
            font-weight: 700;
            cursor: pointer;
            width: fit-content;
            display: flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
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

        /* ─── FOOTER ─── */
        footer {
            grid-column: 2; border-radius: 26px; box-sizing: border-box;
            background: #fff; padding: 60px 30px; border-top: 1px solid #f1f5f9;
            display: flex; justify-content: space-between; gap: 40px; flex-wrap: wrap; margin-top: 10px;
        }
        .f-brand { flex: 1; min-width: 250px; }
        .f-logo-circle { width: 60px; height: 60px; border-radius: 50%; background: #f8fafc; display: flex; align-items: center; justify-content: center; margin-bottom: 20px; box-shadow: 0 4px 10px rgba(0,0,0,0.03); }
        .f-logo-circle img { height: 35px; }
        .f-brand p { color: #64748b; font-size: 14.5px; line-height: 1.6; }
        .f-col { flex: 0.6; min-width: 150px; }
        .f-col ul { list-style: none; padding: 0; margin: 0; }
        .f-col ul li { margin-bottom: 15px; }
        .f-col ul li a { text-decoration: none; color: #475569; font-size: 14.5px; transition: 0.2s; }
        .f-col ul li a:hover { color: var(--primary); }
        .f-right { flex: 1; min-width: 250px; display: flex; flex-direction: column; align-items: flex-end; gap: 20px; }
        .f-lang-select { 
            padding: 10px 15px; border-radius: 25px; border: 1px solid #e2e8f0; background: #fff; 
            color: #475569; font-size: 14px; outline: none; cursor: pointer; width: 140px;
        }
        .f-socials { display: flex; gap: 12px; }
        .f-socials a { 
            width: 38px; height: 38px; border-radius: 50%; background: #f1f5f9; 
            display: flex; align-items: center; justify-content: center; transition: 0.2s; 
        }
        .f-socials a:hover { transform: translateY(-3px); background: #e2e8f0; }
        .f-socials a img { height: 18px; width: 18px; object-fit: contain; }
        .f-apps { display: flex; gap: 10px; }
        .f-apps a img { height: 38px; }

        @media (max-width: 1024px) {
            footer {
                grid-template-columns: 1fr 1fr;
                padding: 40px 20px;
            }
            .footer-right {
                align-items: flex-start;
            }
            .wrapper {
                grid-template-columns: 1fr;
            }
            .form-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>

    @if(session('success'))
        <div class="alert">
            {{ session('success') }}
        </div>
    @endif

    <!-- Header -->
    <header>
        <div class="header-pill">
            <div class="header-left">
                <a href="{{ route('dashboard.1') }}" class="logo"><img src="{{ asset('images/logo.png') }}" alt="Logo"></a>
                
                <div class="cat-dropdown">
                    Categories 
                    <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="m6 9 6 6 6-6"/></svg>
                </div>

                <div class="search-wrap"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg><input type="text" placeholder="Search here"></div>
            </div>
            <div class="header-right">
                <a href="{{ route('favorites') }}" class="h-icon-btn"><svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l8.78-8.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/></svg></a>
                <a href="{{ route('shopping.cart') }}" class="h-icon-btn"><svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="9" cy="21" r="1"/><circle cx="20" cy="21" r="1"/><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"/></svg></a>
                <div class="h-icon-btn"><svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"/><path d="M13.73 21a2 2 0 0 1-3.46 0"/></svg><span class="notif-badge">2</span></div>
                <a href="{{ route('account.new') }}" class="profile-pill"><div class="avatar-head"></div><span>Student</span><svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" opacity="0.6"><path d="m6 9 6 6 6-6"/></svg></a>
            </div>
        </div>
    </header>

    <div class="wrapper">
        <!-- Sidebar -->
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
            <a href="{{ route('courses') }}" class="nav-link">
                <img src="{{ asset('images/icons/4.png') }}" style="width: 22px; height: 22px;">
                Exam
            </a>
            <a href="{{ route('quiz') }}" class="nav-link">
                <img src="{{ asset('images/icons/5.png') }}" style="width: 22px; height: 22px;">
                Quiz
            </a>
            <a href="{{ route('account.new') }}" class="nav-link active">
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

        <!-- Main Content -->
        <main class="content">
            <div class="content-header">
                <h1>My Account</h1>
            </div>

            <div class="account-card">
                <!-- Avatar -->
                <div class="avatar-section">
                    <div class="avatar-lg"></div>
                    <button class="edit-btn">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 1 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/></svg>
                        Edit
                    </button>
                </div>

                <!-- Form -->
                <form action="{{ route('account.update') }}" method="POST">
                    @csrf
                    <div class="form-grid">
                        <div class="form-group">
                            <label>Full Name<span>*</span></label>
                            <input type="text" name="name" value="{{ $user->name ?? 'Student' }}">
                        </div>
                        <div class="form-group">
                            <label>Username<span>*</span></label>
                            <input type="text" name="username" value="{{ $user->username ?? '@Student2' }}">
                        </div>

                        <div class="form-group">
                            <label>Current Password<span>*</span></label>
                            <input type="password" name="current_password" value="••••••••">
                        </div>
                        <div class="form-group">
                            <a href="{{ route('password.change') }}" class="btn-navy">Change</a>
                        </div>

                        <div class="form-group">
                            <label>Old Password<span>*</span></label>
                            <input type="password" name="old_password" placeholder="Enter old password">
                        </div>
                        <div class="form-group">
                            <label>New Password<span>*</span></label>
                            <input type="password" name="new_password" placeholder="Enter new password">
                        </div>

                        <div class="form-group">
                            <label>Email<span>*</span></label>
                            <input type="email" name="email" value="{{ $user->email ?? '123@gmail.com' }}">
                        </div>
                        <div class="form-group">
                            <label>Date of birth<span>*</span></label>
                            <input type="text" name="dob" value="{{ $user->dob ?? 'Teacher' }}">
                        </div>

                        <div class="form-group">
                            <label>Phone No<span>*</span></label>
                            <input type="tel" name="phone" value="{{ $user->phone ?? '000-0000 0000' }}">
                        </div>
                        <div class="form-group">
                            <label>Country<span>*</span></label>
                            <select name="country">
                                <option @if(($user->country ?? 'Malaysia') == 'Malaysia') selected @endif>Malaysia</option>
                                <option @if(($user->country ?? '') == 'Thailand') selected @endif>Thailand</option>
                                <option @if(($user->country ?? '') == 'Singapore') selected @endif>Singapore</option>
                            </select>
                        </div>
                    </div>

                    <button type="submit" class="btn-update">Update</button>
                </form>

                <form id="password-form" action="{{ route('account.password') }}" method="POST" style="display:none;">@csrf</form>
            </div>
        </main>

        <!-- Footer -->
        <footer>
            <div class="f-brand">
                <div class="f-logo-circle"><img src="{{ asset('images/icons/logo.svg') }}" alt="Logo"></div>
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
            <div class="f-right">
                <select class="f-lang-select"><option>English</option><option>Thai</option></select>
                <div class="f-socials">
                    <a href="https://www.facebook.com/"><img src="https://upload.wikimedia.org/wikipedia/commons/5/51/Facebook_f_logo_%282019%29.svg"></a>
                    <a href="https://www.instagram.com/"><img src="https://upload.wikimedia.org/wikipedia/commons/e/e7/Instagram_logo_2016.svg"></a>
                    <a href="https://x.com/"><img src="https://upload.wikimedia.org/wikipedia/commons/c/ce/Twitter_Logo.png"></a>
                </div>
                <div class="f-apps">
                    <a href="https://play.google.com/store"><img src="https://upload.wikimedia.org/wikipedia/commons/7/78/Google_Play_Store_badge_EN.svg"></a>
                    <a href="https://www.apple.com/app-store/"><img src="https://upload.wikimedia.org/wikipedia/commons/3/3c/Download_on_the_App_Store_Badge.svg"></a>
                </div>
            </div>
        </footer>
    </div>

</body>
</html>

