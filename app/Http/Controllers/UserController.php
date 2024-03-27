<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // SELECT rols.nombre, users.*
        // FROM users
        // JOIN rols ON users.id_rol = rols.id_rol
        // WHERE users.estado != 'ELIMINADO'
        // ORDER BY users.id DESC;

        $listaUsu = DB::table('users')
            ->select('rols.nombre as rol_nombre', 'users.*')
            ->join('rols', 'users.id_rol', '=', 'rols.id_rol')
            ->where('users.estado', '!=', 'ELIMINADO')
            ->orderBy('users.id', 'DESC')->paginate(5);
        return view('users.indexUsuario', compact('listaUsu'));
    }

    public function nuevoUsuario()
    {
        $rols = DB::table('rols')->get();

        return view('users.nuevoUsuarioForm', compact('rols'));
    }

    public function guardarNuevoUsuario(Request $request)
    {
        $obj = new User();
        $obj->ci = $request->post('ci');
        $obj->nombre = $request->post('nombre');
        $obj->paterno = $request->post('paterno');
        $obj->materno = $request->post('materno');
        $obj->name = $request->post('paterno');
        $obj->email = $request->post('email');
        $obj->estado = 'ACTIVO';
        $obj->password = hash::make($request->post('ci'));
        $obj->id_rol = $request->post('id_rol');
        // dd($obj->password);
        $obj->save();

        return redirect('/usuarios')->with('success', 'Usuario guardado exitosamente.');
    }

    public function editarUsuario($id_user)
    {
        // echo ">".$id_user;
        $obj = DB::table('users')->where('id', '=', $id_user)->first();
        $rols = DB::table('rols')->get();
        $estados = ['ACTIVO', 'INACTIVO', 'ELIMINADO'];
        // dd($listado); die();
        return view('users.editarUsuarioForm', compact('obj', 'rols', 'estados'));
    }

    public function guardarEditarUsuario(Request $request)
    {
        $id = $request->post('id');
        $obj = User::withTrashed()->find($id);
        $obj->ci = $request->post('ci');
        $obj->nombre = $request->post('nombre');
        $obj->paterno = $request->post('paterno');
        $obj->materno = $request->post('materno');
        $obj->name = $request->post('usuario');
        $obj->email = $request->post('email');
        $obj->id_rol = $request->post('id_rol');
        $obj->estado = $request->post('estado');
        $obj->save();

        return redirect('/usuarios')->with('success', 'Usuario editado exitosamente.');
    }

    public function eliminarUsuario($id)
    {
        $usuario = User::find($id);
        
        if ($usuario) {
            $usuario->estado = 'INACTIVO';
            $usuario->save();
    
            // Eliminar al usuario
            $usuario->delete();

            // Cerrar la sesión del usuario si está autenticado
            if (Auth::check() && Auth::id() == $id) {
                Auth::logout();
                Auth::logoutOtherDevices($usuario); // Cerrar sesión en otros dispositivos
            }
        }
        return redirect()->back();
    }

    public function restablecerCredenciales($id)
    {
        $obj = User::withTrashed()->find($id);
        $obj->name = $obj->paterno;
        $obj->password = hash::make($obj->ci);
        $obj->save();

        if (Auth::check() && Auth::id() == $id) {
            Auth::logout();
            Auth::logoutOtherDevices($obj); // Cerrar sesión en otros dispositivos
        }
        // return $obj->password.' -- '. $obj->name;
        return redirect()->back();
    }

    public function activarUsuario($id)
    {
        $usuario = User::withTrashed()->find($id);
        $usuario->estado = 'ACTIVO';

        if ($usuario) {
            // Eliminar al usuario
            $usuario->restore();
        }
        $usuario->save();
        return redirect()->back();
    }
}
