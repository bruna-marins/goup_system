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


    // Rotas paras as Holdings

    // Dashboard
    Route::get('/holdings/dashboard', [DashboardController::class, 'holdingDashboard'])->name('holdings.dashboard.dashboard');

    // Holdings
    Route::get('/holdings/index-holding', [HoldingController::class, 'index'])->name('holdings.holding.index');
    Route::get('/holdings/show-holding/{holding}', [HoldingController::class, 'show'])->name('holdings.holding.show');
    Route::get('/holdings/create-holding', [HoldingController::class, 'create'])->name('holdings.holding.create');
    Route::post('/holdings/store-holding', [HoldingController::class, 'store'])->name('holdings.holding.store');
    Route::get('/holdings/edit-holding/{holding}', [HoldingController::class, 'edit'])->name('holdings.holding.edit');
    Route::put('/holdings/update-holding/{holding}', [HoldingController::class, 'update'])->name('holdings.holding.update');
    Route::delete('/holdings/destroy-holding/{holding}', [HoldingController::class, 'destroy'])->name('holdings.holding.destroy');



    // Rotas para as Empresas

    // Dashboard
    Route::get('/empresas/dashboard', [DashboardController::class, 'empresaDashboard'])->name('empresas.dashboard.dashboard');

    // Empresas
    Route::get('/empresas/index-empresa', [EmpresaController::class, 'index'])->name('empresas.empresa.index');
    Route::get('/empresas/show-empresa/{empresa}', [EmpresaController::class, 'show'])->name('empresas.empresa.show');
    Route::get('/empresas/create-empresa', [EmpresaController::class, 'create'])->name('empresas.empresa.create');
    Route::post('/empresas/store-empresa', [EmpresaController::class, 'store'])->name('empresas.empresa.store');
    Route::get('/empresas/edit-empresa/{empresa}', [EmpresaController::class, 'edit'])->name('empresas.empresa.edit');
    Route::put('/empresas/update-empresa/{empresa}', [EmpresaController::class, 'update'])->name('empresas.empresa.update');
    Route::delete('/empresas/destroy-empresa/{empresa}', [EmpresaController::class, 'destroy'])->name('empresas.empresa.destroy');

    // Usuário
    Route::get('/empresas/index-usuario', [UsuarioController::class, 'index'])->name('empresas.usuario.index');
    Route::get('/empresas/show-usuario/{usuario}', [UsuarioController::class, 'show'])->name('empresas.usuario.show');
    Route::get('/empresas/create-usuario', [UsuarioController::class, 'create'])->name('empresas.usuario.create');
    Route::post('/empresas/store-usuario', [UsuarioController::class, 'store'])->name('empresas.usuario.store');
    Route::get('/empresas/edit-usuario/{usuario}', [UsuarioController::class, 'edit'])->name('empresas.usuario.edit');
    Route::put('/empresas/update-usuario/{usuario}', [UsuarioController::class, 'update'])->name('empresas.usuario.update');
    Route::get('/empresas/edit-usuario-password/{usuario}', [UsuarioController::class, 'editPassword'])->name('empresas.usuario.edit-password');
    Route::put('/empresas/update-usuario-password/{usuario}', [UsuarioController::class, 'updatePassword'])->name('empresas.usuario.update-password');
    Route::delete('/empresas/destroy-usuario/{usuario}', [UsuarioController::class, 'destroy'])->name('empresas.usuario.destroy');

    // Perfil Empresa
    Route::get('/empresas/show-profile-empresa', [EmpresaPerfilController::class, 'show'])->name('empresas.empresa_profile.show');
    Route::get('/empresas/edit-profile-empresa', [EmpresaPerfilController::class, 'edit'])->name('empresas.empresa_profile.edit');
    Route::put('/empresas/update-profile-empresa', [EmpresaPerfilController::class, 'update'])->name('empresas.empresa_profile.update');
    Route::get('/empresas/edit-profile-logo', [EmpresaPerfilController::class, 'editLogo'])->name('empresas.empresa_profile.edit-logo');
    Route::put('/empresas/update-profile-logo', [EmpresaPerfilController::class, 'updateLogo'])->name('empresas.empresa_profile.update-logo');
    Route::get('/empresas/show-colaboradores-empresa', [EmpresaPerfilController::class, 'colaboradores'])->name('empresas.empresa_profile.colaboradores');

    // Agenda
    Route::get('/empresas/agenda', [TarefaController::class, 'index'])->name('empresas.tarefa.index');
    Route::get('/empresas/agenda/create/{data}', [TarefaController::class, 'create'])->name('empresas.tarefa.create');
    Route::post('/empresas/agenda/tarefa', [TarefaController::class, 'store'])->name('empresas.tarefa.store');
    Route::get('/empresas/agenda/tarefas/{data}', [TarefaController::class, 'showTarefas'])->name('empresas.tarefa.show');
    Route::get('/empresas/agenda/ajax', [TarefaController::class, 'calendar'])->name('empresas.tarefa.calendar');
});
