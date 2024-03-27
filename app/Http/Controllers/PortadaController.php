<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Programa;
use App\Models\Noticia;
use App\Models\Integrante;


class PortadaController extends Controller
{
    public function welcome()
    {
        $listaPro = DB::table('programas')
            ->select(DB::raw('CONCAT(users.nombre, " ", users.paterno, " ", users.materno) AS usuario'), 'programas.*')
            ->join('users', 'programas.id_usu', '=', 'users.id')
            ->where('programas.estado', '!=', 'ELIMINADO')
            ->orderBy('programas.id_pro', 'ASC')->get();

        $listaNot = DB::table('noticias')
            ->select(DB::raw('CONCAT(users.nombre, " ", users.paterno, " ", users.materno) AS usuario'), 'noticias.*')
            ->join('users', 'noticias.id_usu', '=', 'users.id')
            ->where('noticias.estado', '!=', 'ELIMINADA')
            ->orderBy('noticias.fecha', 'ASC')->take(5)->get();

        $listaInt = DB::table('integrantes')
            ->select('integrantes.*')
            ->where('integrantes.estado', '!=', 'ELIMINADO')
            ->orderBy('integrantes.id_int', 'ASC')->get();

        $categoria = "";

        // dd($listaPro, $listaNot);
        return view('welcome', compact('listaPro', 'listaNot', 'listaInt', 'categoria'));
    }

    public function portadaProgramas()
    {
        $listaPro = DB::table('programas')
            ->select(DB::raw('CONCAT(users.nombre, " ", users.paterno, " ", users.materno) AS usuario'), 'programas.*')
            ->join('users', 'programas.id_usu', '=', 'users.id')
            ->where('programas.estado', '!=', 'ELIMINADO')
            ->orderBy('programas.id_pro', 'ASC')->paginate(4);

        $categoria = "";

        return view('portadaProgramas', compact('listaPro', 'categoria'));
    }

    public function portadaNoticias($categoria)
    {
        if ($categoria == 'todo') {
            $listaNot = DB::table('noticias')
                ->select(DB::raw('CONCAT(users.nombre, " ", users.paterno, " ", users.materno) AS usuario'), 'noticias.*')
                ->join('users', 'noticias.id_usu', '=', 'users.id')
                ->where('noticias.estado', '!=', 'ELIMINADA')
                ->orderByDesc('noticias.id_not')->paginate(4);
        } else {
            $listaNot = DB::table('noticias')
                ->select(DB::raw('CONCAT(users.nombre, " ", users.paterno, " ", users.materno) AS usuario'), 'noticias.*')
                ->join('users', 'noticias.id_usu', '=', 'users.id')
                ->where('noticias.tipo', '=', $categoria)
                ->where('noticias.estado', '!=', 'ELIMINADA')
                ->orderByDesc('noticias.id_not')->paginate(4);
        }

        return view('portadaNoticias', compact('listaNot', 'categoria'));
    }
}
