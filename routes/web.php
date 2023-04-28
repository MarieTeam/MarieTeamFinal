<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Horaire;
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


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
