<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GrupoEmpresa;
use Illuminate\Support\Facades\DB;
use Nette\Utils\Json;

class EditarGEController extends Controller
{
    function registrarCambiosGE(Request $req)
    {
        $grupoEmpresa = GrupoEmpresa::find($req->idGE);
        $grupoEmpresa->nombre = $req->nombre;
        $grupoEmpresa->nombreAb = $req->nombreAb;
        $grupoEmpresa->direccion = $req->direccion;
        $grupoEmpresa->email = $req->email;
        $grupoEmpresa->telefono = $req->telefono;
        $grupoEmpresa->orgJur = $req->orgJur;
        $grupoEmpresa->descripcion = $req->descripcion;

        $file = $req->file('logo');
        $nombre =  time() . "_" . $file->getClientOriginalName();
        $file->move('resources', $nombre);
        $grupoEmpresa->logo = $nombre;

        $file = $req->file('pdf');
        $nombre =  time() . "_" . $file->getClientOriginalName();
        $file->move('resources', $nombre);
        $file->delete('resources', $req->eliminar);
        /* File::delete(public_path("test.txt")); */

        $grupoEmpresa->save();

        return response(200);
    }

    function solicitarGE(request $req)
    {
        $response = DB::table('Grupo_Empresa')->get();
        return response()->json($response);
    }


    function index()
    {
        return view('editarGE');
    }

    function index_view($nombre)
    {
        $ge = DB::table('Grupo_Empresa')->select('nombre')->where('nombre', '=', $nombre)->first();
        if (!empty((array) $ge)) {
            $datos = [
                'nombre' => $ge->nombre
            ];
            return view('editarGE')->with($datos);
        }
        return view('login')->with(['msg' => $nombre]);
    }
}
