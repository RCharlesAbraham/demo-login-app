@extends('layouts.dashboard')

@section('title', 'Shopping Cart | IL² RMUTTO')

@section('dashboard-content')
<main class="cart-content">
    <div class="content-header">
        <h2 class="section-title">Shopping Cart</h2>
        <button class="btn-clear">Clear All</button>
    </div>

    <div class="cart-layout-grid">
        <!-- Cart Items List -->
        <div class="cart-list">
            @php
                $cartItems = [
                    ['title' => 'Advanced Mathematics', 'desc' => 'Master complex algebraic structures and calculus.', 'price' => '$5.99'],
                    ['title' => 'Quantum Physics 101', 'desc' => 'An introduction to the fundamental laws of nature.', 'price' => '$12.50'],
                ];
            @endphp
            
            @foreach($cartItems as $item)
            <div class="cart-item-row">
                <div class="cart-check-wrap">
                    <div class="custom-checkbox {{ $loop->first ? 'checked' : '' }}">
                        <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="4"><polyline points="20 6 9 17 4 12"/></svg>
                    </div>
                </div>
                <div class="cart-item-card">
                    <div class="item-visual"></div>
                    <div class="item-details">
                        <h4 class="item-name">{{ $item['title'] }}</h4>
                        <p class="item-snippet">{{ $item['desc'] }}</p>
                        <div class="instructor-tag">
                            <div class="mini-avatar"></div>
                            <span>By Dr. Sarah Jenkins</span>
                        </div>
                        <div class="item-actions">
                            <button class="btn-action-outline">Save for later</button>
                            <button class="btn-action-outline danger">Delete</button>
                        </div>
                    </div>
                    <div class="item-price-tag">{{ $item['price'] }}</div>
                </div>
            </div>
            @endforeach
        </div>

        <!-- Summary Panel -->
        <div class="cart-summary-panel">
            <div class="summary-card-premium">
                <div class="summary-head">Payment Summary</div>
                <div class="summary-rows">
                    <div class="s-row">
                        <span class="s-label">Subtotal</span>
                        <span class="s-value">$18.49</span>
                    </div>
                    <div class="s-row">
                        <span class="s-label">Taxes</span>
                        <span class="s-value">$0.00</span>
                    </div>
                </div>
                <div class="summary-footer">
                    <span class="s-total-label">Total</span>
                    <span class="s-total-value">$18.49</span>
                </div>
            </div>
            <button class="btn-checkout-premium" onclick="window.location.href='{{ route('payment.method') }}'">Proceed to Checkout</button>
        </div>
    </div>
</main>

@push('styles')
<style>
    .cart-content { display: flex; flex-direction: column; gap: 30px; }
    .content-header { display: flex; justify-content: space-between; align-items: center; }
    .section-title { font-size: 22px; font-weight: 800; color: #1e293b; }
    .btn-clear { background: #003a70; color: #fff; border: none; padding: 10px 24px; border-radius: 12px; font-size: 13px; font-weight: 700; cursor: pointer; transition: 0.2s; }
    .btn-clear:hover { background: #002a55; }

    .cart-layout-grid { display: grid; grid-template-columns: 1fr 340px; gap: 40px; }
    .cart-list { display: flex; flex-direction: column; gap: 24px; }

    .cart-item-row { display: flex; align-items: center; gap: 20px; }
    .custom-checkbox { width: 22px; height: 22px; border-radius: 6px; border: 2px solid #cbd5e1; cursor: pointer; display: flex; align-items: center; justify-content: center; background: #fff; transition: 0.2s; }
    .custom-checkbox.checked { background: #003a70; border-color: #003a70; }
    .custom-checkbox svg { color: #fff; display: none; }
    .custom-checkbox.checked svg { display: block; }

    .cart-item-card { flex: 1; background: #fff; border-radius: 20px; border: 1px solid #e2e8f0; padding: 24px; display: flex; gap: 24px; position: relative; transition: 0.2s; }
    .cart-item-card:hover { border-color: #cbd5e0; box-shadow: 0 4px 15px rgba(0,0,0,0.02); }
    .item-visual { width: 120px; height: 120px; background: #f1f5f9; border-radius: 12px; flex-shrink: 0; }
    .item-details { flex: 1; }
    .item-name { font-size: 17px; font-weight: 700; color: #1e293b; margin-bottom: 6px; }
    .item-snippet { font-size: 12px; color: #94a3b8; margin-bottom: 12px; }
    .instructor-tag { display: flex; align-items: center; gap: 10px; margin-bottom: 20px; }
    .mini-avatar { width: 24px; height: 24px; border-radius: 50%; background: #e2e8f0; }
    .instructor-tag span { font-size: 11px; font-weight: 600; color: #64748b; }

    .item-actions { display: flex; gap: 12px; }
    .btn-action-outline { background: #fff; border: 1.5px solid #e2e8f0; padding: 8px 20px; border-radius: 30px; font-size: 12px; font-weight: 700; color: #64748b; cursor: pointer; transition: 0.2s; }
    .btn-action-outline:hover { background: #f8fafc; color: #1e293b; border-color: #cbd5e0; }
    .btn-action-outline.danger:hover { background: #fef2f2; color: #ef4444; border-color: #fecaca; }

    .item-price-tag { position: absolute; top: 24px; right: 24px; font-size: 18px; font-weight: 800; color: #003a70; }

    .summary-card-premium { background: #fff; border-radius: 24px; border: 1px solid #e2e8f0; overflow: hidden; }
    .summary-head { background: #f8fafc; padding: 20px 24px; font-size: 16px; font-weight: 800; color: #1e293b; border-bottom: 1px solid #e2e8f0; }
    .summary-rows { padding: 8px 24px; }
    .s-row { display: flex; justify-content: space-between; padding: 16px 0; border-bottom: 1px solid #f1f5f9; }
    .s-row:last-child { border-bottom: none; }
    .s-label { font-size: 14px; font-weight: 500; color: #64748b; }
    .s-value { font-size: 14px; font-weight: 700; color: #1e293b; }
    .summary-footer { background: #f8fafc; padding: 20px 24px; display: flex; justify-content: space-between; align-items: center; }
    .s-total-label { font-size: 15px; font-weight: 800; color: #1e293b; }
    .s-total-value { font-size: 18px; font-weight: 800; color: #003a70; }

    .btn-checkout-premium { background: #003a70; color: #fff; border: none; width: 100%; padding: 16px; border-radius: 16px; margin-top: 24px; font-size: 15px; font-weight: 700; cursor: pointer; box-shadow: 0 10px 25px rgba(0, 58, 112, 0.15); transition: 0.2s; }
    .btn-checkout-premium:hover { background: #002a55; transform: translateY(-2px); box-shadow: 0 12px 30px rgba(0, 58, 112, 0.2); }
</style>
@endpush
@endsection
