<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Method | IL² RMUTTO</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            font-family: 'Inter', sans-serif;
            background: #f1f4f6;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        /* ─── HEADER ─── */
        header {
            position: fixed; top: 0; left: 0; right: 0; z-index: 100;
            background: #fff; padding: 10px 30px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.04);
        }
        .header-pill {
            display: flex; align-items: center; justify-content: space-between;
            max-width: 1450px; margin: 0 auto;
        }
        .header-left { display: flex; align-items: center; gap: 16px; }
        .logo img { height: 38px; }
        .cat-dropdown {
            display: flex; align-items: center; gap: 8px; background: #f1f5f9;
            padding: 9px 16px; border-radius: 25px; font-size: 13.5px; font-weight: 500;
            color: #475569; border: 1px solid #e2e8f0; cursor: pointer;
        }
        .search-wrap { position: relative; width: 260px; }
        .search-wrap input {
            width: 100%; height: 40px; background: #f1f5f9; border: none; border-radius: 25px;
            padding: 0 15px 0 38px; font-size: 13.5px; outline: none;
        }
        .search-wrap svg { position: absolute; left: 13px; top: 50%; transform: translateY(-50%); color: #94a3b8; }
        .header-right { display: flex; align-items: center; gap: 14px; }
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
            display: flex; align-items: center; gap: 10px; padding: 5px 14px 5px 5px;
            border-radius: 35px; background: #f8fafc; border: 1px solid #e2e8f0;
            color: #1e293b; font-weight: 600; font-size: 13.5px; text-decoration: none;
        }
        .avatar-head { width: 32px; height: 32px; border-radius: 50%; background: #94a3b8; }

        /* ─── LAYOUT ─── */
        .shell {
            display: grid;
            grid-template-columns: 240px 1fr;
            gap: 25px;
            max-width: 1450px;
            margin: 0 auto;
            padding: 90px 30px 50px;
            flex: 1;
            width: 100%;
        }

        /* ─── SIDEBAR ─── */
        .sidebar {
            background: #fff;
            border-radius: 20px;
            padding: 20px 10px 20px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.02);
            position: sticky;
            top: 80px;
            align-self: start;
        }
        .nav-item {
            display: flex; align-items: center; gap: 14px; padding: 12px 18px;
            border-radius: 12px; text-decoration: none; color: #64748b;
            font-size: 14px; font-weight: 500; margin-bottom: 2px; transition: 0.2s;
        }
        .nav-item:hover { background: #f1f5f9; color: #0f172a; }
        .nav-item.active { background: #f1f5f9; color: #003a70; font-weight: 700; }
        .nav-item img { width: 22px; height: 22px; opacity: 0.7; }
        .nav-item.active img { opacity: 1; }

        /* ─── MAIN CONTENT ─── */
        .content { display: flex; flex-direction: column; gap: 24px; }
        .content-row { display: grid; grid-template-columns: 1fr 1fr; gap: 24px; }

        .section-title {
            font-size: 16px; font-weight: 700; color: #1e293b; margin-bottom: 8px;
        }

        /* ─── PAYMENT METHODS ─── */
        .pm-card {
            background: #fff; border-radius: 16px; padding: 30px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.03);
            display: flex; flex-direction: column; gap: 16px;
        }
        .pm-option {
            display: flex; align-items: center; gap: 16px; padding: 16px 20px;
            border: 2px solid #e2e8f0; border-radius: 14px; cursor: pointer; transition: 0.2s;
        }
        .pm-option:hover { border-color: #cbd5e1; background: #f8fafc; }
        .pm-option.active { border-color: #003a70; background: #f8fafc; }
        .pm-option img { height: 28px; width: 60px; object-fit: contain; }
        .pm-option span { font-size: 15px; font-weight: 600; color: #1e293b; }

        .btn-group { display: flex; gap: 12px; margin-top: 20px; justify-content: center; }
        .btn-back {
            padding: 12px 30px; border-radius: 8px; border: none; background: #cbd5e1;
            color: #475569; font-weight: 700; cursor: pointer; transition: 0.2s;
        }
        .btn-confirm {
            padding: 12px 30px; border-radius: 8px; border: none; background: #003a70;
            color: #fff; font-weight: 700; cursor: pointer; transition: 0.2s;
        }
        .btn-confirm:hover { background: #002a55; }

        /* ─── BASKET SUMMARY ─── */
        .bs-card {
            background: #fff; border-radius: 16px; padding: 24px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.03);
            display: flex; flex-direction: column; gap: 0;
            position: relative;
        }
        .bs-items {
            border: 1px solid #e2e8f0; border-radius: 14px; padding: 0; overflow: hidden;
        }
        .bs-item {
            display: flex; align-items: center; justify-content: space-between;
            padding: 20px; border-bottom: 1px solid #f1f5f9;
        }
        .bs-item:last-child { border-bottom: none; }
        .bs-item-left { display: flex; align-items: center; gap: 16px; }
        .bs-thumb { width: 50px; height: 50px; background: #e2e8f0; border-radius: 8px; }
        .bs-name { font-size: 14.5px; font-weight: 600; color: #1e293b; }
        .bs-price { font-size: 14.5px; font-weight: 800; color: #003a70; }

        .bs-total {
            background: #f4f2f9; padding: 20px; display: flex; align-items: center; justify-content: space-between;
            border-top: 1px solid #e2e8f0; border-bottom-left-radius: 14px; border-bottom-right-radius: 14px;
        }
        .bs-total span:first-child { font-size: 15px; font-weight: 700; color: #1e293b; }
        .bs-total span:last-child { font-size: 16px; font-weight: 800; color: #003a70; }

        .btn-metamask {
            align-self: flex-end; margin-top: 20px;
            padding: 10px 20px; border-radius: 8px; border: none; background: #003a70;
            color: #fff; font-weight: 700; font-size: 13px; cursor: pointer;
        }

        /* ─── MODAL ─── */
        .modal-overlay {
            position: fixed; inset: 0; background: rgba(0,0,0,0.5); z-index: 1000;
            display: none; align-items: center; justify-content: center;
        }
        .modal-card {
            background: #e5e7eb; border-radius: 20px; width: 440px; padding: 25px;
            box-shadow: 0 10px 40px rgba(0,0,0,0.1); position: relative;
        }
        .modal-close {
            position: absolute; right: 20px; top: 20px; cursor: pointer; color: #64748b;
        }
        .modal-title { text-align: center; font-size: 16px; font-weight: 700; color: #1e293b; }
        .modal-sub { text-align: center; font-size: 13px; color: #64748b; margin: 5px 0 20px; }
        
        .m-form { display: flex; flex-direction: column; gap: 12px; }
        .m-input-wrap { background: #fff; border-radius: 10px; display: flex; align-items: center; padding: 0 14px; height: 46px; border: 1px solid transparent; }
        .m-input-wrap:focus-within { border-color: #003a70; }
        .m-input-wrap svg { color: #94a3b8; flex-shrink: 0; }
        .m-input-wrap input { border: none; background: transparent; width: 100%; height: 100%; padding-left: 10px; outline: none; font-size: 14px; }
        
        .m-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 12px; }

        .m-btns { display: grid; grid-template-columns: 1fr 1fr; gap: 12px; margin-top: 20px; }
        .btn-m-pay {
            background: #003a70; color: #fff; border: none; border-radius: 25px; height: 44px;
            font-weight: 700; cursor: pointer;
        }
        .btn-m-cancel {
            background: #d1d5db; color: #475569; border: none; border-radius: 25px; height: 44px;
            font-weight: 700; cursor: pointer;
        }

    </style>
</head>
<body>

    <!-- ── HEADER ─────────────────────── -->
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
                    <a href="{{ route('search') }}" style="position:absolute;left:13px;top:50%;transform:translateY(-50%);color:#94a3b8;z-index:1;">
                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
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

    <!-- ── SHELL ─────────────────────── -->
    <div class="shell">

        <!-- Sidebar -->
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
            <a href="{{ route('account.new') }}" class="nav-item">
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
            <a href="{{ route('payment.method') }}" class="nav-item active">
                <img src="{{ asset('images/icons/9.png') }}" style="width: 22px; height: 22px;">
                Payment
            </a>
        </aside>

        <!-- Main Content -->
        <main class="content">
            <div class="content-row">
                <!-- Left: Payment Methods -->
                <div>
                    <h3 class="section-title">Payment Methods</h3>
                    <div class="pm-card">
                        <div class="pm-option active" onclick="selectPM(this)">
                            <img src="{{ asset('images/icons/logos_stripe.png') }}" alt="Stripe">
                            <span>Stripe</span>
                        </div>
                        <div class="pm-option" onclick="selectPM(this)">
                            <img src="{{ asset('images/icons/logos_paypal (1).png') }}" alt="Paypal">
                            <span>Paypal</span>
                        </div>

                        <div class="btn-group">
                            <button class="btn-back">Back</button>
                            <button class="btn-confirm" onclick="openModal()">Confirm Payment</button>
                        </div>
                    </div>
                </div>

                <!-- Right: Basket Summary -->
                <div>
                    <h3 class="section-title">Basket Summary</h3>
                    <div class="bs-card">
                        <div class="bs-items">
                            <div class="bs-item">
                                <div class="bs-item-left">
                                    <div class="bs-thumb"></div>
                                    <span class="bs-name">Guide 2 Maths</span>
                                </div>
                                <span class="bs-price">$5.99</span>
                            </div>
                            <div class="bs-item">
                                <div class="bs-item-left">
                                    <div class="bs-thumb"></div>
                                    <span class="bs-name">Guide 3 Maths</span>
                                </div>
                                <span class="bs-price">$5.99</span>
                            </div>
                            <div class="bs-total">
                                <span>Total</span>
                                <span>$11.98</span>
                            </div>
                        </div>

                        <button class="btn-metamask">Add Metamask</button>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <!-- ── MODAL ─────────────────────── -->
    <div class="modal-overlay" id="modalOverlay">
        <div class="modal-card">
            <div class="modal-close" onclick="closeModal()">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
            </div>
            <h4 class="modal-title">TutorX</h4>
            <p class="modal-sub">Make payment with Stripe</p>

            <div class="m-form">
                <div class="m-input-wrap">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
                    <input type="email" placeholder="Email">
                </div>
                <div class="m-input-wrap">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="1" y="4" width="22" height="16" rx="2" ry="2"/><line x1="1" y1="10" x2="23" y2="10"/></svg>
                    <input type="text" placeholder="Card Number">
                </div>
                <div class="m-grid">
                    <div class="m-input-wrap">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
                        <input type="text" placeholder="MM/YY">
                    </div>
                    <div class="m-input-wrap">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                        <input type="text" placeholder="CVC">
                    </div>
                </div>

                <div class="m-btns">
                    <button class="btn-m-pay" onclick="window.location.href='{{ route('transaction') }}'">Pay $11.98</button>
                    <button class="btn-m-cancel" onclick="closeModal()">Cancel</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        function selectPM(el) {
            document.querySelectorAll('.pm-option').forEach(opt => opt.classList.remove('active'));
            el.classList.add('active');
        }

        function openModal() {
            document.getElementById('modalOverlay').style.display = 'flex';
        }

        function closeModal() {
            document.getElementById('modalOverlay').style.display = 'none';
        }
    </script>
</body>
</html>
