<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Category | IL² RMUTTO</title>
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
            grid-template-columns: 280px 1fr;
            gap: 25px;
            max-width: 1450px;
            margin: 0 auto;
            padding: 90px 30px 50px;
            flex: 1;
            width: 100%;
        }

        /* ─── SIDEBAR FILTERS ─── */
        .filter-sidebar {
            background: #fff;
            border-radius: 20px;
            padding: 24px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.02);
            position: sticky; top: 80px; align-self: start;
            max-height: calc(100vh - 120px);
            overflow-y: auto;
        }
        .filter-sidebar::-webkit-scrollbar { width: 5px; }
        .filter-sidebar::-webkit-scrollbar-thumb { background: #e2e8f0; border-radius: 10px; }

        .sidebar-header { font-size: 15px; font-weight: 700; color: #1e293b; margin-bottom: 20px; }
        
        .filter-group { margin-bottom: 24px; }
        .filter-title {
            display: flex; align-items: center; justify-content: space-between;
            font-size: 14px; font-weight: 700; color: #1e293b; margin-bottom: 12px; cursor: pointer;
        }
        .filter-content { display: flex; flex-direction: column; gap: 10px; }
        .filter-item {
            display: flex; align-items: center; justify-content: space-between;
            cursor: pointer;
        }
        .filter-item label {
            display: flex; align-items: center; gap: 10px; font-size: 13px; color: #64748b; font-weight: 500; cursor: pointer;
        }
        .filter-item input {
            width: 18px; height: 18px; border-radius: 4px; border: 2px solid #e2e8f0; 
            appearance: none; cursor: pointer; background: #fff; transition: 0.2s;
        }
        .filter-item input:checked { background: #003a70; border-color: #003a70; }
        .filter-count { font-size: 12px; color: #94a3b8; font-weight: 500; }

        /* ─── MAIN CONTENT ─── */
        .main-card {
            background: #fff;
            border-radius: 24px;
            padding: 30px;
            box-shadow: 0 4px 25px rgba(0,0,0,0.03);
            display: flex;
            flex-direction: column;
            gap: 24px;
        }

        .main-header {
            display: flex; align-items: center; justify-content: space-between;
        }
        .main-header h2 { font-size: 18px; font-weight: 700; color: #1e293b; }
        
        .sort-wrap { display: flex; align-items: center; gap: 12px; }
        .sort-label { font-size: 13.5px; color: #64748b; font-weight: 500; }
        .sort-select {
            padding: 8px 16px; border-radius: 20px; border: 1px solid #e2e8f0;
            background: #fff; color: #1e293b; font-size: 13px; font-weight: 600; outline: none; cursor: pointer;
        }

        .cat-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 25px;
        }

        .cat-card {
            position: relative;
            aspect-ratio: 16/10;
            border-radius: 20px;
            overflow: hidden;
            cursor: pointer;
            transition: 0.3s;
        }
        .cat-card:hover { transform: translateY(-5px); box-shadow: 0 10px 20px rgba(0,0,0,0.1); }
        .cat-card img { width: 100%; height: 100%; object-fit: cover; }
        
        .cat-overlay {
            position: absolute; inset: 0;
            background: linear-gradient(to bottom, transparent 40%, rgba(0,0,0,0.4));
            display: flex; flex-direction: column; justify-content: flex-end;
        }
        .cat-blur {
            backdrop-filter: blur(8px);
            background: rgba(255,255,255,0.1);
            border-top: 1px solid rgba(255,255,255,0.3);
            padding: 16px 20px;
        }
        .cat-name { font-size: 16px; font-weight: 700; color: #fff; letter-spacing: 0.5px; }

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

        <!-- Filters Sidebar -->
        <aside class="filter-sidebar">
            <div class="sidebar-header">Filters:</div>

            <div class="filter-group">
                <div class="filter-title">Category <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><path d="m6 9 6 6 6-6"/></svg></div>
                <div class="filter-content">
                    <div class="filter-item">
                        <label><input type="checkbox"> Category 1</label>
                        <span class="filter-count">0</span>
                    </div>
                    <div class="filter-item">
                        <label><input type="checkbox"> Category 1</label>
                        <span class="filter-count">4</span>
                    </div>
                    <div class="filter-item">
                        <label><input type="checkbox"> Category 1</label>
                        <span class="filter-count">4</span>
                    </div>
                </div>
            </div>

            <div class="filter-group">
                <div class="filter-title">Sub-Category <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><path d="m6 9 6 6 6-6"/></svg></div>
                <div class="filter-content">
                    <div class="filter-item"><label><input type="checkbox"> Lorem Ipsum</label></div>
                    <div class="filter-item"><label><input type="checkbox"> Lorem Ipsum</label></div>
                </div>
            </div>

            <div class="filter-group">
                <div class="filter-title">Subject <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" style="transform: rotate(-90deg)"><path d="m6 9 6 6 6-6"/></svg></div>
            </div>
            
            <div class="filter-group">
                <div class="filter-title">Class <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" style="transform: rotate(-90deg)"><path d="m6 9 6 6 6-6"/></svg></div>
            </div>

            <div class="filter-group">
                <div class="filter-title">Tutor <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><path d="m6 9 6 6 6-6"/></svg></div>
                <div class="filter-content">
                    <div class="filter-item"><label><input type="checkbox"> Verified</label></div>
                    <div class="filter-item"><label><input type="checkbox"> Experienced</label></div>
                </div>
            </div>

            <div class="filter-group">
                <div class="filter-title">Course Price <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" style="transform: rotate(-90deg)"><path d="m6 9 6 6 6-6"/></svg></div>
            </div>

            <div class="filter-group">
                <div class="filter-title">Ratings <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" style="transform: rotate(-90deg)"><path d="m6 9 6 6 6-6"/></svg></div>
            </div>

            <div class="filter-group">
                <div class="filter-title">Duration <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" style="transform: rotate(-90deg)"><path d="m6 9 6 6 6-6"/></svg></div>
            </div>

            <div class="filter-group" style="margin-bottom:0">
                <div class="filter-title">Language <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" style="transform: rotate(-90deg)"><path d="m6 9 6 6 6-6"/></svg></div>
            </div>
        </aside>

        <!-- Main Categories -->
        <main class="main-card">
            <div class="main-header">
                <h2>Categories</h2>
                <div class="sort-wrap">
                    <span class="sort-label">Sort by</span>
                    <select class="sort-select">
                        <option>Default</option>
                        <option>Most Popular</option>
                        <option>Most Rated</option>
                        <option>Date</option>
                    </select>
                </div>
            </div>

            <div class="cat-grid">
                @for ($i = 0; $i < 9; $i++)
                <a href="{{ route('courses') }}" class="cat-card" style="text-decoration:none;">
                    <img src="{{ asset('images/learning.png') }}" alt="Category">
                    <div class="cat-overlay">
                        <div class="cat-blur">
                            <span class="cat-name">Business</span>
                        </div>
                    </div>
                </a>
                @endfor
            </div>
        </main>
    </div>

</body>
</html>
