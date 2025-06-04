<?php

use App\Http\Controllers\AdminReservationController;
use App\Http\Controllers\AdminAvisController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminOffreController;
use App\Http\Controllers\AvisController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\ServiceClientController;
use App\Http\Controllers\SignupController;
use App\Http\Controllers\VehiculeController;
use App\Models\Avis;
use App\Models\Offre;
use Illuminate\Support\Facades\Route;
use App\Models\Vehicule;


Route::get('/', function () {
    $vehicules = Vehicule::where('disponibilite', true)->get();
    $avis = Avis::with('client')->get();

    if (request()->has('vehicule')) {
        $selectedVehicule = Vehicule::find(request('vehicule'));
    }
    return view('welcome',compact('vehicules','avis'));
});

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');

Route::post('/login', [LoginController::class, 'login']);

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


Route::get('/index', function () {
    $vehicules = Vehicule::where('disponibilite', true)->get();
    $avis = Avis::with('client')->get();
    $offre = Offre::where('desponibilite', 'oui')->first();


    $selectedVehicule = null;
    if (request()->has('vehicule')) {
        $selectedVehicule = Vehicule::find(request('vehicule'));
    }

    return view('index', compact('vehicules', 'avis', 'selectedVehicule', 'offre'));
})->name('index');


Route::resource('vehicules', VehiculeController::class);
Route::patch('/vehicules/{vehicule}/toggle-availability', [VehiculeController::class, 'toggleAvailability'])->name('vehicules.toggle-availability');


Route::get('/insc', [SignupController::class, 'showSignupForm'])->name('insc');

Route::post('/insc', [SignupController::class, 'create']);


Route::get('/reservation/create', [ReservationController::class, 'create'])->name('reservation.create');
Route::post('/reservation', [ReservationController::class, 'store'])->name('reservation.store');
Route::get('/reservation/{id}', [ReservationController::class, 'show'])->name('reservation.show');

Route::get('/reservation/vehicle/{vehicule}', function ($vehicule) {
    return redirect()->route('index', ['vehicule' => $vehicule]);
})->name('reservation.select-vehicle');

Route::get('/reservations/{id}', [ReservationController::class, 'show'])->name('reservations.show');
Route::get('/reservation/{id}/download', [ReservationController::class, 'downloadPDF'])->name('reservation.download');

Route::post('/avis', [AvisController::class, 'store'])->name('avis.store')->middleware('auth');

// Dans le groupe admin
Route::get('/messages', [ServiceClientController::class, 'index'])->name('admin.messages');
Route::delete('/messages/{message}', [ServiceClientController::class, 'destroy'])->name('admin.messages.destroy');

// Routes contact
Route::get('/contact', [ServiceClientController::class, 'showContactForm'])->name('contact.form');
Route::post('/contact', [ServiceClientController::class, 'store'])->name('contact.store');

//end clien

//admin
// In your web.php routes file
Route::prefix('admin')->group(function () {
    // Dashboard
    Route::get('/main', [AdminController::class, 'dashboard'])->name('admin.dashboard');

    // Cars (Véhicules)
    Route::get('/cars', [VehiculeController::class, 'index'])->name('admin.cars');
    Route::post('/cars', [VehiculeController::class, 'store'])->name('admin.cars.store');
    Route::get('/cars/{id}/edit', [VehiculeController::class, 'edit'])->name('admin.cars.edit');
    Route::put('/cars/{id}', [VehiculeController::class, 'update'])->name('admin.cars.update');
    Route::delete('/cars/{id}', [VehiculeController::class, 'destroy'])->name('admin.cars.destroy');

    Route::get('/messages', [ServiceClientController::class, 'index'])->name('admin.messages');
    Route::get('/messages/{message}', [ServiceClientController::class, 'show'])->name('admin.messages.show');
    Route::delete('/messages/{message}', [ServiceClientController::class, 'destroy'])->name('admin.messages.destroy');


    // Clients
    Route::get('/clients', [ClientController::class, 'index'])->name('admin.clients');
    Route::post('/clients', [ClientController::class, 'store'])->name('admin.clients.store');
    Route::get('/clients/{id}/edit', [ClientController::class, 'edit'])->name('admin.clients.edit');
    Route::put('/clients/{id}', [ClientController::class, 'update'])->name('admin.clients.update');
    Route::delete('/clients/{id}', [ClientController::class, 'destroy'])->name('admin.clients.destroy');

    // Avis
    Route::get('/avis', [AdminAvisController::class, 'index'])->name('admin.avis');
    Route::delete('/avis/{id}', [AdminAvisController::class, 'destroy'])->name('admin.avis.destroy');

    // Offres
    Route::get('/offres', [AdminOffreController::class, 'index'])->name('offres.index');
    Route::post('/offres', [AdminOffreController::class, 'store'])->name('offres.store');
    Route::get('/offres/{id}/edit', [AdminOffreController::class, 'edit'])->name('offres.edit');
    Route::put('/offres/{id}', [AdminOffreController::class, 'update'])->name('offres.update');
    Route::delete('/offres/{id}', [AdminOffreController::class, 'destroy'])->name('offres.destroy');

    // Réservations
    Route::get('/reservations', [AdminReservationController::class, 'index'])->name('admin.reservations.index');
    Route::get('/reservations/create', [AdminReservationController::class, 'create'])->name('admin.reservations.create');
    Route::post('/reservations', [AdminReservationController::class, 'store'])->name('admin.reservations.store');
    Route::get('/reservations/{reservation}/edit', [AdminReservationController::class, 'edit'])->name('admin.reservations.edit');
    Route::put('/reservations/{reservation}', [AdminReservationController::class, 'update'])->name('admin.reservations.update');
    Route::delete('/reservations/{reservation}', [AdminReservationController::class, 'destroy'])->name('admin.reservations.destroy');
});
