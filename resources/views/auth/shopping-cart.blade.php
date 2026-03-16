<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart | IL² RMUTTO</title>
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
        .nav-item img { width: 22px; height: 22px; opacity: 0.7; }

        /* ─── MAIN CONTENT ─── */
        .content {
            background: #fff;
            border-radius: 24px;
            padding: 30px;
            box-shadow: 0 4px 25px rgba(0,0,0,0.04);
            display: flex;
            flex-direction: column;
            gap: 24px;
        }

        .content-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .content-header h2 {
            font-size: 18px;
            font-weight: 700;
            color: #1e293b;
        }
        .btn-clear {
            background: #003a70;
            color: #fff;
            border: none;
            padding: 8px 20px;
            border-radius: 8px;
            font-size: 13px;
            font-weight: 700;
            cursor: pointer;
        }

        .cart-grid {
            display: grid;
            grid-template-columns: 1fr 340px;
            gap: 30px;
        }

        /* ─── CART ITEMS ─── */
        .cart-list { display: flex; flex-direction: column; gap: 20px; }

        .cart-item-wrap {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        /* Checkbox styling */
        .cart-checkbox {
            width: 20px;
            height: 20px;
            border-radius: 4px;
            border: 2px solid #cbd5e1;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            background: #fff;
        }
        .cart-checkbox.checked {
            background: #003a70;
            border-color: #003a70;
        }
        .cart-checkbox svg { color: #fff; display: none; }
        .cart-checkbox.checked svg { display: block; }

        .cart-item {
            flex: 1;
            border: 1px solid #e2e8f0;
            border-radius: 16px;
            padding: 24px;
            display: flex;
            gap: 20px;
            position: relative;
        }

        .item-thumb {
            width: 110px;
            height: 110px;
            background: #e2e8f0;
            border-radius: 4px;
            flex-shrink: 0;
        }

        .item-info { flex: 1; display: flex; flex-direction: column; gap: 6px; }
        .item-title { font-size: 15px; font-weight: 700; color: #1e293b; }
        .item-desc { font-size: 11px; color: #94a3b8; }
        
        .teacher-info {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-top: 4px;
        }
        .teacher-avatar {
            width: 24px;
            height: 24px;
            border-radius: 50%;
            background: #e2e8f0;
        }
        .teacher-name { font-size: 11px; color: #94a3b8; }

        .item-price {
            position: absolute;
            top: 24px;
            right: 24px;
            font-size: 15px;
            font-weight: 800;
            color: #003a70;
        }

        .item-actions {
            display: flex;
            gap: 10px;
            margin-top: 15px;
        }
        .btn-save {
            background: #003a70;
            color: #fff;
            border: none;
            padding: 7px 22px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 700;
            cursor: pointer;
        }
        .btn-delete {
            background: #e2e8f0;
            color: #64748b;
            border: none;
            padding: 7px 30px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 700;
            cursor: pointer;
        }

        /* ─── SUMMARY CARD ─── */
        .summary-card {
            border: 1px solid #e2e8f0;
            border-radius: 16px;
            overflow: hidden;
            background: #fff;
            display: flex;
            flex-direction: column;
        }
        .summary-header {
            background: #f4f2f9; /* Light purple */
            padding: 20px 24px;
            font-size: 15px;
            font-weight: 700;
            color: #1e293b;
        }
        .summary-body {
            padding: 0 24px;
        }
        .summary-row {
            display: flex;
            justify-content: space-between;
            padding: 20px 0;
            font-size: 14.5px;
            border-bottom: 1px solid #f1f5f9;
        }
        .summary-row:last-child { border-bottom: none; }
        .row-label { color: #475569; font-weight: 500; }
        .row-value { color: #003a70; font-weight: 800; }

        .summary-total {
            background: #f4f2f9;
            padding: 20px 24px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .total-label { font-size: 14.5px; font-weight: 700; color: #1e293b; }
        .total-value { font-size: 15px; font-weight: 800; color: #003a70; }

        .btn-checkout {
            background: #003a70;
            color: #fff;
            border: none;
            margin-top: 20px;
            padding: 12px;
            border-radius: 8px;
            font-size: 14px;
            font-weight: 700;
            width: 100%;
            cursor: pointer;
            transition: 0.2s;
        }
        .btn-checkout:hover { background: #002a55; }

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
            <a href="{{ route('shopping.cart') }}" class="nav-item active">
                <img src="{{ asset('images/icons/9.png') }}" style="width: 22px; height: 22px;">
                Payment
            </a>
        </aside>

        <!-- Main Content -->
        <main class="content">
            <div class="content-header">
                <h2>Shopping Cart</h2>
                <button class="btn-clear">Clear All</button>
            </div>

            <div class="cart-grid">
                <!-- Cart Items List -->
                <div class="cart-list">
                    
                    <!-- Item 1 -->
                    <div class="cart-item-wrap">
                        <div class="cart-checkbox checked">
                            <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="4"><polyline points="20 6 9 17 4 12"/></svg>
                        </div>
                        <div class="cart-item">
                            <div class="item-thumb"></div>
                            <div class="item-info">
                                <div class="item-title">Guide 2 Maths</div>
                                <div class="item-desc">In other words the smallest 2-digits number is 10</div>
                                <div class="teacher-info">
                                    <div class="teacher-avatar"></div>
                                    <span class="teacher-name">Created by Teacher 1</span>
                                </div>
                                <div class="item-actions">
                                    <button class="btn-save">Saved for later</button>
                                    <button class="btn-delete">Delete</button>
                                </div>
                            </div>
                            <div class="item-price">$5.99</div>
                        </div>
                    </div>

                    <!-- Item 2 -->
                    <div class="cart-item-wrap">
                        <div class="cart-checkbox">
                            <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="4"><polyline points="20 6 9 17 4 12"/></svg>
                        </div>
                        <div class="cart-item">
                            <div class="item-thumb"></div>
                            <div class="item-info">
                                <div class="item-title">Guide 2 Maths</div>
                                <div class="item-desc">In other words the smallest 2-digits number is 10</div>
                                <div class="teacher-info">
                                    <div class="teacher-avatar"></div>
                                    <span class="teacher-name">Created by Teacher 1</span>
                                </div>
                                <div class="item-actions">
                                    <button class="btn-save">Saved for later</button>
                                    <button class="btn-delete">Delete</button>
                                </div>
                            </div>
                            <div class="item-price">$5.99</div>
                        </div>
                    </div>

                </div>

                <!-- Summary Panel -->
                <div class="summary-panel">
                    <div class="summary-card">
                        <div class="summary-header">Payment Summary</div>
                        <div class="summary-body">
                            <div class="summary-row">
                                <span class="row-label">Subtotal</span>
                                <span class="row-value">$5.99</span>
                            </div>
                            <div class="summary-row">
                                <span class="row-label">Taxes</span>
                                <span class="row-value">$0</span>
                            </div>
                        </div>
                        <div class="summary-total">
                            <span class="total-label">Total</span>
                            <span class="total-value">$11.98</span>
                        </div>
                    </div>
                    <button class="btn-checkout" onclick="window.location.href='{{ route('payment.method') }}'">Checkout</button>
                </div>
            </div>
        </main>
    </div>

</body>
</html>
