<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\SignupController;
use App\Http\Controllers\VehiculeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});



Route::get('/login', [LoginController::class,'showLoginForm'])->name('login');

Route::post('/login', [LoginController::class, 'login']);



Route::get('/index', function () {
    return view('index');
})->name('index');;

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/admin/vehicules', function() {
    $vehicules = App\Models\Vehicule::all();
    return view('admin.adminCars', ['vehicules' => $vehicules]);
});

Route::resource('vehicules', VehiculeController::class);
Route::patch('/vehicules/{vehicule}/toggle-availability', [VehiculeController::class, 'toggleAvailability'])->name('vehicules.toggle-availability');

Route::get('/insc', [SignupController::class, 'showSignupForm'])->name('insc');

Route::post('/insc',[SignupController::class, 'create']);

Route::get('/admin', function () {
    return view('adminDashboard');
})->name('admindashboard');
