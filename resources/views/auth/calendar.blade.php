@extends('layouts.dashboard')

@section('title', 'Calendar | IL² RMUTTO')

@push('styles')
<style>


        

        

        /* ─── MAIN WRAPPER ─── */

        /* ─── CONTENT AREA ─── */
        .main-content { display: flex; gap: 25px; }
        .calendar-section { flex: 2.5; display: flex; flex-direction: column; gap: 20px; }
        .schedule-section { flex: 1; display: flex; flex-direction: column; gap: 20px; }

        .card { 
            background: #fff; border-radius: var(--radius-lg); padding: 30px; 
            border: 1px solid #D7D7D7; box-shadow: 0 4px 20px rgba(0,0,0,0.02);
        }

        .cal-header-row { display: flex; justify-content: space-between; align-items: center; margin-bottom: 15px; }
        .cal-title { font-size: 18px; font-weight: 500; color: var(--text-main); }

        .btn-download {
            background: #003a70; color: #fff; border: none; padding: 10px 20px; border-radius: 12px; 
            font-size: 12px; font-weight: 500; cursor: pointer; display: flex; align-items: center; gap: 8px;
        }

        .calendar-nav-bar {
            display: flex; justify-content: space-between; align-items: center; margin-bottom: 25px;
        }

        .month-selector { display: flex; align-items: center; gap: 15px; font-size: 17px; font-weight: 800; }
        .tab-group { display: flex; background: #f1f5f9; padding: 4px; border-radius: 10px; gap: 2px; }
        .tab-btn { border: none; background: none; padding: 8px 16px; border-radius: 8px; font-size: 12px; font-weight: 400; color: var(--text-muted); cursor: pointer; }
        .tab-btn.active { background: #fff; color: var(--text-main); box-shadow: 0 2px 4px rgba(0,0,0,0.05); }

        .btn-new-schedule {
            background: #4338ca; color: #fff; border: none; padding: 10px 20px; border-radius: 12px;
            font-size: 12px; font-weight: 800; cursor: pointer; display: flex; align-items: center; gap: 6px;
        }

        /* GRID */
        .calendar-grid { display: grid; grid-template-columns: repeat(7, 1fr); gap: 10px; }
        .day-label { text-align: center; font-size: 12px; font-weight: 500; color: var(--text-light); padding: 10px 0; }
        .cal-cell {
            aspect-ratio: 1; border-radius: 12px; border: 1px solid #e2e8f0; padding: 8px; 
            font-size: 13px; font-weight: 400; color: var(--text-muted); display: flex; flex-direction: column;
            background: #fff; position: relative;
        }
        .cal-cell.inactive { background: #f8fafc; color: #cbd5e0; }
        .cal-cell.today-cell .date-num { color: #3b82f6; }

        .date-num { margin-bottom: 5px; }
        .circle-num {
            width: 24px; height: 24px; border-radius: 50%; background: #6366f1; color: #fff;
            display: flex; align-items: center; justify-content: center; font-size: 12px;
        }

        .event-box {
            background: #fdf2f8; border-left: 3px solid #f472b6; border-radius: 4px; padding: 5px 8px;
            width: 100%; margin-top: 5px; cursor: pointer;
        }
        .event-box h5 { font-size: 11px; font-weight: 500; color: var(--text-main); margin-bottom: 2px; }
        .event-box p { font-size: 8px; color: var(--text-light); }

        /* SCHEDULE SIDEBAR */
        .sched-title-row { display: flex; justify-content: space-between; align-items: center; margin-bottom: 25px; }
        .sched-search-wrap { position: relative; width: 140px; }
        .sched-search-wrap input { width: 100%; padding: 8px 12px 8px 30px; border-radius: 30px; border: 1px solid #e2e8f0; font-size: 12px; outline: none; font-weight: 400; }
        .sched-search-wrap svg { position: absolute; left: 10px; top: 50%; transform: translateY(-50%); color: var(--text-light); }

        .sched-day-name { font-size: 13px; font-weight: 500; color: var(--text-light); margin-bottom: 20px; }
        .sched-card { 
            background: #fff; border-radius: 20px; padding: 20px; border: 1px solid #f1f5f9; 
            display: flex; gap: 15px; margin-bottom: 15px; position: relative; 
        }
        .sched-time { font-size: 11px; font-weight: 400; color: var(--text-light); width: 60px; line-height: 1.4; flex-shrink: 0; }
        .sched-time span { display: block; font-size: 9px; opacity: 0.6; margin: 3px 0; }
        .sched-v-bar { width: 4px; border-radius: 2px; height: 40px; }
        .sched-info h4 { font-size: 12px; color: var(--text-light); font-weight: 500; margin-bottom: 4px; }
        .sched-info h3 { font-size: 14px; font-weight: 500; color: var(--text-main); }
        .dots-btn { position: absolute; top: 20px; right: 20px; color: #cbd5e1; cursor: pointer; }

        /* ─── FOOTER ─── */
        footer {
            grid-column: 2;
            border-radius: 26px;
            background: #fff; padding: 60px 30px; border-top: 1px solid #f1f5f9;
            display: flex; justify-content: space-between; gap: 40px; flex-wrap: wrap; margin-top: 10px;
        }
        .f-brand { flex: 1; min-width: 250px; }
        .f-logo-circle { width: 60px; height: 60px; border-radius: 50%; background: #f8fafc; display: flex; align-items: center; justify-content: center; margin-bottom: 20px; box-shadow: 0 4px 10px rgba(0,0,0,0.03); }
        .f-logo-circle img { height: 35px; }
        .f-brand p { color: #64748b; font-size: 14.5px; line-height: 1.6; }
        .f-col { flex: 0.6; min-width: 150px; }
        .f-col ul { list-style: none; padding: 0; margin: 0; }
        .f-col ul li { margin-bottom: 15px; }
        .f-col ul li a { text-decoration: none; color: #475569; font-size: 14.5px; transition: 0.2s; }
        .f-col ul li a:hover { color: var(--primary); }
        .f-right { flex: 1; min-width: 250px; display: flex; flex-direction: column; align-items: flex-end; gap: 20px; }
        .f-lang-select { 
            padding: 10px 15px; border-radius: 25px; border: 1px solid #e2e8f0; background: #fff; 
            color: #475569; font-size: 14px; outline: none; cursor: pointer; width: 140px;
        }
        .f-socials { display: flex; gap: 12px; }
        .f-socials a { 
            width: 38px; height: 38px; border-radius: 50%; background: #f1f5f9; 
            display: flex; align-items: center; justify-content: center; transition: 0.2s; 
        }
        .f-socials a:hover { transform: translateY(-3px); background: #e2e8f0; }
        .f-socials a img { height: 18px; width: 18px; object-fit: contain; }
        .f-apps { display: flex; gap: 10px; }
        .f-apps a img { height: 38px; }

        /* MODALS */
        .modal-overlay {
            position: fixed; top: 0; left: 0; right: 0; bottom: 0; 
            background: rgba(0,0,0,0.4); display: none; align-items: center; justify-content: center; z-index: 2000;
        }
        .modal-box { 
            background: #fff; width: 340px; border-radius: 20px; padding: 25px; 
            box-shadow: 0 10px 40px rgba(0,0,0,0.15); border: 1px solid #e2e8f0; position: relative;
        }
        .modal-title { font-size: 16px; font-weight: 800; margin-bottom: 20px; color: var(--text-main); }
        .modal-label { font-size: 12px; color: var(--text-light); font-weight: 600; margin-bottom: 10px; display: block; }
        .modal-select { 
            width: 100%; padding: 12px 15px; border-radius: 10px; border: 1px solid #e2e8f0; 
            font-size: 13px; font-weight: 600; margin-bottom: 20px; appearance: none;
            background: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='%2394a3b8' stroke-width='2.5'%3E%3Cpath d='m6 9 6 6 6-6'/%3E%3C/svg%3E") no-repeat right 15px center;
            background-size: 14px; outline: none;
        }

        .dl-list { display: flex; flex-direction: column; gap: 10px; }
        .dl-item { 
            display: flex; align-items: flex-start; gap: 15px; padding: 15px; 
            border-radius: 12px; cursor: pointer; transition: 0.2s; 
        }
        .dl-item:hover, .dl-item.active { background: #f8fafc; }
        .dl-icon { 
            width: 36px; height: 36px; background: #f1f5f9; border-radius: 10px; 
            display: flex; align-items: center; justify-content: center; color: var(--text-muted); flex-shrink: 0; 
        }
        .dl-info h4 { font-size: 13px; font-weight: 700; color: var(--text-main); margin-bottom: 2px; }
        .dl-info p { font-size: 11px; color: var(--text-light); line-height: 1.3; }

        .page-item { display: flex; align-items: center; justify-content: space-between; padding: 15px; border-radius: 12px; margin-bottom: 5px; cursor: pointer; }
        .p-info { display: flex; align-items: center; gap: 15px; }
        .p-box { width: 34px; height: 34px; background: #e2e8f0; border-radius: 8px; }
        .p-name { font-size: 14px; font-weight: 600; color: var(--text-muted); }
        .p-radio { width: 22px; height: 22px; border-radius: 50%; border: 2px solid #e2e8f0; }
        
        .page-item.selected .p-box { background: #cbd5e0; }
        .page-item.selected .p-name { color: var(--text-main); }
        .page-item.selected .p-radio { background: #f97316; border-color: #f97316; }

        .btn-done { 
            width: 100%; background: #003a70; color: #fff; border: none; padding: 14px; 
            border-radius: 10px; font-size: 14px; font-weight: 700; cursor: pointer; margin-top: 15px; 
        }
</style>
@endpush

@section('dashboard-content')
<div class="dashboard-page-content">
        

        <main class="main-content">
            <div class="calendar-section">
                <div class="cal-header-row">
                    <div class="cal-title">Calendar</div>
                    <button class="btn-download" onclick="openDownloadModal()">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="7 10 12 15 17 10"/><line x1="12" y1="15" x2="12" y2="3"/></svg>
                        Download <svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><path d="m6 9 6 6 6-6"/></svg>
                    </button>
                </div>

                <div class="card">
                    <div class="calendar-nav-bar">
                        <div class="month-selector">
                            <svg id="prevMonth" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" style="cursor:pointer; opacity: 0.8; transition: 0.2s;" onmouseover="this.style.opacity='1'" onmouseout="this.style.opacity='0.8'"><path d="m15 18-6-6 6-6"/></svg>
                            <span id="monthDisplay">December 2023</span>
                            <svg id="nextMonth" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" style="cursor:pointer; opacity: 0.8; transition: 0.2s;" onmouseover="this.style.opacity='1'" onmouseout="this.style.opacity='0.8'"><path d="m9 18 6-6-6-6"/></svg>
                        </div>
                        <div class="tab-group">
                            <button class="tab-btn">Daily</button><button class="tab-btn">Weekly</button><button class="tab-btn active">Monthly</button><button class="tab-btn">Yearly</button>
                        </div>
                        <button class="btn-new-schedule">+New Schedule</button>
                    </div>

                    <div class="calendar-grid" id="calendarGrid">
                        <!-- Dynamic calendar logic will build the grid here -->
                    </div>
                </div>
            </div>

            <div class="schedule-section">
                <div class="sched-title-row">
                    <div class="cal-title" style="font-size: 16px;">Schedule</div>
                    <div class="sched-search-wrap">
                        <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                        <input type="text" placeholder="Search here">
                    </div>
                </div>

                <div class="card" style="padding-bottom: 20px;">
                    <div class="sched-day-name" id="scheduleDayName">December 20, Sunday</div>
                    
                    <div class="sched-card">
                        <div class="sched-time">09:00 am<span>to</span>10:00 am</div>
                        <div class="sched-v-bar" style="background:#f472b6;"></div>
                        <div class="sched-info"><h4>Teacher 2</h4><h3>Maths Class</h3></div>
                        <div class="dots-btn"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><circle cx="12" cy="12" r="1"/><circle cx="12" cy="5" r="1"/><circle cx="12" cy="19" r="1"/></svg></div>
                    </div>

                    <div class="sched-card">
                        <div class="sched-time">09:00 am<span>to</span>10:00 am</div>
                        <div class="sched-v-bar" style="background:#f97316;"></div>
                        <div class="sched-info"><h4>Morning Coffee</h4><h3 style="font-size: 13px;">Breakfast with Mr. Cahyadee at Kopikitaktia</h3></div>
                        <div class="dots-btn"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><circle cx="12" cy="12" r="1"/><circle cx="12" cy="5" r="1"/><circle cx="12" cy="19" r="1"/></svg></div>
                    </div>
                </div>
            </div>
        </main>

        
    </div>

    <!-- MODAL 1: Download -->
    <div id="downloadModal" class="modal-overlay" onclick="closeModal(event, 'downloadModal')">
        <div class="modal-box" onclick="event.stopPropagation()">
            <div class="modal-title">Download</div>
            <label class="modal-label">File type</label>
            <select class="modal-select">
                <option>PDF Standard</option>
            </select>
            <div class="dl-list">
                <div class="dl-item active" onclick="gotoStep2()">
                    <div class="dl-icon"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline></svg></div>
                    <div class="dl-info"><h4>PDF Standard</h4><p>Best for documents (and emailing)</p></div>
                </div>
                <div class="dl-item" onclick="gotoStep2()">
                    <div class="dl-icon"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline></svg></div>
                    <div class="dl-info"><h4>PDF Printing</h4><p>Best for printing</p></div>
                </div>
                <div class="dl-item" onclick="gotoStep2()">
                    <div class="dl-icon"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><circle cx="8.5" cy="8.5" r="1.5"></circle><polyline points="21 15 16 10 5 21"></polyline></svg></div>
                    <div class="dl-info"><h4>JPG</h4><p>Best for sharing</p></div>
                </div>
                <div class="dl-item" onclick="gotoStep2()">
                    <div class="dl-icon"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><circle cx="8.5" cy="8.5" r="1.5"></circle><polyline points="21 15 16 10 5 21"></polyline></svg></div>
                    <div class="dl-info"><h4>PNG</h4><p>Best for complex images, illustrations</p></div>
                </div>
            </div>
        </div>
    </div>

    <!-- MODAL 2: Select Page -->
    <div id="pageModal" class="modal-overlay" onclick="closeModal(event, 'pageModal')">
        <div class="modal-box" onclick="event.stopPropagation()">
            <div class="modal-title">Select page</div>
            <label class="modal-label" style="color: #cbd5e0;">All pages</label>
            <select class="modal-select">
                <option>Page 4</option>
            </select>
            <div class="page-list" style="background:#f1f5f9; border-radius: 15px; padding: 10px;">
                <div class="page-item"><div class="p-info"><div class="p-box"></div><div class="p-name">Page 1</div></div><div class="p-radio"></div></div>
                <div class="page-item"><div class="p-info"><div class="p-box"></div><div class="p-name">Page 2</div></div><div class="p-radio"></div></div>
                <div class="page-item"><div class="p-info"><div class="p-box"></div><div class="p-name">Page 3</div></div><div class="p-radio"></div></div>
                <div class="page-item selected"><div class="p-info"><div class="p-box"></div><div class="p-name">Page 4</div></div><div class="p-radio"></div></div>
            </div>
            <button class="btn-done" onclick="document.getElementById('pageModal').style.display='none'">Done</button>
        </div>
    </div>

    <script>
        function openDownloadModal() {
            document.getElementById('downloadModal').style.display = 'flex';
        }

        function gotoStep2() {
            document.getElementById('downloadModal').style.display = 'none';
            document.getElementById('pageModal').style.display = 'flex';
        }

        function closeModal(e, id) {
            if (e.target.id === id) {
                document.getElementById(id).style.display = 'none';
            }
        }

        // --- DYNAMIC CALENDAR LOGIC ---
        document.addEventListener('DOMContentLoaded', function() {
            const monthDisplay = document.getElementById('monthDisplay');
            const calendarGrid = document.getElementById('calendarGrid');
            const prevMonthBtn = document.getElementById('prevMonth');
            const nextMonthBtn = document.getElementById('nextMonth');
            const scheduleDayName = document.getElementById('scheduleDayName');

            let currentDate = new Date();

            // Demo events bound to specific dates
            const dummyEvents = {
                3: { title: "Maths Class", subtitle: "Teacher 2", color: "f472b6" },
                12: { title: "Science Lab", subtitle: "Teacher 4", color: "3b82f6" },
                22: { title: "History Exam", subtitle: "Teacher 1", color: "f97316" },
            };

            function renderCalendar() {
                const year = currentDate.getFullYear();
                const month = currentDate.getMonth();
                const today = new Date();

                const monthNames = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
                const dayNames = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
                
                monthDisplay.textContent = `${monthNames[month]} ${year}`;
                
                // Set Schedule sidebar title
                if(year === today.getFullYear() && month === today.getMonth()) {
                    scheduleDayName.textContent = `${monthNames[month]} ${today.getDate()}, ${dayNames[today.getDay()]}`;
                } else {
                    const firstDayOfMonth = new Date(year, month, 1);
                    scheduleDayName.textContent = `${monthNames[month]} 1, ${dayNames[firstDayOfMonth.getDay()]}`;
                }

                // Inject Labels
                let gridHtml = `
                    <div class="day-label">Monday</div>
                    <div class="day-label">Tuesday</div>
                    <div class="day-label">Wednesday</div>
                    <div class="day-label">Thursday</div>
                    <div class="day-label">Friday</div>
                    <div class="day-label">Saturday</div>
                    <div class="day-label">Sunday</div>
                `;

                // Calculate padding cells
                const firstDayIndex = new Date(year, month, 1).getDay(); 
                let startDay = firstDayIndex === 0 ? 6 : firstDayIndex - 1; // Align to Monday start

                const daysInMonth = new Date(year, month + 1, 0).getDate();
                const prevMonthDays = new Date(year, month, 0).getDate();

                // Generate Previous month inactive days
                for (let i = startDay; i > 0; i--) {
                    gridHtml += `<div class="cal-cell inactive">${prevMonthDays - i + 1}</div>`;
                }

                // Generate Current month days
                for (let i = 1; i <= daysInMonth; i++) {
                    let cellClass = "cal-cell";
                    let isToday = (i === today.getDate() && month === today.getMonth() && year === today.getFullYear());
                    
                    if (isToday) cellClass += " today-cell";

                    let dayContent = `${i}`;
                    
                    if (dummyEvents[i]) {
                        // Days that have an event
                        const evt = dummyEvents[i];
                        dayContent = `
                            <div class="date-num">
                                <div class="circle-num" style="background:#6366f1;">${i}</div>
                            </div>
                            <div class="event-box" style="border-left-color: #${evt.color}; background: #${evt.color}15;">
                                <h5>${evt.title}</h5>
                                <p>${evt.subtitle}</p>
                            </div>
                        `;
                    } else if (isToday) {
                        // Today with no event
                        dayContent = `<div class="date-num"><div class="circle-num" style="background:var(--primary);">${i}</div></div>`;
                    }

                    gridHtml += `<div class="${cellClass}">${dayContent}</div>`;
                }

                // Generate Next month inactive days to fill rows
                const totalCells = startDay + daysInMonth;
                const nextDays = Math.ceil(totalCells / 7) * 7 - totalCells;

                for (let i = 1; i <= nextDays; i++) {
                    gridHtml += `<div class="cal-cell inactive">${i}</div>`;
                }

                calendarGrid.innerHTML = gridHtml;
            }

            prevMonthBtn.addEventListener('click', () => {
                currentDate.setMonth(currentDate.getMonth() - 1);
                renderCalendar();
            });

            nextMonthBtn.addEventListener('click', () => {
                currentDate.setMonth(currentDate.getMonth() + 1);
                renderCalendar();
            });

            // Initial render
            renderCalendar();
        });
    </script>
@endsection
