<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\DemitirFuncionario;
use App\Http\Controllers\FuncionarioController;
use App\Http\Controllers\ProjetoController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded within the "web" middleware group which includes
| sessions, cookie encryption, and more. Go build something great!
|
*/

Route::view('/', 'welcome');

Route::get('clients', [ClienteController::class, 'index'])->name('clientes.index');
Route::get('client/create', [ClienteController::class, 'create'])->name('clientes.create');
Route::post('clients', [ClienteController::class, 'store'])->name('clientes.store');
Route::get('clients/{cliente}/edit', [ClienteController::class, 'show'])->name('clientes.show');
Route::put('clients/{cliente}', [ClienteController::class, 'update'])->name('clientes.update');
Route::delete('clients/{cliente}', [ClienteController::class, 'destroy'])->name('clientes.destroy');

Route::resource('funcionarios', FuncionarioController::class)->except('show');
Route::patch('funcionarios/{funcionario}/demissao', DemitirFuncionario::class)->name('funcionarios.demitir');

Route::resource('projetos', ProjetoController::class);


