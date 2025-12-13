<?php

use App\Http\Controllers\Admin\Blog\CategoryController;
use App\Http\Controllers\Admin\Blog\PostController as BlogPostController;
use App\Http\Controllers\Admin\BlogController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\UserAuthController;
use App\Http\Controllers\PublicBlogController;
use App\Http\Controllers\SubscriptionController;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\FlightController;
use App\Http\Controllers\SitemapController;
use Illuminate\Support\Facades\DB;

Route::get('/sitemap', [SitemapController::class, 'index']);

Route::get('/', function () {
    return view('welcome');
});

Route::post('/subscribe', [SubscriptionController::class, 'store'])->name('subscribe');

Route::view('/upload', 'upload')->name('upload');

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
Route::view('/contact', 'contact')->name('contact');
Route::get('/blog', [PublicBlogController::class, 'index'])->name('blog.index');
Route::get('/blog/search', [PublicBlogController::class, 'search'])->name('blog.search');
Route::get('/blog/{category}', [PublicBlogController::class, 'showCategory'])->name('blog.category');
Route::get('/blog/{category}/{slug}', [PublicBlogController::class, 'show'])->name('blog.show');
Route::get('/contact', [ContactController::class, 'create'])->name('contact.create');

// Route to handle the form submission and save data
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

// User Auth Routes
Route::get('/login', [UserAuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [UserAuthController::class, 'login'])->name('login.post');

Route::get('/register', [UserAuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [UserAuthController::class, 'register'])->name('register.post');

Route::get('/logout', [UserAuthController::class, 'logout'])->name('logout');


Route::prefix('admin')->name('admin.')->group(function () {
    // Admin login
    Route::get('/login', [AdminController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AdminController::class, 'login'])->name('login.post');

    Route::middleware('admin.auth')->group(function () {
        // Home redirect for /admin
        Route::get('/', [AdminController::class, 'adminHome'])->name('welcome');

        // Admin dashboard
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

        // Admin logout
        Route::get('/logout', [AdminController::class, 'logout'])->name('logout');
        
        // Messages
        Route::get('/messages', [ContactController::class, 'index'])->name('messages.index');
        Route::post('/contacts/{contactMessage}/mark-read', [ContactController::class, 'markAsRead'])->name('contacts.mark-read');
        Route::delete('/contacts/{contactMessage}', [ContactController::class, 'destroy'])->name('contacts.destroy');

        // Blog Posts and Categories
        Route::prefix('blog')->name('blog.')->group(function () {
            Route::get('/posts/drafts', [BlogPostController::class, 'drafts'])->name('posts.drafts');
            Route::resource('posts', BlogPostController::class)->except(['show']);
            Route::resource('categories', CategoryController::class)->except(['show']);
            Route::post('/AddNewPost', [BlogPostController::class, 'AddNewPost'])->name('AddNewPost');
            Route::get('/allposts', [BlogController::class, 'allposts'])->name('allposts');
            Route::post('/posts/{post}/toggle-publish', [BlogPostController::class, 'togglePublish'])->name('posts.toggle-publish');
        });

        // Test route for Cloudinary widget
        Route::get('/test-cloudinary', function () {
            return view('admin.test-cloudinary');
        })->name('test-cloudinary');
        // Subscriptions routes (from my previous admin.php changes)
        Route::get('subscriptions', [AdminController::class, 'subscriptions'])->name('subscriptions.index');
        Route::get('subscriptions/export', [AdminController::class, 'exportSubscriptions'])->name('subscriptions.export');
        Route::delete('subscriptions/{subscription}', [AdminController::class, 'destroySubscription'])->name('subscriptions.destroy');
        Route::delete('subscriptions', [AdminController::class, 'destroyMultipleSubscriptions'])->name('subscriptions.destroy.multiple');
    });
});
