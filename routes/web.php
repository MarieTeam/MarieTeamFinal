<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BateauController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Horaire;
use App\Http\Controllers\LiaisonController;
use App\Http\Controllers\PortController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RecapitulatifController;
use App\Http\Controllers\TarifController;
use App\Http\Controllers\ReservationController;
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

Route::get('/', [HomeController::class, 'getAllWeather'])->name('home');
Route::get('/horaires', [Horaire::class, 'getallHoraire'])->name('horaires');
Route::get('/tarifs', [TarifController::class, 'viewTarif'])->name('tarifs');

Route::get('/reserver/{selectDepart?}/{selectArrivee?}', [ReservationController::class, 'index'])->name('reservations');
Route::post('/reservations/checkAvailability', [ReservationController::class, 'checkAvailability'])->name('reservations.checkAvailability');
Route::post('/reservations', [ReservationController::class, 'store'])->name('reservations.store');
Route::get('/reservations', [ReservationController::class, 'getAvailableBoats'])->name('reservations.getAvailableBoats');
Route::post('/reservations/update', [ReservationController::class,'updateAjax'])->name('reservations.updateAjax');
Route::get('/recapitulatif', [RecapitulatifController::class, 'index'])->name('recapitulatif');


Route::get('/admin', [DashboardController::class, 'index'])->middleware(['auth'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    // Ports
    Route::get('/admin/ports/{port}/edit', [PortController::class, 'edit'])->name('ports.edit');
    Route::put('/ports/{port}', [PortController::class, 'update'])->name('ports.update');
    Route::delete('/ports/{port}', [PortController::class, 'destroy'])->name('ports.destroy');
    // Bateaux
    Route::get('/bateaux/{bateau}/edit', [BateauController::class, 'edit'])->name('bateaux.edit');
    Route::put('/bateaux/{bateau}', [BateauController::class, 'update'])->name('bateaux.update');
    Route::delete('/bateaux/{bateau}', [BateauController::class, 'destroy'])->name('bateaux.destroy');
    //Liaison
    Route::get('/liaisons/{liaison}/edit', [LiaisonController::class, 'edit'])->name('liaisons.edit');
    Route::put('/liaisons/{liaison}', [LiaisonController::class, 'update'])->name('liaisons.update');
    Route::delete('/liaisons/{liaison}', [LiaisonController::class, 'destroy'])->name('liaisons.destroy');

    Route::resource('ports', PortController::class);
    Route::resource('bateaux', BateauController::class);
    Route::resource('liaisons', LiaisonController::class);
});



require __DIR__.'/auth.php';
