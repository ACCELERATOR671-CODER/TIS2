<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\session;
use Illuminate\Support\Facades\DB;
use App\Models\Usuario;
use App\Models\GrupoEmpresa;
use App\Models\Invitacion;

class UserController extends Controller
{
    function createSession(Request $request){ //require el id del
        $session = new session;
        $session->token = md5(uniqid(rand(), true)); 
        $session->idUser = $request->idUser;

        $session->save();

        $ge = Usuario::find($request->idUser);
        $nombre = GrupoEmpresa::find($ge->idGE);
        $resp = [
            'token' => $session->token,
            'nombre' => (!empty($nombre)) ? $nombre->nombre:'',
        ];

        return response()->json($resp);
    }

    function dropSession(Request $request){//require el token
        $id = DB::table('Session')->where('token', $request->token)->first();
        if($id){session::destroy($id->idSession);}
        return response()->json($id);
    }

    function verifySession(Request $request){//verifica si el token existe y devuelve el idUser
        $id = DB::table('Session')->select('idUser')->where('token', $request->token)->first();
        return response()->json($id);
    }

    function getNombre(Request $req){
        $dat = Usuario::find($req->id);
        return response()->json(['nombreC' => $dat->nombreC]);
    }

    /* id = el usuario involucrado
        nombre = grupo empresa involucada
    invitacion =
                => si es false entonces es un usuario solicitando entrar a la grupo empresa
                => si es true entonces es una grupo empresa invitando a un usuario
    
    */
    function mandarInvitacion(Request $req){
        $ge = DB::table('Grupo_Empresa')->where('nombre','=',$req->nombre)->first();
        if(isset($ge->idGE)){
            $usuario = Usuario::find($req->id);
            if(isset($usuario->idUsuario)){
                if(empty($usuario->idGE)){
                    $invitacion = DB::table('Invitacion')
                                        ->where('idUsuario','=',$usuario->idUsuario)
                                        ->where('idGE','=',$ge->idGE)
                                        ->first();
                    if(!isset($invitacion->idInvitacion)){
                        $inv = new Invitacion;
                        $inv->idGE = $ge->idGE;
                        $inv->idUsuario = $usuario->idUsuario;
                        $inv->invitacion = $req->invitacion;
                        $inv->save();

                        $invi =  DB::table('Invitacion')
                                            ->join('Usuario','Usuario.idUsuario','=','Invitacion.idUsuario')
                                            ->where('Invitacion.idUsuario','=',$usuario->idUsuario)
                                            ->where('Invitacion.idGE','=',$ge->idGE)
                                            ->first();

                        return response()->json($invi); 
                    } else {
                        return response()->json(['mensaje'=>'Ya existe una invitacion o solicitud entre el usuario y la grupo empresa']);
                    }                       
                } else {
                    return response()->json(['mensaje'=>'El usuario ya esta en una grupo empresa']);
                }
            } else {
                return response()->json(['mensaje'=>'Usuario inexistente']);
            }
        } else {
            return response()->json(['mensaje'=>'Grupo Empresa Inexistente']);
        }
    }

    function crearUsuario(){
        return view('registroUsuario');
    }

    /*
        codSis => el codigo sis del estudiante que se esta registrando
        telefono => el telefono del estudiante
        nombreU => el nombre de usuario con el que podrá ingresar al sistema
        contrasenia => la contraseña con la que el estudiante podrá ingresar al sistema
        foto_perfil => imagen del usuario
    */
    function actualizarUsuario(Request $req){
        $dat = DB::table('Usuario')
                        ->where('codSis','=',$req->codsis)
                        ->first();
        if(isset($dat->idUsuario)){
            $usuario = Usuario::find($dat->idUsuario);
            if(!$usuario->registrado){
                $otrosUsuarios = DB::table('Usuario')
                                    ->where('nombreUsuario','=',$req->nombreU)
                                    ->where('idUsuario','<>',$usuario->idUsuario)
                                    ->get();
                if(sizeof($otrosUsuarios)<=0){
                    $usuario->nombreUsuario = $req->nombreU;
                    $usuario->telefono = $req->telefono;
                    $usuario->contrasenia = $req->contrasenia;
                    $usuario->registrado = true;

                    if($req->file('foto_perfil') != null){
                        $file = $req->file('foto_perfil');
                        $nombre =  time()."_".$file->getClientOriginalName();
                        $file->move('resources/socios', $nombre);
                        $usuario->foto_perfil = $nombre;
                    }

                    $usuario->save();
                
                    return response()->json($usuario);
                } else {
                    return response()->json(['mensaje' => "Ya existe otro usuario con el mismo nombre de usuario"]);
                }
            } else {
                return response()->json(['mensaje' => "Esta Cuenta Ya Fue Registrada"]);
            }
        } else {
            return response()->json(['mensaje' => "El usuario no existe"]);
        }
    }
}
