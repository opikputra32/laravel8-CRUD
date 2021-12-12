<?php

use App\Http\Controllers\MahasiswaController;
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


Route::get('/mahasiswas', [MahasiswaController::class, 'index'])->name('mahasiswas.index');
Route::get('/mahasiswas/create', [MahasiswaController::class, 'create'])->name('mahasiswas.create');
Route::post('/mahasiswas/store', [MahasiswaController::class, 'store'])->name('mahasiswas.store');
Route::get('/mahasiswas/{mahasiswa}/edit', [MahasiswaController::class, 'edit'])->name('mahasiswas.edit');
Route::post('/mahasiswas', [MahasiswaController::class, 'update'])->name('mahasiswas.update');
Route::get('/mahasiswas/{mahasiswa}/show', [MahasiswaController::class, 'show'])->name('mahasiswas.show');
Route::delete('/mahasiswas/{mahasiswa}/delete', [MahasiswaController::class, 'destroy'])->name('mahasiswas.destroy');


