<?php

use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/insc', function () {
    return view('insc');
})->name('insc');

Route::get('/login', [LoginController::class,'showLoginForm'])->name('login');

Route::post('/login', [LoginController::class, 'login']);



Route::get('/index', function () {
    return view('index');
})->name('index');;

Route::get('/contact', function () {
    return view('contact');
});


Route::get('/admindashboard', function () {
    return view('admindashboard');
})->name('admindashboard');;
