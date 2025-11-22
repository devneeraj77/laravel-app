<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserAuthController;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\FlightController;
use Illuminate\Support\Facades\DB;

Route::get('/', function () {
    return view('welcome');
});

// Route to show the form
Route::get('/flights', function () {
    return view('flights.index');
});
Route::get('/', [\App\Http\Controllers\TestimonialController::class, 'index']);


Route::get('scripts.db-check', function () {
    try {
        DB::connection()->getPdo();
        return response()->json(['status' => 'ok', 'message' => 'Database connected']);
    } catch (Exception $e) {
        return response()->json(['status' => 'error', 'message' => $e->getMessage()], 500);
    }
});

// Route to handle the search (POST request)
Route::post('/flights/search', [FlightController::class, 'search'])->name('flights.search');


Route::view('/privacy-policy', 'privacy-policy')->name('privacy');
Route::view('/terms', 'terms')->name('terms');
Route::view('/about', 'about')->name('about');
Route::view('/faqs', 'faqs')->name('faqs');
Route::view('/blog', 'blog')->name('blog');



// Redirect /admin to appropriate location
Route::get('/admin', function () {
    if (Session::has('admin_id')) {
        return redirect()->route('admin.dashboard');
    }
    return redirect()->route('admin.login');
});


// User Auth Routes
Route::get('/login', [UserAuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [UserAuthController::class, 'login'])->name('login.post');

Route::get('/register', [UserAuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [UserAuthController::class, 'register'])->name('register.post');

Route::get('/logout', [UserAuthController::class, 'logout'])->name('logout');

// Home redirect for /admin
Route::get('/admin', [AdminController::class, 'adminHome'])->name('admin.welcome');

// Admin login
Route::get('/admin/login', [AdminController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminController::class, 'login'])->name('admin.login.post');

// Admin dashboard (protected)
Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

// Admin logout
Route::get('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');
