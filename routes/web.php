<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\SuratMasukController;
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
    Route::post('update/', [SuratMasukController::class, 'updateData'])->name('suratmasuk.update');
    Route::get('/delete/{id}', [SuratMasukController::class, 'delete'])->name('suratmasuk.delete');
    Route::get('/download/{id}', [SuratMasukController::class, 'download'])->name('suratmasuk.download');
});
