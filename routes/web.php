<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DetailController;
use App\Models\Employee;
use GuzzleHttp\Middleware;

Route::get('/', function () {
    $jumlahpegawai = Employee::count();
    $jumlahbeluminduksihr = Employee::where('induksihr', 'Belum')->count();
    $jumlahbeluminduksishe = Employee::where('induksishe', 'Belum')->count();

    return view('welcome', compact('jumlahpegawai', 'jumlahbeluminduksihr', 'jumlahbeluminduksishe'));
})->middleware('auth');

Route::group(['middleware' => ['auth', 'hakakses:admin,user']], function () {});

Route::get('/pegawai', [EmployeeController::class, 'index'])->name('pegawai')->middleware('auth');

Route::get('/tambahpegawai', [EmployeeController::class, 'tambahpegawai'])->name('tambahpegawai');
Route::post('/insertdata', [EmployeeController::class, 'insertdata'])->name('insertdata');

Route::get('/tampilkandata/{id}', [EmployeeController::class, 'tampilkandata'])->name('tampilkandata');
Route::post('/updatedata/{id}', [EmployeeController::class, 'updatedata'])->name('updatedata');

Route::get('/delete/{id}', [EmployeeController::class, 'delete'])->name('delete');

// export pdf
Route::get('/exportpdf', [EmployeeController::class, 'exportpdf'])->name('exportpdf');

// export excel
Route::get('/exportexcel', [EmployeeController::class, 'exportexcel'])->name('exportexcel');

// import excel
Route::post('/importexcel', [EmployeeController::class, 'importexcel'])->name('importexcel');

// login
Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/loginproses', [LoginController::class, 'loginproses'])->name('loginproses');

Route::get('/register', [LoginController::class, 'register'])->name('register');

Route::post('/registeruser', [LoginController::class, 'registeruser'])->name('registeruser');

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/datadetail', [DetailController::class, 'index'])->name('datadetail')->middleware('auth');

Route::get('/tambahdetail', [DetailController::class, 'create'])->name('tambahdetail');

Route::post('/insertdatadetail', [DetailController::class, 'store'])->name('insertdatadetail');
