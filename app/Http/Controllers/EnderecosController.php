<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Endereco;

class EnderecosController extends Controller
{
    public function cadastrar(Request $request)
    {
       

        $endereco = new Endereco();
        $endereco->rua = $request->input('rua');
        $endereco->cidade = $request->input('cidade');
        $endereco->estado = $request->input('estado');
        $endereco->codigo_postal = $request->input('codigo_postal');
        $endereco->id_cliente = $request->input('id_cliente');
        $endereco->save();

       
        return response()->json($endereco);
    }

    public function atualizar(Request $request, Endereco $endereco)
    {

        $endereco->rua = $request->input('rua');
        $endereco->cidade = $request->input('cidade');
        $endereco->estado = $request->input('estado');
        $endereco->codigo_postal = $request->input('codigo_postal');
        $endereco->id_cliente = $request->input('id_cliente');
        $endereco->save();

        return response()->json($endereco);
    }

    public function abrir($id)
    {
        $endereco = Endereco::where('id_cliente', '=', $id)->get();

        return response()->json($endereco);
    }
}
