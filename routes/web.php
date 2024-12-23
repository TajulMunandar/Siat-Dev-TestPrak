<?php

use App\Http\Controllers\FormController;
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


Route::get('/', [FormController::class, 'index']);
Route::post('/submit', [FormController::class, 'store'])->name('submit');
Route::get('/get-desa', [FormController::class, 'getDesa'])->name('get.desa');
Route::get('/get-kabupaten', [FormController::class, 'getKabupaten'])->name('get.kabupaten');
Route::get('/get-kecamatan', [FormController::class, 'getKecamatan'])->name('get.kecamatan');
