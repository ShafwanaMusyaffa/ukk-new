<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AssetController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LelangController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\AdminController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');


require __DIR__.'/auth.php';

// Route::get('/', function () {
    //     return view('welcome');
    // });
require __DIR__.'/adminauth.php';

Route::middleware('auth:admin')->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
        Route::resource('/assets', AssetController::class);
        Route::get('lelang/create/{asset}', [LelangController::class, 'create'])->middleware('auth:admin')->name('lelang.create');

        Route::get('admin', [AdminController::class, 'index']);
        Route::delete('admin/{u}', [AdminController::class, 'destroy'])->name('admin.admin.hapus');

        Route::get('karyawan', [AdminController::class, 'indexkaryawan']);
        Route::delete('karyawan/{u}', [AdminController::class, 'destroykaryawan'])->name('admin.karyawan.hapus');

        Route::get('pengguna', [PenggunaController::class, 'index']);
        Route::delete('pengguna/{u}', [PenggunaController::class, 'destroy'])->name('admin.pengguna.hapus');

        Route::get('laporan   ', [LelangController::class, 'generateLaporan'])->name('lelang.laporan');
    });
});


Route::get('/', [HomeController::class, 'index'])->name('homepage');



Route::resource('/u', UserController::class);

Route::get('/u/{u}/pro', [UserController::class, 'promote'])->name('u.promote');
Route::get('/u/{u}/dem', [UserController::class, 'demote'])->name('u.demote');


Route::post('admin/lelang/{asset}', [LelangController::class, 'store'])->middleware('auth:admin')->name('lelang.store');
Route::get('/lelang/{lelang}/tawar', [LelangController::class, 'tawar'])->name('lelang.tawar');
Route::delete('admin/lelang/{lelang}', [LelangController::class, 'akhiri'])->name('lelang.akhiri');
Route::resource('/lelang', LelangController::class)->only([
    'index', 'update', 'show'
]);


