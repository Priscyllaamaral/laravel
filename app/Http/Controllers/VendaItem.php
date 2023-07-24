<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\VendaItem;

class VendaItem extends Controller
{

    
    public function novo(Request $request)
    {
        $novo = new VendaItem();
        $novo->quantidade = $request->input('quantidade');
        $novo->venda_id = $request->input('venda_id');
        $novo->codigo = $request->input('codigo');
        $novo->valor = $request->input('valor');
        $novo->save();


        return response()->json($novo);
    }

   
}