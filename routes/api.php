<?php

use App\Http\Controllers\EditarGEController;
use App\Http\Controllers\EditarPerfilController;
use App\Http\Controllers\RegistroGEController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PerfilUsuarioController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VistaInscritosController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('usuario',[PerfilUsuarioController::class ,'obtenerUsuario']);
Route::post('usuarios',[PerfilUsuarioController::class ,'obtenerUsuarios']);
Route::post('actualizarPerfil',[EditarPerfilController::class ,'modificarDatos']);

Route::post('nombreGE', [RegistroGEController::class, 'verificarNombre']);
Route::post('registrarGrupoEmpresa', [RegistroGEController::class, 'RegistrarGrupoEmpresa'])->name('rgep');

Route::post('crearSession', [UserController::class, 'createSession']);
Route::post('eliminarSession', [UserController::class, 'dropSession']);
Route::post('verificarSession', [UserController::class, 'verifySession']);
Route::post('getNombre', [UserController::class, 'getNombre']);

Route::post('registrarCambiosGE', [EditarGEController::class, 'registrarCambiosGE']);
//Route::post('registrarCambiosGE', [RegistroGEController::class, 'RegistrarGrupoEmpresa']);
Route::post('solicitarGE', [EditarGEController::class, 'solicitarGE']);

Route::post('solicitarSocios', [RegistroGEController::class, 'obtenerSocios']);
Route::post('expulsarUsuario', [RegistroGEController::class, 'expulsarSocio']);
Route::post('obtenerUsuariosG', [RegistroGEController::class, 'obtenerUsuariosG']);

Route::post('mandarInvitacion', [UserController::class, 'mandarInvitacion']);
Route::post('obtenerPendientes', [RegistroGEController::class, 'obtenerPendientes']);
Route::post('eliminarInvitacion', [RegistroGEController::class, 'eliminarInvitacion']);

Route::post('obtenerGrupoEmpresas', [RegistroGEController::class, 'obtenerGrupoEmpresas']);

Route::post('actualizarUsuario', [UserController::class, 'actualizarUsuario']);
Route::post('obtenerInvitaciones',[PerfilUsuarioController::class, 'obtenerInvitaciones']);
Route::post('aceptarInvitacion',[PerfilUsuarioController::class, 'aceptarInvitacion']);
Route::post('rechazarInvitacion',[PerfilUsuarioController::class, 'rechazarInvitacion']);
Route::post('import-list-excel' ,[FundaEmpresaController::class, 'importExcel'] )   ->name ('users.import.excel');
Route::get('datosFundaEmpresa', [UserController::class,'obtenerDatos']);

Route::post('getUsuariosMismoGrupo',[VistaInscritosController::class, 'getUsuariosMismoGrupo']);
