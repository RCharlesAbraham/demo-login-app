<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\AuthController;

$authView = function (string $view) {
    return response()
        ->view($view)
        ->header('Cache-Control', 'no-store, no-cache, must-revalidate, max-age=0')
        ->header('Pragma', 'no-cache')
        ->header('Expires', 'Sat, 01 Jan 1990 00:00:00 GMT');
};

Route::get('/', function () {
    return view('auth.home');
})->name('home');

Route::get('/home', function () {
    return redirect('/');
});

Route::get('/login', function () use ($authView) {
    return $authView('auth.login');
})->name('login');

Route::get('/forgot-password', function () use ($authView) {
    return $authView('auth.forgot-password');
})->name('password.request');

Route::get('/register', function () use ($authView) {
    return $authView('auth.register');
})->name('register');

Route::get('/account', function () {
    return view('auth.account');
})->name('account');

Route::get('/account-new', [AccountController::class, 'index'])->name('account.new');
Route::post('/account-update', [AccountController::class, 'update'])->name('account.update');
Route::post('/account-password', [AccountController::class, 'changePassword'])->name('account.password');

use App\Http\Controllers\DashboardController;

Route::get('/dashboard-1', [DashboardController::class, 'index'])->name('dashboard.1');

Route::get('/dashboard', function () {
    return redirect()->route('dashboard.1');
});

Route::get('/dashboard-2', function () {
    return view('auth.dashboard-2');
})->name('dashboard.2');

Route::get('/quiz', function () {
    return view('auth.quiz');
})->name('quiz');

Route::get('/wallet-address', function () {
    return view('auth.wallet-address');
})->name('wallet.address');

Route::get('/favorites', function () {
    return view('auth.favorites');
})->name('favorites');

Route::get('/info/{topic}', function (string $topic) {
    $pages = [
        'teach' => [
            'title' => 'Teach on IL2',
            'description' => 'Share your knowledge as an IL2 instructor and create impactful courses.',
        ],
        'about' => [
            'title' => 'About Us',
            'description' => 'Learn how IL2 helps students and professionals grow with practical learning.',
        ],
        'contact' => [
            'title' => 'Contact Us',
            'description' => 'Get in touch with our team for account, course, or technical support.',
        ],
        'support' => [
            'title' => 'Help and Support',
            'description' => 'Find answers to common questions and support resources.',
        ],
        'terms' => [
            'title' => 'Terms',
            'description' => 'Review the terms that govern your use of the IL2 platform.',
        ],
        'privacy' => [
            'title' => 'Privacy Policy',
            'description' => 'Understand how IL2 collects, uses, and protects your data.',
        ],
        'cookies' => [
            'title' => 'Cookies Policy',
            'description' => 'See how cookies are used to improve your IL2 experience.',
        ],
        'careers' => [
            'title' => 'Career',
            'description' => 'Explore opportunities to join and grow with the IL2 team.',
        ],
    ];

    if (! array_key_exists($topic, $pages)) {
        abort(404);
    }

    return view('auth.info', [
        'title' => $pages[$topic]['title'],
        'description' => $pages[$topic]['description'],
    ]);
})->name('info.page');

Route::get('/calendar', function () {
    return view('auth.calendar');
})->name('calendar');

Route::get('/learning', function () {
    return view('auth.learning');
})->name('learning');

Route::get('/learning-p2', function () {
    return view('auth.learning-p2');
})->name('learning.p2');

Route::get('/payment-method', function () {
    return view('auth.payment-method');
})->name('payment.method');

Route::get('/shopping-cart', function () {
    return view('auth.shopping-cart');
})->name('shopping.cart');

Route::get('/transaction', function () {
    return view('auth.transaction');
})->name('transaction');

Route::get('/refund', function () {
    return view('auth.refund');
})->name('refund');

Route::get('/courses', function () {
    return view('auth.courses');
})->name('courses');

Route::get('/search', function () {
    return view('auth.search');
})->name('search');

Route::get('/free-courses', function () {
    return view('auth.free-courses');
})->name('free.courses');

Route::get('/course-detail', function () {
    return view('auth.course-detail');
})->name('course.detail');

Route::get('/change-password', function () {
    return view('auth.change-password');
})->name('password.change');

Route::get('/reset-password', function () {
    return view('auth.reset-password');
})->name('password.reset');

Route::get('/verify', function () {
    return view('auth.verify');
})->name('verification.notice');

// POST Routes for Authenticaton
Route::post('/login', [AuthController::class, 'loginPost'])->name('login.post');
Route::post('/register', [AuthController::class, 'registerPost'])->name('register.post');
Route::post('/forgot-password', [AuthController::class, 'forgotPasswordPost'])->name('password.email');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/category', function () {
    return view('auth.category');
})->name('category');

Route::get('/all', function () {
    return view('auth.all');
})->name('all');

Route::get('/modules', function () {
    return view('auth.modules');
})->name('modules');

Route::get('/recommendations', function () {
    return view('auth.recommendations');
})->name('recommendations');

Route::get('/testimonials', function () {
    return view('auth.testimonials');
})->name('testimonials');

Route::get('/reviews', function () {
    return view('auth.reviews');
})->name('reviews');
