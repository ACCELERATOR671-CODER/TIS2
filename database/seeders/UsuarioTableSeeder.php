<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsuarioTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        return DB::table('Usuario')->insert([
            [
                "idUsuario" => "1",
                "nombreC" => "Lionel",
                "email" => "201400001@est.umss.edu",
                "telefono" => "75845785",
                "codSis" => "201400001",
                "foto_perfil" => "1636248844_messiPelon.jpg",
                "nombreUsuario" => "messientocalvo",
                "contrasenia" => "calvo123",
                "idCarrera" => "1",
                "idGrupo" => "1",
                "administrador" => "true",
                "registrado" => "true"
            ],
            [
                "idUsuario" => "2",
                "nombreC" => "Henry Jaruslav",
                "email" => "201400002@est.umss.edu",
                "telefono" => "78451313",
                "codSis" => "201400002",
                "foto_perfil" => "1636248902_gigachad.jpg",
                "nombreUsuario" => "mamani123",
                "contrasenia" => "elhenry",
                "idCarrera" => "2",
                "idGrupo" => "2",
                "administrador" => "false",
                "registrado" => "true"
            ],
            [
                "idUsuario" => "3",
                "nombreC" => "Margarita Villaroel Perez",
                "email" => "201400003@est.umss.edu",
                "telefono" => "79868564",
                "codSis" => "201400003",
                "foto_perfil" => "1636249064_woman.jpg",
                "nombreUsuario" => "margarita456",
                "contrasenia" => "villaroel456",
                "idCarrera" => "1",
                "idGrupo" => "3",
                "administrador" => "false",
                "registrado" => "true"
            ],
            [
                "idUsuario" => "4",
                "nombreC" => "Perez",
                "email" => "201400003@est.umss.edu",
                "telefono" => "79868564",
                "codSis" => "201400003",
                "foto_perfil" => "1636249064_woman.jpg",
                "nombreUsuario" => "margarita456",
                "contrasenia" => "villaroel456",
                "idCarrera" => "1",
                "idGrupo" => "1",
                "administrador" => "false",
                "registrado" => "true"
            ],
            [
                "idUsuario" => "5",
                "nombreC" => "Perez jorge",
                "email" => "201400003@est.umss.edu",
                "telefono" => "79868564",
                "codSis" => "201400003",
                "foto_perfil" => "1636249064_woman.jpg",
                "nombreUsuario" => "margar",
                "contrasenia" => "villaro6",
                "idCarrera" => "1",
                "idGrupo" => "1",
                "administrador" => "false",
                "registrado" => "true"
            ],
            [
                "idUsuario" => "6",
                "nombreC" => "Rodriguez benabides alvaro",
                "email" => "201400003@est.umss.edu",
                "telefono" => "79868564",
                "codSis" => "201400003",
                "foto_perfil" => "1636249064_woman.jpg",
                "nombreUsuario" => "marrita456",
                "contrasenia" => "villar456",
                "idCarrera" => "1",
                "idGrupo" => "3",
                "administrador" => "false",
                "registrado" => "true"
            ],
            [
                "idUsuario" => "7",
                "nombreC" => "Perez roca",
                "email" => "201400003@est.umss.edu",
                "telefono" => null,
                "codSis" => "201400007",
                "foto_perfil" => null,
                "nombreUsuario" => null,
                "contrasenia" => null,
                "idCarrera" => "1",
                "idGrupo" => "3",
                "administrador" => "false",
                "registrado" => "false"
            ],
            [
                "idUsuario" => "8",
                "nombreC" => "Rocabado fernando",
                "email" => "201400003@est.umss.edu",
                "telefono" => null,
                "codSis" => "201400008",
                "foto_perfil" => null,
                "nombreUsuario" => null,
                "contrasenia" => null,
                "idCarrera" => "1",
                "idGrupo" => "1",
                "administrador" => "false",
                "registrado" => "false"
            ],
            [
                "idUsuario" => "9",
                "nombreC" => "Juan Perez soliz",
                "email" => "201400003@est.umss.edu",
                "telefono" => null,
                "codSis" => "201400009",
                "foto_perfil" => null,
                "nombreUsuario" => null,
                "contrasenia" => null,
                "idCarrera" => "1",
                "idGrupo" => "1",
                "administrador" => "false",
                "registrado" => "false"
            ]
        ]);
    }
}
