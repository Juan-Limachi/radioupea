<?php

namespace App\Http\Controllers;

use App\Http\Requests\NoticiaRequest;
use App\Models\Noticia;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class NoticiaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // SELECT users.nombre, users.paterno, users.materno, noticias.*
        // FROM noticias JOIN users  ON noticias.id_usu = users.id
        // WHERE noticias.estado != 'ELIMINADA'
        // ORDER BY noticias.id_not DESC

        $listaNot = DB::table('noticias')
            ->select(DB::raw('CONCAT(users.nombre, " ", users.paterno, " ", users.materno) AS usuario'), 'noticias.*')
            ->join('users', 'noticias.id_usu', '=', 'users.id')
            ->where('noticias.estado', '!=', 'ELIMINADA')
            ->orderByDesc('noticias.fecha')->paginate(10);
        return view('noticias.indexNoticia', compact('listaNot'));
    }

    public function nuevaNoticia()
    {
        $users = DB::table('users')->get();
        $tipos = ['INSTITUCIONAL', 'SEGURIDAD', 'POLÍTICA', 'SOCIALES', 'EL ALTO', 'NACIONAL', 'INTERNACIONAL', 'ECONOMÍA', 'DEPORTES'];
        $formatos = ['IMAGEN', 'VIDEO'];

        return view('noticias.nuevaNoticiaForm', compact('users', 'tipos', 'formatos'));
    }

    public function guardarNuevaNoticia(Request $request)
    {
        $request->validate([
            'portada' => 'required|file|mimetypes:image/jpeg,image/jpg,image/png,video/mp4|max:2097152'
        ]);

        if ($request->has('portada')) {
            $portada = $request->file('portada');
            $nombre_portada = Str::slug(date('YmdHs')) . "." . $portada->getClientOriginalExtension();
            if ($request->post('formato') == 'IMAGEN') {
                $ruta = public_path('medias/noticias/img/');
            } else {
                $ruta = public_path('medias/noticias/video/');
            }
            $portada->move($ruta, $nombre_portada);
        } else {
            $nombre_portada = '';
        }

        $obj = new Noticia();
        $obj->portada = $nombre_portada;
        $obj->formato = $request->post('formato');
        $obj->tipo = $request->post('tipo');
        $obj->titulo = $request->post('titulo');
        $obj->nota = $request->post('nota');
        $obj->fecha = $request->post('fecha');
        $obj->id_usu = $request->post('usuario');
        $obj->estado = 'SUBIDA';
        $obj->save();

        // return $request;

        return redirect('/noticias')->with('success', 'Noticia guardada exitosamente.');
    }

    public function editarNoticia($id_not)
    {
        $obj = DB::table('noticias')->where('id_not', '=', $id_not)->first();
        $users = DB::table('users')->get();
        $tipos = ['INSTITUCIONAL', 'SEGURIDAD', 'POLÍTICA', 'SOCIALES', 'EL ALTO', 'NACIONAL', 'INTERNACIONAL', 'ECONOMÍA', 'DEPORTES'];
        $formatos = ['IMAGEN', 'VIDEO'];
        // dd($listado); die();
        return view('noticias.editarNoticiaForm', compact('obj', 'users', 'tipos', 'formatos'));
    }

    public function guardarEditarNoticia(Request $request)
    {
        $request->validate([
            'portada' => '|file|mimetypes:image/jpeg,image/jpg,image/png,video/mp4|max:2097152'
        ]);

        if ($request->post('fileCambiado') === '0') {
            $nombre_portada = $request->post('fileActual');
        } else {
            if ($request->has('portada')) {
                $portada = $request->file('portada');
                $nombre_portada = Str::slug(date('YmdHs')) . "." . $portada->getClientOriginalExtension();
                if ($request->post('formato') == 'IMAGEN') {
                    $ruta = public_path('medias/noticias/img/');
                } else {
                    $ruta = public_path('medias/noticias/video/');
                }
                $portada->move($ruta, $nombre_portada);
            } else {
                $nombre_portada = 'noImage.png';
            }
        }

        // dd($request);

        $id_not = $request->post('id_not');

        $obj = Noticia::find($id_not);
        $obj->portada = $nombre_portada;
        $obj->formato = $request->post('formato');
        $obj->tipo = $request->post('tipo');
        $obj->titulo = $request->post('titulo');
        $obj->nota = $request->post('nota');
        $obj->fecha = $request->post('fecha');
        $obj->id_usu = $request->post('usuario');
        $obj->estado = 'SUBIDA';
        $obj->save();

        // return $request;

        return redirect('/noticias')->with('success', 'Noticia editada exitosamente.');
    }

    public function eliminarNoticia($id_not)
    {
        // echo ">".$id_user;
        $obj = DB::table('noticias')->where('id_not', '=', $id_not)->first();
        $obj = Noticia::find($id_not);
        $obj->estado = 'ELIMINADA';
        $obj->save();
        // dd($listado); die();
        return redirect()->back();
    }
}
