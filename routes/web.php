<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\EmpresaPerfilController;
use App\Http\Controllers\HoldingController;
use App\Http\Controllers\HoldingUserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TarefaController;
use App\Http\Controllers\TomadorServicoController;
use App\Http\Controllers\UsuarioController;
use App\Models\HoldingUser;
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
    Route::get('/holdings/show-empresa/{holding}/{empresa}', [HoldingController::class, 'showEmpresa'])->name('holdings.holding.show-empresa');
    Route::get('/holdings/pdf-dados{holding}', [HoldingController::class, 'gerarPdf'])->name('holdings.holding.pdf-dados');

    // Usuário
    Route::get('/holdings/index-usuario', [HoldingUserController::class, 'indexHolding'])->name('holdings.usuario.index');
    Route::get('/holdings/show-usuario/{usuario}', [HoldingUserController::class, 'showHolding'])->name('holdings.usuario.show');
    Route::get('/holdings/create-usuario', [HoldingUserController::class, 'createHolding'])->name('holdings.usuario.create');
    Route::post('/holdings/store-usuario', [HoldingUserController::class, 'storeHolding'])->name('holdings.usuario.store');
    Route::get('/holdings/edit-usuario/{usuario}', [HoldingUserController::class, 'editHolding'])->name('holdings.usuario.edit');
    Route::put('/holdings/update-usuario/{usuario}', [HoldingUserController::class, 'updateHolding'])->name('holdings.usuario.update');
    Route::get('/holdings/edit-usuario-password/{usuario}', [HoldingUserController::class, 'editPasswordHolding'])->name('holdings.usuario.edit-password');
    Route::put('/holdings/update-usuario-password/{usuario}', [HoldingUserController::class, 'updatePasswordHolding'])->name('holdings.usuario.update-password');
    Route::delete('/holdings/destroy-usuario/{usuario}', [HoldingUserController::class, 'destroyHolding'])->name('holdings.usuario.destroy');

    // Cliente Empresas
    Route::get('/holdings/index-cliente-empresa', [ClienteController::class, 'indexEmpresa'])->name('holdings.clientes.index');
    Route::get('/holdings/show-cliente-empresa/{cliente}', [ClienteController::class, 'showEmpresa'])->name('holdings.clientes.show');
    Route::get('/holdings/create-cliente-empresa', [ClienteController::class, 'createEmpresa'])->name('holdings.clientes.create');
    Route::post('/holdings/store-cliente-empresa', [ClienteController::class, 'storeEmpresa'])->name('holdings.clientes.store');
    Route::get('/holdings/edit-cliente-empresa/{cliente}', [ClienteController::class, 'editEmpresa'])->name('holdings.clientes.edit');
    Route::put('/holdings/update-cliente-empresa/{cliente}', [ClienteController::class, 'updateEmpresa'])->name('holdings.clientes.update');
    Route::delete('/holdings/destroy-cliente-empresa/{cliente}', [ClienteController::class, 'destroyEmpresa'])->name('holdings.clientes.destroy');
    Route::get('/holdings/show-colaboradores-empresa/{cliente}', [ClienteController::class, 'colaboradoresEmpresa'])->name('holdings.clientes.colaboradores');

    // Perfil
    Route::get('/holdings/show-profile', [ProfileController::class, 'showHolding'])->name('holdings.profile.show');
    Route::get('/holdings/edit-profile', [ProfileController::class, 'editHolding'])->name('holdings.profile.edit');
    Route::put('/holdings/update-profile', [ProfileController::class, 'updateHolding'])->name('holdings.profile.update');
    Route::get('/holdings/edit-profile-foto', [ProfileController::class, 'editFotoHolding'])->name('holdings.profile.edit-foto');
    Route::put('/holdings/update-profile-foto', [ProfileController::class, 'updateFotoHolding'])->name('holdings.profile.update-foto');
    Route::get('/holdings/edit-profile-password', [ProfileController::class, 'editPasswordHolding'])->name('holdings.profile.edit-password');
    Route::put('/holdings/update-profile-password', [ProfileController::class, 'updatePasswordHolding'])->name('holdings.profile.update-password');

    // Perfil Holding
    Route::get('/holdings/show-profile-holding', [EmpresaPerfilController::class, 'showHolding'])->name('holdings.holding_profile.show');
    Route::get('/holdings/edit-profile-holding', [EmpresaPerfilController::class, 'editHolding'])->name('holdings.holding_profile.edit');
    Route::put('/holdings/update-profile-holding', [EmpresaPerfilController::class, 'updateHolding'])->name('holdings.holding_profile.update');
    Route::get('/holdings/show-colaboradores-holding', [EmpresaPerfilController::class, 'colaboradoresHolding'])->name('holdings.holding_profile.colaboradores');



    // Rotas para as Empresas

    // Dashboard
    Route::get('/empresas/dashboard', [DashboardController::class, 'empresaDashboard'])->name('empresas.dashboard.dashboard');

    // Usuário
    Route::get('/empresas/index-usuario', [UsuarioController::class, 'indexEmpresa'])->name('empresas.usuario.index');
    Route::get('/empresas/show-usuario/{usuario}', [UsuarioController::class, 'showEmpresa'])->name('empresas.usuario.show');
    Route::get('/empresas/create-usuario', [UsuarioController::class, 'createEmpresa'])->name('empresas.usuario.create');
    Route::post('/empresas/store-usuario', [UsuarioController::class, 'storeEmpresa'])->name('empresas.usuario.store');
    Route::get('/empresas/edit-usuario/{usuario}', [UsuarioController::class, 'editEmpresa'])->name('empresas.usuario.edit');
    Route::put('/empresas/update-usuario/{usuario}', [UsuarioController::class, 'updateEmpresa'])->name('empresas.usuario.update');
    Route::get('/empresas/edit-usuario-password/{usuario}', [UsuarioController::class, 'editPasswordEmpresa'])->name('empresas.usuario.edit-password');
    Route::put('/empresas/update-usuario-password/{usuario}', [UsuarioController::class, 'updatePasswordEmpresa'])->name('empresas.usuario.update-password');
    Route::delete('/empresas/destroy-usuario/{usuario}', [UsuarioController::class, 'destroyEmpresa'])->name('empresas.usuario.destroy');

    // Perfil
    Route::get('/empresas/show-profile', [ProfileController::class, 'showEmpresa'])->name('empresas.profile.show');
    Route::get('/empresas/edit-profile', [ProfileController::class, 'editEmpresa'])->name('empresas.profile.edit');
    Route::put('/empresas/update-profile', [ProfileController::class, 'updateEmpresa'])->name('empresas.profile.update');
    Route::get('/empresas/edit-profile-foto', [ProfileController::class, 'editFotoEmpresa'])->name('empresas.profile.edit-foto');
    Route::put('/empresas/update-profile-foto', [ProfileController::class, 'updateFotoEmpresa'])->name('empresas.profile.update-foto');
    Route::get('/empresas/edit-profile-password', [ProfileController::class, 'editPasswordEmpresa'])->name('empresas.profile.edit-password');
    Route::put('/empresas/update-profile-password', [ProfileController::class, 'updatePasswordEmpresa'])->name('empresas.profile.update-password');

    // Perfil Empresa
    Route::get('/empresas/show-profile-empresa', [EmpresaPerfilController::class, 'showEmpresa'])->name('empresas.empresa_profile.show');
    Route::get('/empresas/edit-profile-empresa', [EmpresaPerfilController::class, 'editEmpresa'])->name('empresas.empresa_profile.edit');
    Route::put('/empresas/update-profile-empresa', [EmpresaPerfilController::class, 'updateEmpresa'])->name('empresas.empresa_profile.update');
    Route::get('/empresas/show-colaboradores-empresa', [EmpresaPerfilController::class, 'colaboradoresEmpresa'])->name('empresas.empresa_profile.colaboradores');

    // Agenda
    Route::get('/empresas/agenda', [TarefaController::class, 'index'])->name('empresas.tarefa.index');
    Route::get('/empresas/agenda/create/{data}', [TarefaController::class, 'create'])->name('empresas.tarefa.create');
    Route::post('/empresas/agenda/tarefa', [TarefaController::class, 'store'])->name('empresas.tarefa.store');
    Route::get('/empresas/agenda/tarefas/{data}', [TarefaController::class, 'showTarefas'])->name('empresas.tarefa.show');

    // Clientes
    Route::get('/empresas/index-cliente-empresa', [TomadorServicoController::class, 'indexEmpresa'])->name('empresas.cliente.index');
    Route::get('/empresas/show-cliente-empresa/{cliente}', [TomadorServicoController::class, 'showEmpresa'])->name('empresas.cliente.show');
    Route::get('/empresas/create-cliente-empresa', [TomadorServicoController::class, 'createEmpresa'])->name('empresas.cliente.create');
    Route::post('/empresas/store-cliente-empresa', [TomadorServicoController::class, 'storeEmpresa'])->name('empresas.cliente.store');
    Route::get('/empresas/edit-cliente-empresa/{cliente}', [TomadorServicoController::class, 'editEmpresa'])->name('empresas.cliente.edit');
    Route::put('/empresas/update-cliente-empresa/{cliente}', [TomadorServicoController::class, 'updateEmpresa'])->name('empresas.cliente.update');
    Route::delete('/empresas/destroy-cliente-empresa/{cliente}', [TomadorServicoController::class, 'destroyEmpresa'])->name('empresas.cliente.destroy');
    
});
