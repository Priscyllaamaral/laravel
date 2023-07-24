<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\MovimentoEstoqueItem;

class MovimentoEstoqueItemController extends Controller
{
    public function novo(Request $request)
    {

        $movimento = new MovimentoEstoqueItem();
        $movimento->movimentoestoques_id = $request->input('movimentoestoques_id');
        $movimento->codigo = $request->input('codigo');
        $movimento->quantidade = $request->input('quantidade');
        $movimento->valor = $request->input('valor');
        $movimento->movimento = $request->input('movimento');
        $movimento->save();
        
        return response()->json($movimento);
    }

   
    function buscarItens($id) 
    {

        $resposta = MovimentoEstoqueItem::where('movimentoestoques_id', $id)->get();

        return $resposta;
        
    }

    public function destroy($id)
    {

        $movimentoItem = MovimentoEstoqueItem::findOrFail($id);
        $movimentoItem->delete();

        return "MovimentoItem Excluído com sucesso";


    }
   
}