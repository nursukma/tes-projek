<?php

use App\Http\Controllers\TesController;
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
    return view('index');
});

Route::post('/submit-form', [TesController::class, 'prosesPerulangan'])->name('submit.form');

Route::get('raja-ongkir', [TesController::class, 'indexRajaOngkir']);
Route::post('raja-ongkir', [TesController::class, 'biayaRajaOngkir'])->name('cek-ongkir');
