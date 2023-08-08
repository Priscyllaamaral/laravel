<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\MovimentoCaixa;


class MovimentoCaixaController extends Controller
{

    public function cadastrar(Request $request)
    {

        $movimento = new MovimentoCaixa();
        $movimento->data = $request->input('data');
        $movimento->historico = $request->input('historico');
        $movimento->forma_pagamento = $request->input('forma_pagamento');
        $movimento->tipo = $request->input('tipo');
        $movimento->valor = $request->input('valor');
        $movimento->sangria = $request->input('sangria');
        $movimento->save();
    
        return response()->json($movimento);
    }

    public function movimentos()
    {
        return MovimentoCaixa::all();
    }

    public function destroy($id)
    {
        $caixa = MovimentoCaixa::findOrFail($id);
        $caixa->delete();

        return "Mov. Caixa Excluído com sucesso";
    }

}