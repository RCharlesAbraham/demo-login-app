@extends('layouts.dashboard')

@section('title', 'Dashboard | IL² RMUTTO')

@section('dashboard-content')
<main class="content">
    <div class="flex-container">
        <div class="main-col">
            <div class="section-card">
                <div class="section-header">Dashboard</div>
                <p style="font-size:13px; font-weight:700; margin-bottom:10px;">This Week</p>
                
                <div class="chart-box">
                    <div class="y-labels">
                        <span>5h</span><span>4h</span><span>3h</span><span>2h</span><span>1h</span><span>0</span>
                    </div>
                    <!-- Grid lines -->
                    <div class="grid-line" style="top:0%"></div>
                    <div class="grid-line" style="top:20%"></div>
                    <div class="grid-line" style="top:40%"></div>
                    <div class="grid-line" style="top:60%"></div>
                    <div class="grid-line" style="top:80%"></div>

                    <div class="bars-wrapper">
                        @php
                            $days = ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'];
                            $vals = [80, 25, 80, 60, 40, 55, 15]; 
                        @endphp
                        @foreach($days as $i => $day)
                        <div class="bar-container">
                            <div class="bar-actual" style="height: {{ $vals[$i] }}%;"></div>
                            <span class="x-label">{{ $day }}</span>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="section-card">
                <div class="section-header">Enrolled Classes</div>
                <div class="enrolled-list">
                    @php
                        $classes = [
                            ['name' => 'Maths', 'time' => '09:00 AM - 10:00 AM', 'color' => '#003a70'],
                            ['name' => 'Science', 'time' => '11:00 AM - 01:00 PM', 'color' => '#22c55e'],
                            ['name' => 'Biology', 'time' => '01:00 PM - 01:30 PM', 'color' => '#8b5cf6'],
                            ['name' => 'Art', 'time' => '03:30 PM - 04:30 PM', 'color' => '#f97316'],
                        ];
                    @endphp
                    @foreach($classes as $class)
                    <div class="enrolled-item">
                        <div class="color-bar" style="background:{{ $class['color'] }};"></div>
                        <div class="enrolled-info">
                            <h4>{{ $class['name'] }}</h4>
                            <p>{{ $class['time'] }}</p>
                        </div>
                        <div class="chevron"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="m9 18 6-6-6-6"/></svg></div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="side-col">
            <div class="section-card">
                <div class="section-header">Courses</div>
                @foreach($courses as $course)
                <a href="{{ route('course.detail') }}" class="course-dashboard-card" style="text-decoration:none; color:inherit;">
                    <div class="course-circ"></div>
                    <div class="course-body">
                        <h4>{{ $course['name'] }}</h4>
                        <p>{{ $course['duration'] }}</p>
                        <div class="progress-row">
                            <div class="prog-bg"><div class="prog-fill" style="width: {{ $course['progress'] }}%;"></div></div>
                            <span class="prog-val">{{ $course['progress'] }}%</span>
                        </div>
                    </div>
                </a>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Notes Section -->
    <div class="section-card">
        <div class="section-header">
            Notes
            <div style="display:flex; gap:15px; align-items:center;">
                <div class="search-mini">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                    <input type="text" placeholder="Search here">
                </div>
                <button class="btn-add-list">+ Add List</button>
            </div>
        </div>

        <div class="notes-grid">
            <div class="note-column">
                <div class="note-col-head">
                    <span>Reminder <span class="count-badge">3</span></span>
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><circle cx="12" cy="12" r="1.5"/><circle cx="18" cy="12" r="1.5"/><circle cx="6" cy="12" r="1.5"/></svg>
                </div>
                <div class="note-card">
                    <span class="note-tag tag-med">Medium</span>
                    <p class="note-text">(New Feature) Task</p>
                </div>
                <div class="plus-btn-card"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg></div>
            </div>

            <div class="note-column">
                <div class="note-col-head">
                    <span>To Do <span class="count-badge">3</span></span>
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><circle cx="12" cy="12" r="1.5"/><circle cx="18" cy="12" r="1.5"/><circle cx="6" cy="12" r="1.5"/></svg>
                </div>
                <div class="note-card">
                    <span class="note-tag tag-high">High</span>
                    <p class="note-text">(New Feature) Task</p>
                </div>
                <div class="plus-btn-card"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg></div>
            </div>

            <div class="note-column empty-note">
                 <div class="add-note-inline">
                    <input type="text" placeholder="Edit list title...">
                    <div class="form-btns">
                        <button class="btn-add">+ Add List</button>
                        <button class="btn-cancel">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@push('styles')
<style>
    .content { display: flex; flex-direction: column; gap: 25px; }
    .flex-container { display: flex; gap: 25px; }
    .main-col { flex: 2; display: flex; flex-direction: column; gap: 25px; }
    .side-col { flex: 1; display: flex; flex-direction: column; gap: 25px; }

    .section-card {
        background: #FFFFFF;
        border-radius: 26px;
        padding: 25px 25px 60px;
        border: 1px solid #D7D7D7;
        box-shadow: 0 4px 20px rgba(0,0,0,0.02);
        position: relative;
    }

    .section-header {
        font-size: 17px;
        font-weight: 700;
        margin-bottom: 20px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .chart-box {
        position: relative;
        height: 300px;
        margin-top: 40px;
        display: flex;
        align-items: flex-end;
        justify-content: space-between;
        padding: 0 10px 0 60px;
    }

    .y-labels {
        position: absolute;
        left: 0;
        top: 0;
        bottom: 30px;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        font-size: 14px;
        font-weight: 500;
        color: #718096;
    }

    .grid-line {
        position: absolute;
        left: 60px;
        right: 0;
        height: 1px;
        border-top: 1px dashed #cbd5e0;
        z-index: 1;
    }
    
    .bars-wrapper {
        display: flex;
        width: 100%;
        height: 100%;
        align-items: flex-end;
        justify-content: space-between;
        position: relative;
        z-index: 2;
        padding-bottom: 30px;
    }

    .bar-container {
        display: flex;
        flex-direction: column;
        align-items: center;
        height: 100%;
        position: relative;
        width: 40px;
    }

    .bar-actual {
        width: 40px;
        position: absolute;
        bottom: 0;
        background: linear-gradient(180deg, #149AA3 0%, #08686E 100%);
        border-radius: 20px;
        z-index: 2;
    }

    .x-label {
        position: absolute;
        bottom: -30px;
        font-size: 13px;
        color: #4a5568;
        font-weight: 500;
    }

    .enrolled-item {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 15px 0;
        border-bottom: 1px dashed #edf2f7;
        position: relative;
        padding-left: 28px;
    }

    .color-bar {
        position: absolute;
        left: 12px;
        top: 15px;
        bottom: 15px;
        width: 4px;
        border-radius: 2px;
    }

    .enrolled-info h4 { font-size: 14px; font-weight: 700; color: #2d3748; }
    .enrolled-info p { font-size: 12px; color: #a0aec0; margin-top: 2px; }

    .course-dashboard-card {
        display: flex;
        align-items: center;
        gap: 15px;
        padding: 18px;
        border-radius: 16px;
        border: 1px solid #f1f5f9;
        margin-bottom: 15px;
        transition: 0.2s;
    }
    .course-dashboard-card:hover { background: #f8fafc; }

    .course-circ { width: 44px; height: 44px; border-radius: 50%; background: #e2e8f0; }
    .course-body { flex: 1; }
    .course-body h4 { font-size: 14px; font-weight: 700; color: #1e293b; }
    .course-body p { font-size: 12px; color: #94a3b8; }

    .progress-row { display: flex; align-items: center; gap: 10px; margin-top: 10px; }
    .prog-bg { flex: 1; height: 6px; background: #f1f5f9; border-radius: 3px; overflow: hidden; }
    .prog-fill { height: 100%; background: linear-gradient(360deg, #08686E 0%, #149AA3 100%); border-radius: 3px; }
    .prog-val { font-size: 11px; font-weight: 800; color: #4a5568; }

    .notes-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 20px; margin-top: 10px; }
    .note-column { background: #f8fafc; border-radius: 15px; padding: 15px; display: flex; flex-direction: column; gap: 12px; }
    .note-col-head { display: flex; justify-content: space-between; align-items: center; font-size: 13.5px; font-weight: 700; color: #1e293b; }
    .count-badge { background: #f97316; color: #fff; font-size: 10px; padding: 2px 6px; border-radius: 6px; }
    .note-card { background: #fff; border-radius: 12px; padding: 15px; border: 1px solid #f1f5f9; }
    .note-tag { font-size: 9px; font-weight: 800; padding: 3px 8px; border-radius: 5px; margin-bottom: 8px; display: inline-block; }
    .tag-med { background: #fff7ed; color: #f97316; }
    .tag-high { background: #fef2f2; color: #ef4444; }
    .note-text { font-size: 13px; color: #475569; }
    .plus-btn-card { background: #fff; border-radius: 10px; height: 40px; display: flex; align-items: center; justify-content: center; color: #cbd5e0; border: 1px dashed #e2e8f0; cursor: pointer; }

    .search-mini { position: relative; width: 180px; }
    .search-mini input { width: 100%; height: 32px; background: #f1f5f9; border: none; border-radius: 20px; padding: 0 10px 0 32px; font-size: 12px; outline: none; }
    .search-mini svg { position: absolute; left: 10px; top: 50%; transform: translateY(-50%); color: #94a3b8; }
    .btn-add-list { background: #003a70; color: #fff; border: none; padding: 0 15px; border-radius: 8px; font-size: 12px; font-weight: 700; height: 32px; cursor: pointer; }
    
    .add-note-inline input { width: 100%; border: none; outline: none; font-weight: 600; font-size: 14px; margin-bottom: 10px; background: transparent; }
    .form-btns { display: flex; gap: 10px; }
    .btn-add { background: #003a70; color: #fff; border: none; padding: 6px 12px; border-radius: 6px; font-size: 11px; font-weight: 700; cursor: pointer; }
    .btn-cancel { background: #fff; border: 1px solid #e2e8f0; padding: 6px 12px; border-radius: 6px; font-size: 11px; font-weight: 600; cursor: pointer; }
</style>
@endpush
@endsection
