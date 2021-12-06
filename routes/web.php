<?php

use App\Http\Controllers\EspacioGeneralController;
use App\Http\Controllers\FundaEmpresaController;
use App\Http\Controllers\RegistroGEController;
use App\Http\Controllers\EditarGEController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PerfilUsuarioController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VistaInscritosController;

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

Route::get('/', function () {
    return view('welcome');
})->name('inicio');

Route::get('/Socio-{id}', [PerfilUsuarioController::class, 'show']);


Route::get('/RegistroGE',[RegistroGEController::class, 'vistaRegistroGE'])->name('registroGE');


Route::get('/EditarGE',[EditarGEController::class, 'index']);
Route::get('/EditarGE-{nombre}',[EditarGEController::class, 'index_view']);


Route::get('/Login', [LoginController::class, 'vistaLogin']);
Route::get('/GE-{nombre}', [RegistroGEController::class, 'vistaGE']);
Route::get('/GrupoEmpresas', [RegistroGEController::class, 'viewGrupoEmpresas']);


Route::get('/RegistroDeUsuario', [UserController::class, 'crearUsuario']);

Route::get('/FundaEmpresa', [FundaEmpresaController::class, 'vistaFundaEmpresa']);
Route::post('/import-list-excel' ,[FundaEmpresaController::class, 'importExcel'] )   ->name ('users.import.excel');
Route::get('/EspacioGeneral', [EspacioGeneralController::class, 'vistaEspacioGeneral']);

Route::get('/Inscritos', [VistaInscritosController::class, 'index']);
