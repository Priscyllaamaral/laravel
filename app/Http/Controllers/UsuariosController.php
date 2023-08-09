<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;

class UsuariosController extends Controller
{

    public function novo()
    {
        return view('usuario');
    }

    public function buscar()
    {
        return User::all();
    }

    public function editar()
    {
        return view('usuario');
    }

    public function abrir(User $user)
    {
        //dd($user);
        return response()->json($user);
    }

    public function cadastrar(Request $request)
    {

        $usuario = new User();
        $usuario->name = $request->input('name');
        $usuario->email = $request->input('email');
        $usuario->password = bcrypt($request->input('password'));
        $usuario->nivel = $request->input('nivel');
        $usuario->nivel2 = $request->input('nivel2');
        $usuario->ativo = $request->input('ativo');
        $usuario->save();

        return response()->json($usuario);
    }

    public function atualizar(Request $request, User $usuario)
    {

        $usuario->name = $request->input('name');
        $usuario->email = $request->input('email');
        $usuario->password = bcrypt($request->input('password'));
        $usuario->nivel = $request->input('nivel');
        $usuario->nivel2 = $request->input('nivel2');
        $usuario->ativo = $request->input('ativo');
        $usuario->save();

        return response()->json($usuario);
    }

    public function destroy($id)
    {
        $usuario = User::findOrFail($id);
        $usuario->delete();

        return 'Deletado com sucesso';
    }
}