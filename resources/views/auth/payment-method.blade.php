@extends('layouts.dashboard')

@section('title', 'Payment Method | IL² RMUTTO')

@push('styles')
<style>


        

        
        
        
        
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
@endpush

@section('dashboard-content')
<div class="app-container" style="max-width: 1450px; margin: 0 auto; padding: 40px 30px; width: 100%;">
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
        </div>
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
@endsection
