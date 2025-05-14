<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\PenyelenggaraController;
use App\Models\Employee;
use GuzzleHttp\Middleware;

Route::get('/', function () {
    return view('welcome');
});



// Route::get('/', function () {
//     $jumlahpegawai = Employee::count();
//     $jumlahbeluminduksihr = Employee::where('induksihr', 'Belum')->count();
//     $jumlahbeluminduksishe = Employee::where('induksishe', 'Belum')->count();

//     return view('welcome', compact('jumlahpegawai', 'jumlahbeluminduksihr', 'jumlahbeluminduksishe'));
// })->middleware('auth');

Route::group(['middleware' => ['auth', 'hakakses:user']], function () {
    Route::get('/kegiatan', [KegiatanController::class, 'index'])->name('kegiatan');
});

// Route::get('/tambahpegawai', [EmployeeController::class, 'tambahpegawai'])->name('tambahpegawai');
// Route::post('/insertdata', [EmployeeController::class, 'insertdata'])->name('insertdata');

// Route::get('/tampilkandata/{id}', [EmployeeController::class, 'tampilkandata'])->name('tampilkandata');
// Route::post('/updatedata/{id}', [EmployeeController::class, 'updatedata'])->name('updatedata');

// Route::get('/delete/{id}', [EmployeeController::class, 'delete'])->name('delete');

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

Route::get('/penyelenggara', [PenyelenggaraController::class, 'index'])->name('penyelenggara')->middleware('auth');

Route::get('/tambahpenyelenggara', [PenyelenggaraController::class, 'create'])->name('tambahpenyelenggara');

// Route::post('/insertdatadetail', [DetailController::class, 'store'])->name('insertdatadetail');
