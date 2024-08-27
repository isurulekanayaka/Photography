<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
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

Route::get('/', function () {
    return view('photographer.gallery');
});

// Route::get('/home', function () {
//     return view('user.home');
// })->name('home');

Route::get('/photographers',function(){
    return view('user.photographers');
});

Route::get('/profile', function () {
    return view('user.profile');
});

Route::get('/about', function () {
    return view('user.about');
});

Route::get('/contact', function () {
    return view('user.contact');
});

// Route::get('/login', function () {
//     return view('auth.login');
// })->name('login');

// Route::get('/register', function () {
//     return view('auth.register');
// });


Route::get('/protographer-profile', function () {
    return view('photographer.profile');
});




// Show the registration form
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');

// Handle registration form submission
Route::post('/register', [AuthController::class, 'register']);

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


// User Home loard
Route::get('/home', [PhotographyController::class, 'home'])->name('home');

// Photographer Profile
Route::get('/photographer/profile/{id}', [PhotographyController::class, 'show'])->name('photographer.profile');


// photographer routes
Route::middleware(['role:photographer'])->group(function () {
    Route::get('/inbox', [PhotographyController::class, 'inbox'])->name('photographer.inbox');
    Route::get('/update-profile', [PhotographyController::class, 'profile'])->name('photographer.update-profile');
    Route::get('/update-gallery', [PhotographyController::class, 'gallery'])->name('photographer.update-gallery');
});

// Route::get('/inbox', function () {
//     return view('photographer.inbox');
// })->middleware('role:photographer');

