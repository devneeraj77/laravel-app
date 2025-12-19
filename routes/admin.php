<?php

use App\Http\Controllers\Admin\FaqController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PostController;


Route::prefix('admin')->name('admin.')->group(function () {
    // Blog Posts
    Route::resource('posts', PostController::class);
    Route::post('posts/{post}/toggle-publish', [PostController::class, 'togglePublish'])->name('posts.toggle-publish');

    // FAQs for a Post
   
    // Image Assets
    Route::post('image-assets', [\App\Http\Controllers\Admin\ImageAssetController::class, 'store'])->name('image-assets.store');
});
