<?php

use App\Http\Controllers\Dashboard\PemesananTiketController;
use App\Http\Controllers\Landing\LandingController;
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

Route::get('paket', [LandingController::class, 'paket'])->name('paket.landing');
Route::resource('/', LandingController::class);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/tiket', [PemesananTiketController::class, 'index'])->name('tiket.index');
    Route::get('/tiket/create', [PemesananTiketController::class, 'create'])->name('tiket.create');
    Route::post('/tiket', [PemesananTiketController::class, 'store'])->name('tiket.store');
    Route::get('/tiket/edit/{id}', [PemesananTiketController::class, 'edit'])->name('tiket.edit');
    Route::patch('/tiket/update/{id}', [PemesananTiketController::class, 'update'])->name('tiket.update');
    Route::post('/tiket/delete/{id}', [PemesananTiketController::class, 'delete'])->name('tiket.delete');
    Route::get('/tiket/scan', [PemesananTiketController::class, 'scan'])->name('tiket.scan');
    Route::post('/tiket/scan', [PemesananTiketController::class, 'qrcode'])->name('tiket.qrcode');
    Route::get('/tiket/label/{id}', [PemesananTiketController::class, 'label'])->name('tiket.label');
    Route::post('/tiket/export/', [PemesananTiketController::class, 'export'])->name('tiket.export');
});
