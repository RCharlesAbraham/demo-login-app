<aside class="sidebar">
    <a href="{{ route('dashboard.1') }}" class="nav-link {{ Route::is('dashboard.1') ? 'active' : '' }}">
        <img src="{{ asset('images/icons/1.png') }}" style="width: 22px; height: 22px;">
        Dashboard
    </a>
    <a href="{{ route('calendar') }}" class="nav-link {{ Route::is('calendar') ? 'active' : '' }}">
        <img src="{{ asset('images/icons/2.png') }}" style="width: 22px; height: 22px;">
        Calendar
    </a>
    <a href="{{ route('learning') }}" class="nav-link {{ Route::is('learning') ? 'active' : '' }}">
        <img src="{{ asset('images/icons/3.png') }}" style="width: 22px; height: 22px;">
        Learning
    </a>
    <a href="{{ route('courses') }}" class="nav-link {{ Route::is('courses') ? 'active' : '' }}">
        <img src="{{ asset('images/icons/4.png') }}" style="width: 22px; height: 22px;">
        Exam
    </a>
    <a href="{{ route('quiz') }}" class="nav-link {{ Route::is('quiz') ? 'active' : '' }}">
        <img src="{{ asset('images/icons/5.png') }}" style="width: 22px; height: 22px;">
        Quiz
    </a>
    <a href="{{ route('account.new') }}" class="nav-link {{ Route::is('account.new') ? 'active' : '' }}">
        <img src="{{ asset('images/icons/6.png') }}" style="width: 22px; height: 22px;">
        Account
    </a>
    <a href="{{ route('wallet.address') }}" class="nav-link {{ Route::is('wallet.address') ? 'active' : '' }}">
        <img src="{{ asset('images/icons/7.png') }}" style="width: 22px; height: 22px;">
        Wallet Address
    </a>
    <a href="{{ route('transaction') }}" class="nav-link {{ Route::is('transaction') ? 'active' : '' }}">
        <img src="{{ asset('images/icons/8.png') }}" style="width: 22px; height: 22px;">
        Transaction
    </a>
    <a href="{{ route('payment.method') }}" class="nav-link {{ Route::is('payment.method') ? 'active' : '' }}">
        <img src="{{ asset('images/icons/9.png') }}" style="width: 22px; height: 22px;">
        Payment
    </a>

    <!-- Logout form -->
    <div style="margin-top: auto; padding-top: 40px; border-top: 1px solid #f1f5f9; margin-left:18px; margin-right: 18px;">
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" style="background:none; border:none; cursor:pointer; color: #ef4444; font-weight: 600; font-size: 14px; display:flex; gap:14px; align-items:center;">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
                Logout
            </button>
        </form>
    </div>
</aside>

<style>
    .sidebar {
        background: #fff;
        border-radius: 20px;
        padding: 20px 10px 40px; 
        box-shadow: 0 4px 20px rgba(0,0,0,0.02);
        min-height: calc(100vh - 120px);
        position: sticky;
        top: 100px;
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
        color: #003a70;
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
</style>
