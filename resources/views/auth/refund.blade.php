@extends('layouts.dashboard')

@section('title', 'Refunds | IL² RMUTTO')

@push('styles')
 <style>


        

        
        
        
        
        
        
        
        
        
        
        
        
        
        

        
        

        
        
        
        
        
        
        

        /* ─── MAIN CONTENT ─── */
        .content { display: flex; flex-direction: column; gap: 20px; }

        .page-title { font-size: 22px; font-weight: 800; color: #1e293b; margin-bottom: 10px; }

        /* ─── TABS ─── */
        .tabs-wrap { background: #fff; border-radius: 16px; padding: 6px; display: flex; gap: 6px; box-shadow: 0 2px 8px rgba(0,0,0,0.04); }
        .tab-btn { flex: 1; padding: 12px 20px; border: none; border-radius: 12px; font-size: 14px; font-weight: 500; cursor: pointer; background: transparent; color: #64748b; transition: 0.2s; font-family: 'Inter', sans-serif; display: flex; align-items: center; justify-content: center; text-decoration: none; }
        .tab-btn.active { background: #f8fafc; color: #1e293b; font-weight: 800; box-shadow: inset 0 0 0 1px #e2e8f0; }

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
            padding: 20px;
        }
        .refund-
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
<style>
    .dashboard-inner {
        display: grid;
        grid-template-columns: 240px 1fr;
        gap: 25px;
        max-width: 1450px;
        width: calc(100% - 60px);
        margin: 0 auto;
        padding: 20px 0 50px;
    }
    .content-area-dashboard {
        padding: 0;
    }
    @media (max-width: 1100px) {
        .dashboard-inner {
            grid-template-columns: 1fr;
        }
    }
</style>
@endpush

@section('dashboard-content')
<!-- ── HEADER ─────────────────────── -->
    

    <!-- ── SHELL ─────────────────────── -->
    

        <!-- Sidebar -->
        

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
        </div>
    <script>
        function switchTab(btn, tabId) {
            document.querySelectorAll('.tab-btn').forEach(b => b.classList.remove('active'));
            btn.classList.add('active');
            document.getElementById('transactions').style.display = tabId === 'transactions' ? 'block' : 'none';
            document.getElementById('refunds').style.display = tabId === 'refunds' ? 'block' : 'none';
        }
    </script>
@endsection
