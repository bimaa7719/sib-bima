<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/dashboard', [App\Http\Controllers\dashboard\DashboardController::class, 'index'])->name('dashboard');

//Users
Route::get('/dashboard/users', [App\Http\Controllers\Dashboard\UserController::class, 'index'])->name('dashboard.users');
Route::get('/dashboard/user/edit/{id}', [App\Http\Controllers\Dashboard\UserController::class, 'edit'])->name('dashboard.users.edit');
Route::post('/dashboard/user/update/{id}', [App\Http\Controllers\Dashboard\UserController::class, 'update'])->name('dashboard.users.update');
Route::delete('/dashboard/user/delete/{id}', [App\Http\Controllers\Dashboard\UserController::class, 'destroy'])->name('dashboard.users.delete');


//Siswa
Route::get('/dashboard/siswa', [App\Http\Controllers\Dashboard\SiswaController::class, 'index'])->name('dashboard.siswa');
route::get('/dashboard/siswa/create', [App\Http\Controllers\Dashboard\SiswaController::class, 'create'])->name('dashboard.siswa.create');
Route::post('/dashboard/siswa/store', [App\Http\Controllers\Dashboard\SiswaController::class, 'store'])->name('dashboard.siswa.store'); 
Route::delete('/dashboard/siswa/{siswa}', [App\Http\Controllers\Dashboard\SiswaController::class, 'destroy'])->name('dashboard.siswa.delete');
Route::get('/dashboard/siswas/edit/{siswa}', [App\Http\Controllers\Dashboard\SiswaController::class, 'edit'])->name('dashboard.siswa.edit');
Route::put('/dashboard/siswa/edit/{siswa}', [App\Http\Controllers\Dashboard\SiswaController::class, 'update'])->name('dashboard.siswa.update');
Route::get('/dashboard/siswa/show/{siswa}', [App\Http\Controllers\Dashboard\SiswaController::class, 'show'])->name('dashboard.siswa.show');


