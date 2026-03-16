@extends('layouts.app')

@section('title', 'Wallet Address')

@section('content')
<div class="login-wrapper">
    <div class="login-card" style="max-width: 760px; text-align: center;">
        <h1 class="login-title" style="margin-bottom: 12px;">Wallet Address</h1>
        <p style="color: #475569; margin-bottom: 24px;">
            Manage your wallet details and payment information from your account settings.
        </p>

        <div style="display: flex; gap: 12px; justify-content: center; flex-wrap: wrap;">
            <a href="{{ route('payment.method') }}" class="btn btn-primary">Payment Methods</a>
            <a href="{{ route('transaction') }}" class="btn btn-google" style="text-decoration: none;">View Transactions</a>
        </div>
    </div>
</div>
@endsection
