<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Refunds | IL² RMUTTO</title>
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
        .content { display: flex; flex-direction: column; gap: 20px; }

        .page-title {
            font-size: 18px; font-weight: 700; color: #1a202c;
        }

        /* ─── TABS ─── */
        .tabs-wrap {
            background: #fff;
            border-radius: 16px;
            padding: 6px;
            display: flex;
            gap: 6px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.04);
        }
        .tab-btn {
            flex: 1; padding: 10px 20px; border: none; border-radius: 12px;
            font-size: 14px; font-weight: 500; cursor: pointer; background: transparent;
            color: #64748b; transition: 0.2s; font-family: 'Inter', sans-serif; text-decoration: none; text-align: center;
        }
        .tab-btn.active {
            background: #fff; color: #1e293b; font-weight: 700;
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
        }

        /* ─── TABLE ─── */
        .table-card {
            background: #fff;
            border-radius: 16px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.03);
            overflow: hidden;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        thead tr {
            background: #f8fafc;
            border-bottom: 1px solid #f1f5f9;
        }

        thead th {
            padding: 14px 20px;
            font-size: 13px;
            font-weight: 600;
            color: #64748b;
            text-align: left;
        }

        tbody tr {
            border-bottom: 1px solid #f8fafc;
            transition: background 0.15s;
        }
        tbody tr:last-child { border-bottom: none; }
        tbody tr:hover { background: #fafbfc; }

        tbody td {
            padding: 16px 20px;
            font-size: 13.5px;
            color: #1e293b;
            vertical-align: middle;
        }

        .txn-id {
            font-size: 12px;
            color: #64748b;
            font-family: monospace;
            letter-spacing: 0.5px;
        }

        .invoice-cell { display: flex; align-items: center; gap: 12px; }
        .invoice-avatar {
            width: 34px; height: 34px; border-radius: 50%; background: #e2e8f0;
            flex-shrink: 0;
        }
        .invoice-name { font-size: 13.5px; font-weight: 700; color: #1e293b; line-height: 1.2; }
        .invoice-sub { font-size: 11.5px; color: #94a3b8; margin-top: 1px; }

        .stripe-link { color: #6366f1; font-weight: 500; text-decoration: none; font-size: 13.5px; }
        .stripe-link:hover { text-decoration: underline; }

        .date-cell { color: #475569; font-size: 13px; }

        .amount-cell { font-size: 14px; font-weight: 700; color: #1e293b; }

        .status-cell { display: flex; align-items: center; gap: 12px; }

        .badge {
            display: inline-flex; align-items: center; justify-content: center;
            padding: 4px 14px; border-radius: 20px; font-size: 12px; font-weight: 600;
            min-width: 68px;
        }
        .badge-paid { background: #f0fdf4; color: #16a34a; border: 1px solid #bbf7d0; }
        .badge-unpaid { background: #fef2f2; color: #dc2626; border: 1px solid #fecaca; }

        .btn-download {
            padding: 7px 16px; border-radius: 8px; font-size: 12.5px; font-weight: 600;
            cursor: pointer; border: none; font-family: 'Inter', sans-serif; transition: 0.2s;
        }
        .btn-download.active { background: #003a70; color: #fff; }
        .btn-download.active:hover { background: #002a55; }
        .btn-download.inactive { background: #e2e8f0; color: #94a3b8; cursor: not-allowed; }

        /* ─── REFUND DETAILS ─── */
        .refund-card {
            background: #fff;
            border-radius: 12px;
            border: 1px solid #e2e8f0;
            overflow: hidden;
            margin-bottom: 20px;
        }
        .refund-header {
            background: #f4f2f9; /* Light purple */
            padding: 20px 24px;
            font-size: 14.5px;
            font-weight: 700;
            color: #1e293b;
            border-bottom: 1px solid #e2e8f0;
        }
        .refund-row {
            display: flex;
            align-items: center;
            padding: 20px 24px;
            border-bottom: 1px solid #f1f5f9;
        }
        .refund-row:last-child {
            border-bottom: none;
        }
        .refund-label {
            flex: 1;
            font-size: 14px;
            color: #475569;
            font-weight: 500;
        }
        .refund-value {
            flex: 1;
            font-size: 14px;
            color: #003a70; /* Navy blue */
            font-weight: 700;
        }
        .refund-value.status-success {
            color: #10b981; /* Emerald green */
        }
        .refund-action {
            display: flex;
            justify-content: flex-end;
        }
        .btn-refund {
            background: #003a70;
            color: #fff;
            padding: 12px 36px;
            font-size: 14px;
            font-weight: 700;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: 0.2s;
            font-family: 'Inter', sans-serif;
        }
        .btn-refund:hover {
            background: #002a55;
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
            <a href="{{ route('transaction') }}" class="nav-item active">
                <img src="{{ asset('images/icons/8.png') }}" style="width: 22px; height: 22px;">
                Transaction
            </a>
            <a href="{{ route('payment.method') }}" class="nav-item">
                <img src="{{ asset('images/icons/9.png') }}" style="width: 22px; height: 22px;">
                Payment
            </a>
        </aside>

        <!-- Main Content -->
        <main class="content">
            <h2 class="page-title">Refund</h2>

            <!-- Tabs -->
            <div class="tabs-wrap">
                <a href="{{ route('transaction') }}" class="tab-btn" style="text-decoration:none; text-align:center;">Transactions</a>
                <button class="tab-btn active" onclick="switchTab(this, 'refunds')">Refunds</button>
            </div>

            <!-- Table -->
            <div class="table-card" id="transactions" style="display:none;">
                <table>
                    <thead>
                        <tr>
                            <th>Transaction ID</th>
                            <th>Invoice Name</th>
                            <th>Payment Method</th>
                            <th>Details</th>
                            <th>Amount</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><span class="txn-id">XXXXX</span></td>
                            <td>
                                <div class="invoice-cell">
                                    <div class="invoice-avatar"></div>
                                    <div>
                                        <div class="invoice-name">Teacher 1</div>
                                        <div class="invoice-sub">Course Name</div>
                                    </div>
                                </div>
                            </td>
                            <td><a href="https://stripe.com" class="stripe-link">Stripe</a></td>
                            <td><span class="date-cell">14 June 2023 | 10:00PM</span></td>
                            <td><span class="amount-cell">$9.99</span></td>
                            <td>
                                <div class="status-cell">
                                    <span class="badge badge-paid">Paid</span>
                                    <button class="btn-download active">Download</button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td><span class="txn-id">XXXXX</span></td>
                            <td>
                                <div class="invoice-cell">
                                    <div class="invoice-avatar"></div>
                                    <div>
                                        <div class="invoice-name">Teacher 2</div>
                                        <div class="invoice-sub">Course Name</div>
                                    </div>
                                </div>
                            </td>
                            <td><a href="https://stripe.com" class="stripe-link">Stripe</a></td>
                            <td><span class="date-cell">14 June 2023 | 10:00PM</span></td>
                            <td><span class="amount-cell">$10.00</span></td>
                            <td>
                                <div class="status-cell">
                                    <span class="badge badge-unpaid">Unpaid</span>
                                    <button class="btn-download inactive" disabled>Download</button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td><span class="txn-id">XXXXXX</span></td>
                            <td>
                                <div class="invoice-cell">
                                    <div class="invoice-avatar"></div>
                                    <div>
                                        <div class="invoice-name">Teacher 3</div>
                                        <div class="invoice-sub">Course Name</div>
                                    </div>
                                </div>
                            </td>
                            <td><a href="https://stripe.com" class="stripe-link">Stripe</a></td>
                            <td><span class="date-cell">14 June 2023 | 10:00PM</span></td>
                            <td><span class="amount-cell">$9.99</span></td>
                            <td>
                                <div class="status-cell">
                                    <span class="badge badge-paid">Paid</span>
                                    <button class="btn-download active">Download</button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Refunds tab content -->
            <div id="refunds" style="display:block;">
                <div class="refund-card">
                    <div class="refund-header">All Refunds</div>
                    <div class="refund-row">
                        <div class="refund-label">Transaction ID</div>
                        <div class="refund-value">txn_677cn97ybxcsNMInxashnu7</div>
                    </div>
                    <div class="refund-row">
                        <div class="refund-label">Date</div>
                        <div class="refund-value">31 April 2023 | 03:44PM</div>
                    </div>
                    <div class="refund-row">
                        <div class="refund-label">Payment Method</div>
                        <div class="refund-value">STRIPE</div>
                    </div>
                    <div class="refund-row">
                        <div class="refund-label" style="font-weight: 700; color: #1e293b;">Status</div>
                        <div class="refund-value status-success">SUCCESS</div>
                    </div>
                </div>
                
                <div class="refund-action">
                    <button class="btn-refund">Refund</button>
                </div>
            </div>
        </main>
    </div>

    <script>
        function switchTab(btn, tabId) {
            document.querySelectorAll('.tab-btn').forEach(b => b.classList.remove('active'));
            btn.classList.add('active');
            document.getElementById('transactions').style.display = tabId === 'transactions' ? 'block' : 'none';
            document.getElementById('refunds').style.display = tabId === 'refunds' ? 'block' : 'none';
        }
    </script>
</body>
</html>
