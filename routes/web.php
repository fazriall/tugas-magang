<?php

use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
// web.php
use App\Http\Controllers\TransportasiController;
use App\Http\Controllers\PenginapanController;
use App\Http\Controllers\Admin\PesananController;


// Route untuk Transportasi
Route::get('/transportasi', [TransportasiController::class, 'index'])->name('transportasi.index');
Route::get('/transportasi/transpadang', [TransportasiController::class, 'transpadang'])->name('transportasi.transpadang');
// Penginapan
Route::get('/sewa', [PenginapanController::class, 'index'])->name('sewa.index');
Route::get('/sewa/{sewa}', [PenginapanController::class, 'show'])->name('sewa.show');

Auth::routes(['register' => false]);

Route::group(['middleware' => ['is_admin','auth'], 'prefix' => 'admin', 'as' => 'admin.'], function() {
    Route::get('dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
    // booking
    Route::resource('bookings', \App\Http\Controllers\Admin\BookingController::class)->only(['index', 'destroy']);
    // travel packages
    Route::resource('travel_packages', \App\Http\Controllers\Admin\TravelPackageController::class)->except('show');
    Route::resource('travel_packages.galleries', \App\Http\Controllers\Admin\GalleryController::class)->except(['create', 'index','show']);
    // Penginapan
    Route::resource('penginapans', \App\Http\Controllers\Admin\PenginapanController::class)->except('show');
    Route::resource('penginapans.galeries', \App\Http\Controllers\Admin\GaleriController::class)->except(['create', 'index', 'show']);
    // blogs
    Route::resource('blogs', \App\Http\Controllers\Admin\BlogController::class)->except('show');
    // categories
    Route::resource('categories', \App\Http\Controllers\Admin\CategoryController::class)->except('show');
    // locations
    Route::resource('locations', \App\Http\Controllers\Admin\LocationController::class)->except('show');
    // profile
    Route::get('users', [\App\Http\Controllers\UserController::class, 'index'])->name('users.index');
    Route::get('profile', [\App\Http\Controllers\ProfileController::class, 'show'])->name('profile.show');
    Route::put('profile', [\App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
});

Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('homepage');
// travel packages

Route::get('travel-packages',[\App\Http\Controllers\TravelPackageController::class, 'index'])->name('travel_package.index');
Route::get('travel-packages/{travel_package:slug}',[\App\Http\Controllers\TravelPackageController::class, 'show'])->name('travel_package.show');
Route::get('penginapans', [\App\Http\Controllers\PenginapanController::class, 'index'])->name('penginapan.index');
Route::get('penginapans/{penginapan:slug}', [\App\Http\Controllers\PenginapanController::class, 'show'])->name('penginapan.show');

// location
Route::get('Location', [\App\Http\Controllers\LokasiWisatacontroller::class, 'index'])->name('location.index');
// contact
Route::get('contact', function() {
    return view('contact');
})->name('contact');
// blogs
Route::get('blogs', [\App\Http\Controllers\BlogController::class, 'index'])->name('blog.index');
Route::get('blogs/{blog:slug}', [\App\Http\Controllers\BlogController::class, 'show'])->name('blog.show');
Route::get('blogs/category/{category:slug}', [\App\Http\Controllers\BlogController::class, 'category'])->name('blog.category');

// booking
Route::post('booking', [App\Http\Controllers\BookingController::class, 'store'])->name('booking.store');
