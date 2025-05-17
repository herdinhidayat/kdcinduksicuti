<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\PenyelenggaraController;
use App\Models\Kegiatan;
use GuzzleHttp\Middleware;

// Route::get('/', function () {
//     return view('welcome');
// });



Route::get('/', function () {
    $jumlahkegiatan = Kegiatan::count();
    $jumlahbelumkegiatan = Kegiatan::where('info', 'Belum')->count();
    $jumlahselesaikegiatan = Kegiatan::where('info', 'Selesai')->count();

    return view('welcome', compact('jumlahkegiatan', 'jumlahbelumkegiatan', 'jumlahselesaikegiatan'));
})->middleware('auth');

Route::group(['middleware' => ['auth', 'hakakses:user']], function () {
    Route::get('/kegiatan', [KegiatanController::class, 'index'])->name('kegiatan');
});

Route::get('/tambahkegiatan', [KegiatanController::class, 'tambahkegiatan'])->name('tambahkegiatan');
Route::post('/insertdata', [KegiatanController::class, 'insertdata'])->name('insertdata');

Route::get('/tampilkandata/{id}', [KegiatanController::class, 'tampilkandata'])->name('tampilkandata');
Route::post('/updatedata/{id}', [KegiatanController::class, 'updatedata'])->name('updatedata');

Route::get('/delete/{id}', [KegiatanController::class, 'delete'])->name('delete');

// // export pdf
// Route::get('/exportpdf', [EmployeeController::class, 'exportpdf'])->name('exportpdf');

// // export excel
// Route::get('/exportexcel', [EmployeeController::class, 'exportexcel'])->name('exportexcel');

// // import excel
// Route::post('/importexcel', [EmployeeController::class, 'importexcel'])->name('importexcel');

// // login
Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/loginproses', [LoginController::class, 'loginproses'])->name('loginproses');

Route::get('/register', [LoginController::class, 'register'])->name('register');

Route::post('/registeruser', [LoginController::class, 'registeruser'])->name('registeruser');

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/datapenyelenggara', [PenyelenggaraController::class, 'index'])->name('datapenyelenggara')->middleware('auth');

Route::post('/insertdatapenyelenggara', [PenyelenggaraController::class, 'store'])->name('insertdatapenyelenggara');

Route::get('/tambahpenyelenggara', [PenyelenggaraController::class, 'create'])->name('tambahpenyelenggara');
