@extends('layouts.dashboard')

@section('title', 'Exam | IL² RMUTTO')

@push('styles')
<style>


        

        /* ─── MAIN CONTENT ─── */
        .main-card { background: #fff; border-radius: 30px; padding: 40px; box-shadow: 0 4px 25px rgba(0,0,0,0.02); }

        /* HERO SECTION */
        .course-hero { display: grid; grid-template-columns: 1fr 1fr; gap: 50px; margin-bottom: 40px; }
        
        .hero-left .teacher-row { display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 25px; }
        .t-info { display: flex; align-items: center; gap: 12px; }
        .t-avatar { width: 44px; height: 44px; border-radius: 50%; background: #6b7280; }
        .t-content p { font-size: 11px; color: #94a3b8; margin: 0; }
        .t-content span { color: #2563eb; font-weight: 700; cursor: pointer; }
        .t-meta { display: flex; gap: 15px; margin-top: 4px; font-size: 11px; color: #94a3b8; }
        .t-meta span { display: flex; align-items: center; gap: 4px; }
        .t-meta svg { width: 12px; height: 12px; }

        .hero-left-actions { display: flex; gap: 10px; }
        .btn-outline-sm { padding: 6px 20px; border: 1px solid #e2e8f0; border-radius: 20px; font-size: 11px; font-weight: 700; color: #64748b; text-decoration: none; }

        .title-price-row { display: flex; justify-content: space-between; align-items: center; margin-bottom: 15px; }
        .title-price-row h1 { font-size: 32px; font-weight: 800; margin: 0; color: #1e293b; }
        .price-text { font-size: 28px; font-weight: 800; color: #f97316; }

        .update-date { font-size: 11px; color: #94a3b8; margin-bottom: 20px; }
        .course-short-desc { font-size: 14px; color: #64748b; line-height: 1.6; margin-bottom: 25px; }
        
        .date-range { font-size: 12px; color: #64748b; margin-bottom: 30px; }
        .date-range span { color: #2563eb; font-weight: 700; font-size: 13px; margin: 0 15px 0 5px; }

        .hero-btns { display: flex; gap: 12px; }
        .btn-dark-blue { padding: 12px 30px; border-radius: 10px; font-size: 14px; font-weight: 700; color: #fff; background: #003a70; text-decoration: none; border: none; cursor: pointer; }
        .btn-fill-blue { padding: 12px 30px; border-radius: 10px; font-size: 14px; font-weight: 700; color: #fff; background: #004d95; text-decoration: none; }

        .hero-right .video-preview { width: 100%; aspect-ratio: 1.6; background: linear-gradient(180deg, #c8cdd6 0%, #6b7280 100%); border-radius: 20px; position: relative; display: flex; align-items: center; justify-content: center; }
        .pause-btn { background: #e11d1d; border-radius: 50px; width: 72px; height: 36px; display: flex; align-items: center; justify-content: center; gap: 6px; cursor: pointer; box-shadow: 0 4px 15px rgba(225,29,29,0.4); transition: transform 0.2s ease; }
        .pause-btn:hover { transform: scale(1.08); }
        .pause-bar { width: 4px; height: 14px; background: #ffffff; border-radius: 2px; }

        /* ─── TAB NAVIGATION ─── */
        .tab-strip { display: flex; justify-content: center; gap: 60px; border-bottom: 1px solid #f1f5f9; margin-bottom: 50px; }
        .tab-item { padding: 15px 0; font-size: 13px; font-weight: 500; color: #94a3b8; border-bottom: 3px solid transparent; cursor: pointer; transition: 0.2s; text-decoration: none; }
        .tab-item:hover { color: #1e293b; }
        .tab-item.active { color: #1e293b; border-bottom-color: var(--primary); font-weight: 600; background: #fff; border-radius: 10px 10px 0 0; box-shadow: 0 -4px 10px rgba(0,0,0,0.02); padding-left: 30px; padding-right: 30px; position: relative; bottom: -1px; }

        /* TAB CONTENT */
        .tab-panels { min-height: 400px; }
        .pane { display: none; }
        .pane.active { display: block; }

        /* OUTCOMES DESIGN */
        .outcomes-content { max-width: 900px; }
        .outcomes-content h2 { font-size: 16px; font-weight: 800; color: #1e293b; margin-bottom: 25px; }
        .outcomes-content p { font-size: 13.5px; color: #475569; line-height: 1.6; margin-bottom: 20px; }
        .outcomes-content ul { list-style: none; padding: 0; }
        .outcomes-content li { font-size: 13.5px; color: #475569; margin-bottom: 12px; display: flex; gap: 10px; align-items: flex-start; }
        .outcomes-content li::before { content: '•'; color: #000; font-weight: 900; font-size: 18px; line-height: 1; }

        /* ─── FOOTER ─── */
        footer { grid-column: 2; border-radius: 26px; box-sizing: border-box; background: #fff; padding: 60px 40px; border-top: 1px solid #f1f5f9; display: flex; justify-content: center; width: 100%; margin-top: 10px; }
        .footer-inner { max-width: 1400px; width: 100%; display: grid; grid-template-columns: 1.5fr repeat(2, 1fr) 1.2fr; gap: 40px; }
        .f-logo-wrap { width: 60px; height: 60px; border-radius: 50%; background: #f8fafc; display: flex; align-items: center; justify-content: center; margin-bottom: 20px; border: 1px solid #e2e8f0; }
        .f-logo-wrap img { height: 35px; }
        .f-brand p { font-size: 14px; color: #64748b; line-height: 1.6; }
        .f-col h4 { font-size: 15px; font-weight: 800; margin-bottom: 25px; color: var(--text-dark); }
        .f-col ul { list-style: none; padding: 0; }
        .f-col li { margin-bottom: 15px; }
        .f-col a { font-size: 14px; color: #64748b; text-decoration: none; transition: 0.2s; }
        .f-col a:hover { color: var(--primary); }
        .f-right-col { text-align: right; }
        .lang-select { padding: 10px 20px; border-radius: 10px; border: 1px solid #e2e8f0; font-size: 13px; color: #475569; margin-bottom: 25px; outline: none; }
        .socials { display: flex; gap: 15px; justify-content: flex-end; margin-bottom: 30px; }
        .social-link { width: 36px; height: 36px; border-radius: 50%; background: #f1f5f9; display: flex; align-items: center; justify-content: center; transition: 0.2s; }
        .social-link img { width: 18px; height: 18px; }
        .apps { display: flex; gap: 10px; justify-content: flex-end; }
        .apps img { height: 32px; }
</style>
@endpush

@section('dashboard-content')
<div class="dashboard-page-content">
        

        <main class="main-card">
            <div class="course-hero">
                <div class="hero-left">
                    <div class="teacher-row">
                        <div class="t-info">
                            <div class="t-avatar"></div>
                            <div class="t-content">
                                <p>Created by : <span>Teacher</span></p>
                                <div class="t-meta">
                                    <span>⭐ 0 Ratings</span>
                                    <span>👥 0 Students</span>
                                </div>
                            </div>
                        </div>
                        <div class="hero-left-actions">
                            <a href="{{ route('favorites') }}" class="btn-outline-sm">Save</a>
                            <a href="{{ route('recommendations') }}" class="btn-outline-sm">Share</a>
                        </div>
                    </div>

                    <div class="title-price-row">
                        <h1>Mathematic Class</h1>
                        <span class="price-text">$10.99</span>
                    </div>
                    <div class="update-date">📅 Updated date : 26 June 2023</div>
                    <p class="course-short-desc">Tutor simulates a physical learning environment with interactive learning that allows instructors and students to engage with one another.</p>
                    
                    <div class="date-range">
                        Course start date : <span>26 June 2023</span>
                        Course end date : <span>26 June 2023</span>
                    </div>

                    <div class="hero-btns">
                        <a href="{{ route('shopping.cart') }}" class="btn-dark-blue" style="text-decoration:none;">Subscribe Now</a>
                        <a href="{{ route('shopping.cart') }}" class="btn-dark-blue" style="background: #002b55; text-decoration:none;">Add to Cart</a>
                    </div>
                </div>

                <div class="hero-right">
                    <div class="video-preview">
                        <div class="pause-btn"><div class="pause-bar"></div><div class="pause-bar"></div></div>
                    </div>
                </div>
            </div>

            <div class="tab-strip">
                <a href="{{ route('course.detail') }}" class="tab-item">About</a>
                <div class="tab-item active">Outcomes</div>
                <a href="{{ route('modules') }}" class="tab-item">Modules</a>
                <a href="{{ route('recommendations') }}" class="tab-item">Recommendations</a>
                <a href="{{ route('testimonials') }}" class="tab-item">Testimonials</a>
                <a href="{{ route('reviews') }}" class="tab-item">Reviews</a>
            </div>

            <div class="tab-panels">
                <div class="pane active" id="pane-outcomes">
                    <div class="outcomes-content">
                        <h2>Build your Marketing expertise</h2>
                        <p>This course is part of the Google Digital Marketing & E-commerce Professional Certificate When you enroll in this course, you’ll also be enrolled in this Professional Certificate</p>
                        <ul>
                            <li>Learn new concepts from industry experts</li>
                            <li>Gain a foundational understanding of a subject or tool</li>
                            <li>Develop job-relevant skills with hands-on projects</li>
                            <li>Earn a shareable career certificate from Google</li>
                        </ul>
                    </div>
                </div>
            </div>
        </main>

        
    </div>
@endsection
