<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
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

    public function filtrarPorData(Request $request)
    {
        $data  = Carbon::parse($request->data);

        $inicial = Carbon::now();
        $inicial->year   = $data->year;
        $inicial->month  = $data->month;
        $inicial->day    = $data->day;
        $inicial->hour   = 0;
        $inicial->minute = 0;
        $inicial->second = 0;

        $final = Carbon::now();
        $final->year   = $data->year;
        $final->month  = $data->month;
        $final->day    = $data->day;
        $final->hour   = 23;
        $final->minute = 59;
        $final->second = 59;

        $resposta = MovimentoCaixa::where('data', '>=', $inicial->toDateTimeString())->where('data', '<=', $final->toDateTimeString())->get();

        
       
        return response()->json($resposta);
    }

    public function filtrarPorObservacao(Request $request)
    {
        $resposta = MovimentoCaixa::where('historico', 'like', "%{$request->observacao}%")->get();

        return response()->json($resposta);
    }
}