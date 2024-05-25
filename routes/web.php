<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ParkingController;
use App\Livewire\AkumulasiParkirLivewire;

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

/*------------------------------------------
--------------------------------------------
All Normal Users Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:user'])->group(function () {

    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('parkir/masuk', [UsersController::class, 'parkirMasuk'])->name('parkir.masuk');
    Route::get('parkir/keluar', [UsersController::class, 'parkirKeluar'])->name('parkir.keluar');
    Route::get('/get-parking-data-bulan', [ParkingController::class, 'getParkingDataBulan']);
    Route::get('/get-parking-data-hari', [ParkingController::class, 'getParkingDataHari']);
    Route::get('/get-parking-data-tahun', [ParkingController::class, 'getParkingDataTahun']);
});


/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:admin'])->group(function () {

    Route::get('/admin/home', [HomeController::class, 'adminHome'])->name('admin.home');
    Route::get('/admin/user', [AdminController::class, 'index'])->name('admin.user');
    Route::get('/akumulasi-parkir', [AdminController::class, 'kendaraanMasuk'])->name('kendaraan.masuk');
    Route::get('/admin/parkir/masuk', [AdminController::class, 'parkirMasuk'])->name('parkir.masuk.admin');
    Route::get('/admin/parkir/keluar', [AdminController::class, 'parkirKeluar'])->name('parkir.keluar.admin');
    // Route::get('/akumulasi-parkir', AkumulasiParkirLivewire::class);
});

/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/
// Route::middleware(['auth', 'user-access:manager'])->group(function () {

//     Route::get('/manager/home', [HomeController::class, 'managerHome'])->name('manager.home');
// });
