<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\EmpresaPerfilController;
use App\Http\Controllers\HoldingController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\TarefaController;
use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

// Login
Route::get('/', [LoginController::class, 'index'])->name('login.index');
Route::post('/login', [LoginController::class, 'loginProcess'])->name('login.process');
Route::get('/logout', [LoginController::class, 'destroy'])->name('login.destroy');


Route::group(['middleware' => 'auth:web,holding'], function () {


    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard.dashboard');


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


    // Usuário
    Route::get('/index-usuario', [UsuarioController::class, 'index'])->name('usuario.index');
    Route::get('/show-usuario/{usuario}', [UsuarioController::class, 'show'])->name('usuario.show');
    Route::get('/create-usuario', [UsuarioController::class, 'create'])->name('usuario.create');
    Route::post('/store-usuario', [UsuarioController::class, 'store'])->name('usuario.store');
    Route::get('/edit-usuario/{usuario}', [UsuarioController::class, 'edit'])->name('usuario.edit');
    Route::put('/update-usuario/{usuario}', [UsuarioController::class, 'update'])->name('usuario.update');
    Route::get('/edit-usuario-password/{usuario}', [UsuarioController::class, 'editPassword'])->name('usuario.edit-password');
    Route::put('/update-usuario-password/{usuario}', [UsuarioController::class, 'updatePassword'])->name('usuario.update-password');
    Route::delete('/destroy-usuario/{usuario}', [UsuarioController::class, 'destroy'])->name('usuario.destroy');


    // Perfil Empresa
    Route::get('/show-profile-empresa', [EmpresaPerfilController::class, 'show'])->name('empresa_profile.show');
    Route::get('/edit-profile-empresa', [EmpresaPerfilController::class, 'edit'])->name('empresa_profile.edit');
    Route::put('/update-profile-empresa', [EmpresaPerfilController::class, 'update'])->name('empresa_profile.update');
    Route::get('/edit-profile-logo', [EmpresaPerfilController::class, 'editLogo'])->name('empresa_profile.edit-logo');
    Route::put('/update-profile-logo', [EmpresaPerfilController::class, 'updateLogo'])->name('empresa_profile.update-logo');
    Route::get('/show-colaboradores-empresa', [EmpresaPerfilController::class, 'colaboradores'])->name('empresa_profile.colaboradores');

    // Agenda
    Route::get('/agenda', [TarefaController::class, 'index'])->name('tarefa.index');
    Route::get('/agenda/create/{data}', [TarefaController::class, 'create'])->name('tarefa.create');
    Route::post('/agenda/tarefa', [TarefaController::class, 'store'])->name('tarefa.store');
    Route::get('/agenda/tarefas/{data}', [TarefaController::class, 'showTarefas'])->name('tarefa.show');
    Route::get('/agenda/ajax', [TarefaController::class, 'calendar'])->name('tarefa.calendar');
});
