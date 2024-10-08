<?php

use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\HoldingController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;


// Login
Route::get('/', [LoginController::class, 'index'])->name('login.index');


// Holdings
Route::get('/index-holding', [HoldingController::class, 'index'])->name('holding.index');
Route::get('/show-holding/{holding}', [HoldingController::class, 'show'])->name('holding.show');
Route::get('/create-holding', [HoldingController::class, 'create'])->name('holding.create');
Route::post('/store-holding', [HoldingController::class, 'store'])->name('holding.store');
Route::get('/edit-holding/{holding}', [HoldingController::class, 'edit'])->name('holding.edit');
Route::put('/update-holding/{holding}', [HoldingController::class, 'update'])->name('holding.update');
Route::delete('/destroy-holding/{holding}', [HoldingController::class, 'destroy'])->name('holding.destroy');


// Empresas
Route::get('/index-empresa', [EmpresaController::class, 'index'])->name('empresa.index');
Route::get('/show-empresa/{empresa}', [EmpresaController::class, 'show'])->name('empresa.show');
Route::get('/create-empresa', [EmpresaController::class, 'create'])->name('empresa.create');
Route::post('/store-empresa', [EmpresaController::class, 'store'])->name('empresa.store');
Route::get('/edit-empresa/{empresa}', [EmpresaController::class, 'edit'])->name('empresa.edit');
Route::put('/update-empresa/{empresa}', [EmpresaController::class, 'update'])->name('empresa.update');
Route::delete('/destroy-empresa/{empresa}', [EmpresaController::class, 'destroy'])->name('empresa.destroy');


// Perfil
Route::get('/index-empresa', [EmpresaController::class, 'index'])->name('empresa.index');
Route::get('/show-empresa/{empresa}', [EmpresaController::class, 'show'])->name('empresa.show');
Route::get('/create-empresa', [EmpresaController::class, 'create'])->name('empresa.create');
Route::post('/store-empresa', [EmpresaController::class, 'store'])->name('empresa.store');
Route::get('/edit-empresa/{empresa}', [EmpresaController::class, 'edit'])->name('empresa.edit');
Route::put('/update-empresa/{empresa}', [EmpresaController::class, 'update'])->name('empresa.update');
Route::delete('/destroy-empresa/{empresa}', [EmpresaController::class, 'destroy'])->name('empresa.destroy');