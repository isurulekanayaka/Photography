<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\PhotographyController;

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

// Route::get('/', function () {
//     return redirect()->route('home');
// });

Route::get('/', function () {
    return view('admin.dashboard');
});

// Login Register Routes
// Show the registration form
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
// Handle registration form submission
Route::post('/register', [AuthController::class, 'register']);
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


Route::get('/photographers', [UserController::class, 'photographers'])->name('photographers');

Route::get('photographers/filter', [PhotographyController::class, 'filter'])->name('photographers.filter');
Route::get('photographers/search', [PhotographyController::class, 'search'])->name('photographers.search');

Route::get('/profile', [UserController::class, 'profile'])->name('profile');
Route::get('/about', [UserController::class, 'about'])->name('about');
Route::get('/contact', [UserController::class, 'contact'])->name('contact');


Route::post('appointments', [AppointmentController::class, 'store'])
    ->middleware('auth')
    ->name('appointments.store');

// User Home loard
Route::get('/home', [PhotographyController::class, 'home'])->name('home');

// Photographer Profile
Route::get('/photographer/profile/{id}', [PhotographyController::class, 'show'])->name('photographer.profile');


// photographer routes
Route::middleware(['role:photographer'])->group(function () {
    Route::get('/inbox', [AppointmentController::class, 'inbox'])->name('photographer.inbox');

    Route::get('approve/{id}', [AppointmentController::class, 'approve'])->name('photographer.approve');
    Route::post('/reject', [AppointmentController::class, 'reject'])->name('photographer.reject');

    Route::get('/update-profile', [PhotographyController::class, 'profile'])->name('photographer.update-profile');

    Route::post('/update-profile', [PhotographyController::class, 'profile_update'])->name('photographer.update-profile');

    Route::get('/update-gallery', [GalleryController::class, 'gallery'])->name('photographer.update-gallery');

    Route::post('/galleries', [GalleryController::class, 'store'])->name('galleries.store');
});

// Admin routes
Route::middleware(['role:admin'])->group(function () {
    Route::get('/admin-dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

    Route::get('/admin-category', [CategoryController::class, 'index'])->name('admin.category');
    Route::post('/categories/store', [CategoryController::class, 'store'])->name('categories.store');
    Route::delete('/categories/{id}', [CategoryController::class, 'destroy'])->name('categories.destroy');
    Route::put('categories/{category}', [CategoryController::class, 'update'])->name('categories.update');
});
