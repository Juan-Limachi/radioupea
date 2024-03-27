<?php

namespace App\Http\Controllers;

use App\Models\Programa;
use Illuminate\Console\View\Components\Alert;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProgramaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // SELECT users.nombre, users.paterno, users.materno, programas.*
        // FROM programas JOIN users  ON programas.id_usu = users.id
        // WHERE programas.estado != 'ELIMINADO'
        // ORDER BY programas.id_pro DESC;

        $listaPro = DB::table('programas')
            ->select(DB::raw('CONCAT(users.nombre, " ", users.paterno, " ", users.materno) AS usuario'), 'programas.*')
            ->join('users', 'programas.id_usu', '=', 'users.id')
            ->where('programas.estado', '!=', 'ELIMINADO')
            ->orderByDesc('programas.id_pro')->paginate(5);
        return view('programas.indexPrograma', compact('listaPro'));
    }

    public function nuevoPrograma()
    {
        $users = DB::table('users')->get();
        $estados = ['AL AIRE', 'FUERA DE AIRE', 'ELIMINADO'];
        $formatos = ['IMAGEN', 'VIDEO'];
        $dias = ['LUNES', 'MARTES', 'MIERCOLES', 'JUEVES', 'VIERNES', 'SABADO', 'DOMINGO'];

        return view('programas.nuevoProgramaForm', compact('users', 'estados', 'formatos', 'dias'));
    }

    public function guardarNuevoPrograma(Request $request)
    {
        $request->validate([
            'portada' => 'required|file|mimetypes:image/jpeg,image/jpg,image/png,video/mp4|max:2097152',
        ]);

        if ($request->has('portada')) {
            $portada = $request->file('portada');
            $nombre_portada = Str::slug(date('YmdHs')) . "." . $portada->getClientOriginalExtension();
            if ($request->post('formato') == 'IMAGEN') {
                $ruta = public_path('medias/programas/img/');
            } else {
                $ruta = public_path('medias/programas/video/');
            }
            $portada->move($ruta, $nombre_portada);
        } else {
            $nombre_portada = '';
        }

        $diasSeleccionados = $request->post('dias', []);
        $dias = implode(' - ', $diasSeleccionados);

        $obj = new Programa();
        $obj->portada = $nombre_portada;
        $obj->formato = $request->post('formato');
        $obj->titulo = $request->post('titulo');
        $obj->descripcion = $request->post('descripcion');
        // $obj->estado = $request->post('estado');
        $obj->estado = 'AL AIRE';
        $obj->dias = $dias;
        $obj->hr_inicio = $request->post('inicio');
        $obj->hr_fin = $request->post('fin');
        $obj->id_usu = $request->post('usuario');
        $obj->save();

        // dd($dias);

        return redirect('/programas')->with('success', 'Programa guardado exitosamente.');
    }

    public function editarPrograma($id_pro)
    {
        $obj = DB::table('programas')->where('id_pro', '=', $id_pro)->first();
        $users = DB::table('users')->get();
        $estados = ['AL AIRE', 'FUERA DE AIRE', 'ELIMINADO'];
        $formatos = ['IMAGEN', 'VIDEO'];
        $dias = ['LUNES', 'MARTES', 'MIERCOLES', 'JUEVES', 'VIERNES', 'SABADO', 'DOMINGO'];

        $diasSeleccionados = DB::table('programas')->where('id_pro', $id_pro)->value('dias');;
        $diasArray = explode(' - ', $diasSeleccionados);

        return view('programas.editarProgramaForm', compact('obj', 'users', 'estados', 'formatos', 'dias', 'diasArray'));
    }

    public function guardarEditarPrograma(Request $request)
    {
        $request->validate([
            'portada' => 'file|mimetypes:image/jpeg,image/jpg,image/png,video/mp4|max:2097152'
        ]);

        if ($request->post('fileCambiado') === '0') {
            $nombre_portada = $request->post('fileActual');
        } else {
            if ($request->has('portada')) {
                $portada = $request->file('portada');
                $nombre_portada = Str::slug(date('YmdHs')) . "." . $portada->getClientOriginalExtension();

                if ($request->post('formato') == 'IMAGEN') {
                    $ruta = public_path('medias/programas/img/');
                } else {
                    $ruta = public_path('medias/programas/video/');
                }
                $portada->move($ruta, $nombre_portada);
            } else {
                $nombre_portada = 'noImage.png';
            }
        }

        $id_pro = $request->post('id_pro');

        $diasSeleccionados = $request->post('dias', []);
        $dias = implode(' - ', $diasSeleccionados);

        $obj = Programa::find($id_pro);
        $obj->portada = $nombre_portada;
        $obj->formato = $request->post('formato');
        $obj->titulo = $request->post('titulo');
        $obj->descripcion = $request->post('descripcion');
        $obj->estado = $request->post('estado');
        $obj->dias = $dias;
        $obj->hr_inicio = $request->post('inicio');
        $obj->hr_fin = $request->post('fin');
        $obj->id_usu = $request->post('usuario');
        $obj->estado = $request->post('estado');
        $obj->save();

        // dd($obj);

        return redirect('/programas')->with('success', 'Programa guardada exitosamente.');
    }

    public function eliminarPrograma($id_pro)
    {
        // echo ">".$id_user;
        $obj = DB::table('programas')->where('id_pro', '=', $id_pro)->first();
        $obj = Programa::find($id_pro);
        $obj->estado = 'ELIMINADO';
        $obj->save();
        // dd($listado); die();
        return redirect()->back();
    }
}
