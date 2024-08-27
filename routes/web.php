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

Route::get('/', function () {
    return view('photographer.gallery');
});

Route::get('/home',function(){
    return view('user.home');
});
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

Route::get('/login', function () {
    return view('auth.login');
});

Route::get('/register', function () {
    return view('auth.register');
});

Route::get('/inbox', function () {
    return view('photographer.inbox');
});

Route::get('/protographer-profile', function () {
    return view('photographer.profile');
});