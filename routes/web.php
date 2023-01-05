<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\SuratKeluarController;
use App\Http\Controllers\Admin\SuratMasukController;
use App\Http\Controllers\Admin\UserController;
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


Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

Route::prefix('surat-masuk/')->group(function () {
    Route::get('index', [SuratMasukController::class, 'index'])->name('suratmasuk.index');
    Route::post('store', [SuratMasukController::class, 'store'])->name('suratmasuk.store');
    Route::get('edit/{id}', [SuratMasukController::class, 'edit'])->name('suratmasuk.edit');
    Route::post('update/', [SuratMasukController::class, 'update'])->name('suratmasuk.update');
    Route::get('/delete/{id}', [SuratMasukController::class, 'destroy'])->name('suratmasuk.delete');
    Route::get('/download/{id}', [SuratMasukController::class, 'download'])->name('suratmasuk.download');
});
Route::prefix('surat-keluar/')->group(function () {
    Route::get('index', [SuratKeluarController::class, 'index'])->name('suratkeluar.index');
    Route::post('store', [SuratKeluarController::class, 'store'])->name('suratkeluar.store');
    Route::get('edit/{id}', [SuratKeluarController::class, 'edit'])->name('suratkeluar.edit');
    Route::post('update/{id}', [SuratKeluarController::class, 'update'])->name('suratkeluar.update');
    Route::get('/delete/{id}', [SuratKeluarController::class, 'destroy'])->name('suratkeluar.delete');
    Route::get('/download/{id}', [SuratKeluarController::class, 'download'])->name('suratkeluar.download');
});

Route::prefix('user/')->group(function () {
    Route::get('index', [UserController::class, 'index'])->name('user.index');
    Route::post('store', [UserController::class, 'store'])->name('user.store');
    Route::get('edit/{id}', [UserController::class, 'edit'])->name('user.edit');
    Route::post('update/', [UserController::class, 'update'])->name('user.update');
    Route::get('/delete/{id}', [UserController::class, 'destroy'])->name('user.delete');
});
