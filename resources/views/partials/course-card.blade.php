<div class="vertical-course-card">
    <a href="{{ route('course.detail') }}" style="text-decoration:none; color:inherit;">
        <div class="card-image-wrap">
            <img src="{{ $image ?? asset('images/learning.png') }}" alt="{{ $title ?? 'Course' }}">
            @if($badge ?? false)
                <span class="badge-orange-free">{{ $badge }}</span>
            @endif
        </div>
        <div class="vertical-card-body">
            <h4 class="vertical-card-title">{{ $title ?? 'Course Title' }}</h4>
            <p class="vertical-card-desc">{{ $description ?? 'Topic Description Lorem ipsum dolor sit amet...' }}</p>
            <div class="vertical-card-footer">
                <div class="footer-stats-wrap">
                    <div class="instructor-avatar-circle"></div>
                    <div class="stat-v-item">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
                        {{ $views ?? '4k' }}
                    </div>
                    <div class="stat-v-item">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                        {{ $students ?? '200' }}
                    </div>
                    <div class="stat-v-item">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="m12 2 3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
                        {{ $rating ?? '4.5' }}
                    </div>
                </div>
                <div class="heart-action-wrap">
                    <svg class="heart-action-btn {{ ($is_favorite ?? false) ? 'active' : '' }}" width="18" height="18" viewBox="0 0 24 24" fill="{{ ($is_favorite ?? false) ? 'currentColor' : 'none' }}" stroke="currentColor" stroke-width="2.5"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l8.78-8.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/></svg>
                </div>
            </div>
        </div>
    </a>
</div>
