<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\ItemVenda;


class ItemVendaController extends Controller 
{
    public function novo(Request $request)
    {
        $novo = new ItemVenda();
        $novo->quantidade = $request->input('quantidade');
        $novo->venda_id = $request->input('venda_id');
        $novo->valor = $request->input('valor');
        $novo->codigo = $request->input('codigo');
        $novo->save();


        return response()->json($novo);
    }

    public function listar()
    {
        $vendas = ItemVenda::all();
        return $vendas;
    }


}