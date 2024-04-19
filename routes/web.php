<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ListingController;
use App\Http\Controllers\ImageController;

// Listings
Route::get('/', [ListingController::class, 'index'])->name('listings.index');
Route::get('/listings/create', [ListingController::class, 'create'])->middleware('auth')->name('listings.create');
Route::post('/listings', [ListingController::class, 'store'])->middleware('auth')->name('listings.store');
Route::get('/listings/{listing}/edit', [ListingController::class, 'edit'])->middleware('auth')->name('listings.edit');
Route::put('/listings/{listing}', [ListingController::class, 'update'])->middleware('auth')->name('listings.update');
Route::delete('/listings/{listing}', [ListingController::class, 'destroy'])->middleware('auth')->name('listings.destroy');
Route::get('/listings/manage', [ListingController::class, 'manage'])->middleware('auth')->name('listings.manage');
Route::get('/listings/{listing}', [ListingController::class, 'show'])->name('listings.show');

// Images
Route::delete('/images/{image}', [ImageController::class, 'destroy'])->middleware('auth')->name('images.destroy');
Route::post('/listings/{listingId}/images', [ImageController::class, 'store'])->middleware('auth')->name('images.store');

// User Authentication
Route::get('/register', [UserController::class, 'create'])->middleware('guest')->name('register');
Route::post('/users', [UserController::class, 'store'])->name('users.store');
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');
Route::post('/users/authenticate', [UserController::class, 'authenticate'])->name('users.authenticate');
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth')->name('logout');

// Dashboard
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
