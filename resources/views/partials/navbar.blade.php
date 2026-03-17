<header class="main-app-header">
    <div class="header-pill">
        <div class="header-left">
            <a href="{{ route('home') }}" class="logo">
                <img src="{{ asset('images/logo.png') }}" alt="Logo">
            </a>
            
            <a href="{{ route('category') }}" class="cat-pill">
                Categories 
                <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="m6 9 6 6 6-6"/></svg>
            </a>

            <div class="search-wrap">
                <a href="{{ route('search') }}" class="search-icon-link">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                </a>
                <input type="text" placeholder="Search here" onfocus="window.location.href='{{ route('search') }}'">
            </div>
        </div>

        <div class="header-right">
            <a href="{{ route('favorites') }}" class="h-icon-btn {{ Route::is('favorites') ? 'active' : '' }}" title="Favorites">
                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l8.78-8.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/></svg>
            </a>
            <a href="{{ route('shopping.cart') }}" class="h-icon-btn {{ Route::is('shopping.cart') ? 'active' : '' }}" title="Cart">
                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="9" cy="21" r="1"/><circle cx="20" cy="21" r="1"/><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"/></svg>
            </a>
            <div class="h-icon-btn" title="Notifications">
                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"/><path d="M13.73 21a2 2 0 0 1-3.46 0"/></svg>
                <span class="notif-badge">2</span>
            </div>
            <a href="{{ route('account.new') }}" class="profile-pill">
                <div class="avatar-head"></div>
                <span>{{ Auth::user()->name ?? 'Student' }}</span>
                <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" opacity="0.6"><path d="m6 9 6 6 6-6"/></svg>
            </a>
        </div>
    </div>
</header>
