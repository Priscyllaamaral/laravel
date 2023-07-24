<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Venda;
use App\ItemVenda;
use Carbon\Carbon;

class VendasController extends Controller
{

    public function index()
    {
        return view('venda');
    }
    public function index2()
    {
        // $hoje = Carbon::now();
        // dd($hoje);
        return view('tabsvenda');
    }

    public function editar()
    {
        return view('tabsvenda');
    }

    public function listar()
    {
        $vendas = Venda::all();
        $vendas->load('cliente');
        return $vendas;
    }

    public function novo(Request $request)
    {
        $venda = new Venda();
        $venda->cliente_id = $request->input('cliente_id');
        $venda->data = $request->input('data');
        $venda->status = $request->input('status');
        $venda->forma_pagamento = $request->input('forma_pagamento');
        $venda->desconto = $request->input('desconto');
        $venda->acrescimo = $request->input('acrescimo');
        $venda->tabela = $request->input('tabela');
        $venda->cancelada = $request->input('cancelada');

        $itens = $request->input('itens');
        $venda->save();

        foreach($itens as $item){
            $newItem = new ItemVenda();
            $newItem->venda_id = $venda->id;
            $newItem->quantidade = $item['quantidade'];
            $newItem->codigo = $item['codigo'];
            $newItem->valor = $item['valor'];
            $newItem->save();
        }

        // $venc = Carbon::createFromFormat($vencimento, 'DD/MM/YYYY')->format('YYYY-MM-DD');
        
        // $parcela = new Parcela();
        // $parcela->vencimento = $venc;
        // $parcela->save();
        
        return response()->json($venda);
    }

    public function atualizar(Request $request, Venda $venda)
    {
        $venda->cliente_id = $request->input('cliente_id');
        $venda->data = $request->input('data');
        $venda->status = $request->input('status');
        $venda->forma_pagamento = $request->input('forma_pagamento');
        $venda->desconto = $request->input('desconto');
        $venda->acrescimo = $request->input('acrescimo');
        $venda->tabela = $request->input('tabela');
        $venda->cancelada = $request->input('cancelada');

        $venda->load('itens');
        $venda->itens()->delete();

        $itens = $request->input('itens');
        

        foreach($itens as $item){
            $newItem = new ItemVenda();
            $newItem->venda_id = $venda->id;
            $newItem->quantidade = $item['quantidade'];
            $newItem->codigo = $item['codigo'];
            $newItem->valor = $item['valor'];
            $newItem->save();
        }

        $venda->save();

        return response()->json($venda);
    }

    public function abrir(Venda $venda)
    {

        $venda->load('itens', 'cliente');

        $produtos = $venda->itens->transform(function($item) {
            $item->nome = $item->produto->nome;
            $item->valor_vista = $item->produto->valor_vista;
            $item->valor_prazo = $item->produto->valor_prazo;
            return $item;
        });

        $venda->produtos = $produtos;

     
        return response()->json($venda);
    }

    public function destroy($id){

        $venda = Venda::findOrFail($id);
        $venda->load('itens');
        $venda->itens()->delete();
        $venda->delete();

        return "Venda Excluída com sucesso";


    }

   
}