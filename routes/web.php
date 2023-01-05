<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\SuratKeluarController;
use App\Http\Controllers\Admin\SuratMasukController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\LoginController;
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

Route::get('/login', function () {
    return view('Auth.Login');
})->name('login')->middleware('guest');

Route::prefix('auth')->controller(LoginController::class)->group(function () {
    Route::post('/login', 'login')->name('auth.loginproccess');
    Route::get('/logout', 'logout')->name('logout');
});
Route::group( ['middleware' => ['auth', 'status:pimpinan,sekretaris']],function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('surat-masuk/index', [SuratMasukController::class, 'index'])->name('suratmasuk.index');
    Route::get('surat-keluar/index', [SuratKeluarController::class, 'index'])->name('suratkeluar.index');
    Route::get('surat-masuk/download/{id}', [SuratMasukController::class, 'download'])->name('suratmasuk.download');
    Route::get('surat-keluar/download/{id}', [SuratKeluarController::class, 'download'])->name('suratkeluar.download');
});
Route::group( ['middleware' => ['auth', 'status:sekretaris']],function () {
    Route::prefix('surat-masuk/')->group(function () {
        Route::post('store', [SuratMasukController::class, 'store'])->name('suratmasuk.store');
        Route::get('edit/{id}', [SuratMasukController::class, 'edit'])->name('suratmasuk.edit');
        Route::post('update/', [SuratMasukController::class, 'update'])->name('suratmasuk.update');
        Route::get('/delete/{id}', [SuratMasukController::class, 'destroy'])->name('suratmasuk.delete');
       
    });
    Route::prefix('surat-keluar/')->group(function () {
        Route::post('store', [SuratKeluarController::class, 'store'])->name('suratkeluar.store');
        Route::get('edit/{id}', [SuratKeluarController::class, 'edit'])->name('suratkeluar.edit');
        Route::post('update/{id}', [SuratKeluarController::class, 'update'])->name('suratkeluar.update');
        Route::get('/delete/{id}', [SuratKeluarController::class, 'destroy'])->name('suratkeluar.delete');
       
    });
    Route::prefix('user/')->group(function () {
        Route::get('index', [UserController::class, 'index'])->name('user.index');
        Route::post('store', [UserController::class, 'store'])->name('user.store');
        Route::get('edit/{id}', [UserController::class, 'edit'])->name('user.edit');
        Route::post('update/', [UserController::class, 'update'])->name('user.update');
        Route::get('/delete/{id}', [UserController::class, 'destroy'])->name('user.delete');
    });
});
