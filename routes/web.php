<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AdminAuthController;

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\ArticleController as AdminArticleController;
use App\Http\Controllers\Admin\GalleryController as AdminGalleryController;
use App\Http\Controllers\Admin\ProfileController as AdminProfileController;
use App\Http\Controllers\Admin\ContactMessageController;


/*
|--------------------------------------------------------------------------
| Website Publik
|--------------------------------------------------------------------------
*/

// Home
Route::get('/', [HomeController::class, 'index'])
    ->name('home');

// Profil Perusahaan
Route::get('/profil-perusahaan', [ProfileController::class, 'index'])
    ->name('profile');

// Produk / Layanan
Route::get('/produk-layanan', [ProductController::class, 'index'])
    ->name('products.index');

Route::get('/produk-layanan/{product}', [ProductController::class, 'show'])
    ->name('products.show');

// Artikel / Informasi Terkini
Route::get('/artikel', [ArticleController::class, 'index'])
    ->name('articles.index');

Route::get('/artikel/{article}', [ArticleController::class, 'show'])
    ->name('articles.show');

// Galeri Kegiatan
Route::get('/galeri', [GalleryController::class, 'index'])
    ->name('gallery.index');

Route::get('/galeri/{gallery}', [GalleryController::class, 'show'])
    ->name('gallery.show');

// Kontak Kami
Route::get('/kontak', [ContactController::class, 'index'])
    ->name('contact');

Route::post('/kontak', [ContactController::class, 'store'])
    ->name('contact.store');


/*
|--------------------------------------------------------------------------
| Login Admin
|--------------------------------------------------------------------------
*/

// Menampilkan halaman Login Admin
Route::get('/admin/login', [AdminAuthController::class, 'showLogin'])
    ->name('admin.login');

// Memproses Login Admin
Route::post('/admin/login', [AdminAuthController::class, 'login'])
    ->name('admin.login.submit');


/*
|--------------------------------------------------------------------------
| Admin
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        // Dashboard Admin
        Route::get('/dashboard', [AdminController::class, 'index'])
            ->name('dashboard');

        // Produk
        Route::resource('products', AdminProductController::class);

        // Artikel
        Route::resource('articles', AdminArticleController::class);

        // Galeri
        Route::resource('gallery', AdminGalleryController::class);

        // Profil Perusahaan
        Route::get('/profile', [AdminProfileController::class, 'edit'])
            ->name('profile.edit');

        Route::put('/profile', [AdminProfileController::class, 'update'])
            ->name('profile.update');

        // Pesan Masuk
        Route::get('/messages', [ContactMessageController::class, 'index'])
            ->name('messages.index');

        Route::get('/messages/{contactMessage}', [ContactMessageController::class, 'show'])
            ->name('messages.show');

        Route::delete('/messages/{contactMessage}', [ContactMessageController::class, 'destroy'])
            ->name('messages.destroy');
    });


/*
|--------------------------------------------------------------------------
| Authentication
|--------------------------------------------------------------------------
*/

require __DIR__.'/auth.php';