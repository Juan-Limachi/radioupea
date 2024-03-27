<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Integrante;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class IntegranteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listaInt = DB::table('integrantes')
            ->select('integrantes.*')
            ->where('integrantes.estado', '!=', 'ELIMINADO')
            ->orderBy('integrantes.id_int', 'DESC')->paginate(5);
        return view('integrantes.indexIntegrante', compact('listaInt'));
    }

    public function nuevoIntegrante()
    {
        $estados = ['ACTIVO', 'INACTIVO', 'ELIMINADO'];

        return view('integrantes.nuevoIntegranteForm', compact('estados'));
        // dd($estados);
    }

    public function guardarNuevoIntegrante(Request $request)
    {
        $request->validate([
            'imagen' => 'required|file|mimetypes:image/jpeg,image/jpg,image/png,video/mp4|max:2097152',
        ]);

        if ($request->has('imagen')) {
            $imagen = $request->file('imagen');
            $nombre_imagen = Str::slug(date('YmdHs')) . "." . $imagen->getClientOriginalExtension();
            $ruta = public_path('medias/integrantes/');
            $imagen->move($ruta, $nombre_imagen);
        } else {
            $nombre_imagen = '';
        }

        // SELECT integrantes.ci, integrantes.nombre, integrantes.paterno, integrantes.materno, users.name
        // FROM integrantes 
        // LEFT JOIN users ON integrantes.ci = users.ci
        // WHERE integrantes.ci = users.ci;

        $ci = $request->post('ci') . $request->post('complemento');
        $usuario = User::where('ci', $ci)->value('name') ?? 'SIN USUARIO';

        $obj = new Integrante();
        $obj->imagen = $nombre_imagen;
        $obj->ci = $request->post('ci');
        $obj->complemento = $request->post('complemento');
        $obj->nombre = $request->post('nombre');
        $obj->paterno = $request->post('paterno');
        $obj->materno = $request->post('materno');
        $obj->cargo = $request->post('cargo');
        $obj->name = $usuario;
        $obj->estado = 'ACTIVO';

        $obj->save();

        // dd($obj);

        return redirect('/integrantes')->with('success', 'Integrante guardado exitosamente.');
    }

    public function editarIntegrante($id_int)
    {
        $obj = DB::table('integrantes')->where('id_int', '=', $id_int)->first();
        $estados = ['ACTIVO', 'INACTIVO', 'ELIMINADO'];

        // dd($obj);
        return view('integrantes.editarIntegranteForm', compact('obj', 'estados'));
    }

    public function guardarEditarIntegrante(Request $request)
    {
        $request->validate([
            'imagen' => '|file|mimetypes:image/jpeg,image/jpg,image/png,video/mp4|max:2097152',
        ]);

        if ($request->post('imagen_cambiada')==='0'){
            $nombre_imagen = $request->post('imagenActual');
        } else {
            if ($request->has('imagen')) {
                $imagen = $request->file('imagen');
                $nombre_imagen = Str::slug(date('YmdHs')) . "." . $imagen->getClientOriginalExtension();
                $ruta = public_path('medias/integrantes/');
                $imagen->move($ruta, $nombre_imagen);
            } else {
                $nombre_imagen = 'noImage.png';
            }
        }

        $id_int = $request->post('id_int');
        $ci = $request->post('ci') . $request->post('complemento');
        $usuario = User::where('ci', $ci)->value('name') ?? 'SIN USUARIO';

        $obj = Integrante::find($id_int);

        $obj->imagen = $nombre_imagen;
        $obj->ci = $request->post('ci');
        $obj->complemento = $request->post('complemento');
        $obj->nombre = $request->post('nombre');
        $obj->paterno = $request->post('paterno');
        $obj->materno = $request->post('materno');
        $obj->cargo = $request->post('cargo');
        $obj->name = $usuario;
        $obj->estado = 'ACTIVO';

        // dd($obj);

        $obj->save();

        return redirect('/integrantes')->with('success', 'Integrante editado exitosamente.');
    }
    
    public function eliminarIntegrante($id_int){
        // echo ">".$id_user;
        $obj = DB::table('integrantes')->where('id_int', '=', $id_int)->first();
        $obj = Integrante::find($id_int);
        $obj->estado = 'ELIMINADO';
        $obj->save();
        // dd($obj); die();
        return redirect()->back();
    }
}
