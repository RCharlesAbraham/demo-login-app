@extends('layouts.dashboard')

@section('title', 'Transaction | IL² RMUTTO')

@section('dashboard-content')
<main class="content">
    <h2 class="page-title">Transaction</h2>

    <!-- Tabs -->
    <div class="tabs-wrap">
        <button class="tab-btn active" onclick="switchTab(this, 'transactions')">Transactions</button>
        <a href="{{ route('refund') }}" class="tab-btn" style="text-decoration:none; text-align:center;">Refunds</a>
    </div>

    <!-- Table -->
    <div class="table-card" id="transactions">
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
                @php
                    $txns = [
                        ['id' => 'TXN-98231', 'name' => 'Dr. Sarah Jenkins', 'course' => 'Advanced Mathematics', 'method' => 'Stripe', 'date' => '14 June 2023 | 10:00PM', 'amount' => '$9.99', 'status' => 'Paid'],
                        ['id' => 'TXN-98232', 'name' => 'Prof. Alan Turing', 'course' => 'Quantum Physics 101', 'method' => 'Stripe', 'date' => '14 June 2023 | 10:00PM', 'amount' => '$10.00', 'status' => 'Unpaid'],
                        ['id' => 'TXN-98233', 'name' => 'Dr. Sarah Jenkins', 'course' => 'Modern Art History', 'method' => 'Stripe', 'date' => '14 June 2023 | 10:00PM', 'amount' => '$9.99', 'status' => 'Paid'],
                    ];
                @endphp
                @foreach($txns as $txn)
                <tr>
                    <td><span class="txn-id">{{ $txn['id'] }}</span></td>
                    <td>
                        <div class="invoice-cell">
                            <div class="invoice-avatar"></div>
                            <div>
                                <div class="invoice-name">{{ $txn['name'] }}</div>
                                <div class="invoice-sub">{{ $txn['course'] }}</div>
                            </div>
                        </div>
                    </td>
                    <td><a href="https://stripe.com" class="stripe-link">{{ $txn['method'] }}</a></td>
                    <td><span class="date-cell">{{ $txn['date'] }}</span></td>
                    <td><span class="amount-cell">{{ $txn['amount'] }}</span></td>
                    <td>
                        <div class="status-cell">
                            <span class="badge {{ $txn['status'] == 'Paid' ? 'badge-paid' : 'badge-unpaid' }}">{{ $txn['status'] }}</span>
                            @if($txn['status'] == 'Paid')
                                <button class="btn-download active">Download</button>
                            @else
                                <button class="btn-download inactive" disabled>Download</button>
                            @endif
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="table-card" id="refunds" style="display:none; padding: 40px; text-align: center; color: #94a3b8; font-size: 14px;">
        No refunds found.
    </div>
</main>

@push('styles')
<style>
    .content { display: flex; flex-direction: column; gap: 20px; }
    .page-title { font-size: 22px; font-weight: 800; color: #1e293b; margin-bottom: 10px; }

    .tabs-wrap { background: #fff; border-radius: 16px; padding: 6px; display: flex; gap: 6px; box-shadow: 0 2px 8px rgba(0,0,0,0.04); }
    .tab-btn { flex: 1; padding: 12px 20px; border: none; border-radius: 12px; font-size: 14px; font-weight: 500; cursor: pointer; background: transparent; color: #64748b; transition: 0.2s; font-family: 'Inter', sans-serif; }
    .tab-btn.active { background: #f8fafc; color: #1e293b; font-weight: 800; box-shadow: inset 0 0 0 1px #e2e8f0; }

    .table-card { background: #fff; border-radius: 20px; border: 1px solid #e2e8f0; box-shadow: 0 4px 20px rgba(0,0,0,0.02); overflow: hidden; }
    table { width: 100%; border-collapse: collapse; }
    thead tr { background: #f8fafc; border-bottom: 1px solid #f1f5f9; }
    thead th { padding: 16px 20px; font-size: 13px; font-weight: 700; color: #64748b; text-align: left; }
    tbody tr { border-bottom: 1px solid #f8fafc; transition: background 0.15s; }
    tbody tr:hover { background: #fafbfc; }
    tbody td { padding: 20px; font-size: 13.5px; color: #1e293b; vertical-align: middle; }

    .txn-id { font-size: 12px; color: #94a3b8; font-family: 'Courier New', monospace; font-weight: 600; }
    .invoice-cell { display: flex; align-items: center; gap: 12px; }
    .invoice-avatar { width: 36px; height: 36px; border-radius: 50%; background: #edf2f7; flex-shrink: 0; }
    .invoice-name { font-size: 14px; font-weight: 700; color: #1e293b; }
    .invoice-sub { font-size: 11px; color: #94a3b8; }
    .stripe-link { color: #6366f1; font-weight: 600; text-decoration: none; }
    .date-cell { color: #64748b; font-size: 13px; }
    .amount-cell { font-size: 14px; font-weight: 800; color: #003a70; }
    .status-cell { display: flex; align-items: center; gap: 12px; }

    .badge { display: inline-flex; align-items: center; justify-content: center; padding: 6px 14px; border-radius: 20px; font-size: 11px; font-weight: 800; text-transform: uppercase; }
    .badge-paid { background: #f0fdf4; color: #16a34a; border: 1px solid #bbf7d0; }
    .badge-unpaid { background: #fef2f2; color: #dc2626; border: 1px solid #fecaca; }

    .btn-download { padding: 8px 16px; border-radius: 12px; font-size: 12px; font-weight: 700; cursor: pointer; border: none; transition: 0.2s; }
    .btn-download.active { background: #003a70; color: #fff; }
    .btn-download.active:hover { background: #002a55; }
    .btn-download.inactive { background: #f1f5f9; color: #cbd5e0; cursor: not-allowed; }
</style>
@endpush

<script>
    function switchTab(btn, tabId) {
        document.querySelectorAll('.tab-btn').forEach(b => b.classList.remove('active'));
        btn.classList.add('active');
        document.getElementById('transactions').style.display = tabId === 'transactions' ? 'block' : 'none';
        document.getElementById('refunds').style.display = tabId === 'refunds' ? 'block' : 'none';
    }
</script>
@endsection
