<?php

use App\Http\Controllers\Horaire;
use App\Http\Controllers\TarifController;
use App\Http\Controllers\ReservationController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', [App\Http\Controllers\HomeController::class, 'getAllWeather'])->name('indexMarieTeam');


Route::get('/horaires', [Horaire::class, 'getallHoraire']);

Route::get('/tarifs', [TarifController::class, 'viewTarif']);

Route::get('/toutLesBateaux', [ReservationController::class , 'Bateauxrecherche'])->name('Bateauxrecherche');

Auth::routes();



