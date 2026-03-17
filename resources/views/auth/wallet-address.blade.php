@extends('layouts.dashboard')

@section('title', 'Wallet Address | IL² RMUTTO')

@push('styles')
<style>
.app-container {
        max-width: 1450px;
        margin: 0 auto;
        padding: 40px 30px;
        width: 100%;
    }
    .page-title {
        font-size: 28px;
        font-weight: 800;
        color: #1e293b;
        margin-bottom: 8px;
    }
    .page-subtitle {
        font-size: 15px;
        color: #64748b;
    }
    .wallet-card-container {
        display: grid;
        grid-template-columns: 1fr 300px;
        gap: 30px;
        margin-top: 40px;
    }
    .wallet-premium-card {
        background: linear-gradient(135deg, #0f3c6e 0%, #1e293b 100%);
        border-radius: 30px;
        padding: 40px;
        color: #fff;
        position: relative;
        overflow: hidden;
        box-shadow: 0 20px 40px rgba(15, 60, 110, 0.2);
    }
    .wallet-premium-card::after {
        content: '';
        position: absolute;
        top: -50%;
        right: -10%;
        width: 400px;
        height: 800px;
        background: radial-gradient(circle, rgba(255,255,255,0.05) 0%, transparent 60%);
        transform: rotate(45deg);
    }
    .wallet-card-
    .wallet-brand {
        display: flex;
        align-items: center;
        gap: 15px;
        font-size: 18px;
        font-weight: 700;
    }
    .eth-logo {
        width: 44px;
        height: 44px;
        background: rgba(255,255,255,0.1);
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        border: 1px solid rgba(255,255,255,0.2);
    }
    .status-pill {
        background: rgba(34, 197, 94, 0.2);
        color: #4ade80;
        padding: 4px 12px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 700;
        border: 1px solid rgba(74, 222, 128, 0.3);
    }
    .wallet-address-section {
        margin-bottom: 60px;
    }
    .address-label {
        display: block;
        font-size: 13px;
        color: rgba(255,255,255,0.6);
        margin-bottom: 12px;
        font-weight: 500;
    }
    .address-box {
        background: rgba(0,0,0,0.2);
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 16px 24px;
        border-radius: 16px;
        border: 1px solid rgba(255,255,255,0.1);
    }
    .address-box code {
        font-family: 'Courier New', monospace;
        font-size: 16px;
        color: #e2e8f0;
        letter-spacing: 0.5px;
    }
    .copy-btn {
        background: transparent;
        border: none;
        color: rgba(255,255,255,0.6);
        cursor: pointer;
        transition: color 0.2s;
        padding: 5px;
    }
    .copy-btn:hover {
        color: #fff;
    }
    .wallet-stats-row {
        display: flex;
        gap: 60px;
    }
    .w-stat {
        display: flex;
        flex-direction: column;
        gap: 4px;
    }
    .w-val {
        font-size: 20px;
        font-weight: 700;
    }
    .w-lbl {
        font-size: 12px;
        color: rgba(255,255,255,0.5);
    }
    .wallet-actions-sidebar {
        background: #fff;
        border-radius: 24px;
        padding: 24px;
        border: 1px solid #e2e8f0;
        display: flex;
        flex-direction: column;
        gap: 10px;
    }
    .sidebar-title {
        font-size: 14px;
        font-weight: 800;
        color: #1e293b;
        margin-bottom: 15px;
        padding-left: 10px;
    }
    .action-item {
        display: flex;
        align-items: center;
        gap: 12px;
        width: 100%;
        padding: 14px 18px;
        background: #f8fafc;
        border: 1px solid #f1f5f9;
        border-radius: 12px;
        font-size: 14px;
        font-weight: 600;
        color: #475569;
        cursor: pointer;
        transition: all 0.2s;
    }
    .action-item:hover {
        background: #f1f5f9;
        color: #1e293b;
        border-color: #cbd5e0;
    }
    .action-item svg {
        color: #94a3b8;
    }
    .action-item.danger {
        color: #ef4444;
    }
    .action-item.danger:hover {
        background: #fef2f2;
        border-color: #fecaca;
    }
    .action-item.danger svg {
        color: #ef4444;
    }
</style>
@endpush

@section('dashboard-content')
<div class="app-container">
    <div class="content-header">
        <h1 class="page-title">Wallet Address</h1>
        <p class="page-subtitle">Manage your linked blockchain addresses for certificates and rewards</p>
    </div>

    <div class="wallet-card-container">
        <div class="wallet-premium-card">
            <div class="wallet-card-header">
                <div class="wallet-brand">
                    <div class="eth-logo">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="white"><path d="M12 2L4.5 14.5L12 19L19.5 14.5L12 2Z" opacity="0.6"/><path d="M12 22L4.5 15.5L12 20L19.5 15.5L12 22Z" opacity="0.4"/><path d="M12 2L12 19L19.5 14.5L12 2Z"/></svg>
                    </div>
                    <span>Ethereum Network</span>
                </div>
                <div class="status-pill">Connected</div>
            </div>
            
            <div class="wallet-address-section">
                <span class="address-label">Your Wallet Address</span>
                <div class="address-box">
                    <code id="walletAddr">0x71C7656EC7ab88b098defB751B7401B5f6d8976F</code>
                    <button class="copy-btn" onclick="copyAddress()">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"/><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"/></svg>
                    </button>
                </div>
            </div>

            <div class="wallet-stats-row">
                <div class="w-stat">
                    <span class="w-val">1.24 ETH</span>
                    <span class="w-lbl">Balance</span>
                </div>
                <div class="w-stat">
                    <span class="w-val">12</span>
                    <span class="w-lbl">Certificates</span>
                </div>
                <div class="w-stat">
                    <span class="w-val">Active</span>
                    <span class="w-lbl">Sync Status</span>
                </div>
            </div>
        </div>

        <div class="wallet-actions-sidebar">
            <h3 class="sidebar-title">Manage Wallet</h3>
            <button class="action-item">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="m3 9 9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
                Change Wallet
            </button>
            <button class="action-item">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="7 10 12 15 17 10"/><line x1="12" y1="15" x2="12" y2="3"/></svg>
                Export History
            </button>
            <button class="action-item danger">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M18.36 6.64a9 9 0 1 1-12.73 0"/><line x1="12" y1="2" x2="12" y2="12"/></svg>
                Disconnect Wallet
            </button>
        </div>
    </div>
</div>



<script>
function copyAddress() {
    const text = document.getElementById('walletAddr').innerText;
    navigator.clipboard.writeText(text).then(() => {
        alert('Address copied to clipboard!');
    });
}
</script>
@endsection
