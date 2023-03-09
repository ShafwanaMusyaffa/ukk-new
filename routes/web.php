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

Route::middleware('auth:admin')->group(function () {
    Route::get('/admin', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('/admin/assets', AssetController::class);

});
require __DIR__.'/adminauth.php';


Route::get('/', function () {
    return view('pages.home');
});


Route::resource('/u', UserController::class);

Route::get('/u/{u}/pro', [UserController::class, 'promote'])->name('u.promote');
Route::get('/u/{u}/dem', [UserController::class, 'demote'])->name('u.demote');


Route::get('admin/lelang/create/{asset}', [LelangController::class, 'create'])->name('lelang.create');
Route::get('admin/laporan   ', [LelangController::class, 'generateLaporan'])->name('lelang.laporan');
Route::post('admin/lelang/{asset}', [LelangController::class, 'store'])->name('lelang.store');
Route::get('/lelang/{lelang}/tawar', [LelangController::class, 'tawar'])->name('lelang.tawar');
Route::delete('admin/lelang/{lelang}', [LelangController::class, 'akhiri'])->name('lelang.akhiri');
Route::resource('/lelang', LelangController::class)->only([
    'index', 'update', 'show'
]);

Route::get('/admin/pengguna', [PenggunaController::class, 'index']);
Route::delete('admin/pengguna/{u}', [PenggunaController::class, 'destroy'])->name('admin.pengguna.hapus');

Route::get('/admin/admin', [AdminController::class, 'index']);
