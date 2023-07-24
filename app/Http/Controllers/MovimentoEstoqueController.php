<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\MovimentoEstoque;
use App\MovimentoEstoqueItem;


class MovimentoEstoqueController extends Controller
{
    public function index()
    {
        return view('movEstoque');
    }
   
    public function lista()
    {
        return view('listarMov');
    }

    function editar() {

        return view('movEstoque');
    }

    public function novo(Request $request)
    {

        $movimentoSalvar = new MovimentoEstoque();
        $movimentoSalvar->movimento = $request->input('movimento');
        $movimentoSalvar->fornecedor_id = $request->input('fornecedor_id');
        $movimentoSalvar->data = $request->input('data');
        
        $novosProduto = $request->input('itens');

        $movimentoSalvar->save();

        foreach ($novosProduto as $item) {
            $newItem = new MovimentoEstoqueItem();
            $newItem->movimentoestoques_id = $movimentoSalvar->id;
            $newItem->movimento = $movimentoSalvar->movimento;
            $newItem->codigo = $item['codigo'];
            $newItem->valor = $item['valor'];
            $newItem->quantidade = $item['quantidade'];
            $newItem->save();
        }
        
        return response()->json($movimentoSalvar);
    }   

    public function atualizar(Request $request, MovimentoEstoque $movimento)
    {
        // dd($request->all());
        $movimento->movimento = $request->input('movimento');
        $movimento->fornecedor_id = $request->input('fornecedor_id');
        $movimento->data = $request->input('data');
        //$movimento->save();

        $movimento->load('itens');

        $movimento->itens()->delete();

        $novosProduto = $request->input('itens');


        foreach ($novosProduto as $item) {
            $newItem = new MovimentoEstoqueItem();
            $newItem->movimentoestoques_id = $movimento->id;
            $newItem->movimento = $movimento->movimento;
            $newItem->codigo = $item['codigo'];
            $newItem->valor = $item['valor'];
            $newItem->quantidade = $item['quantidade'];
            //$newItem->quantidade = $this->valorUS($item['quantidade']);
            $newItem->save();
        }

        $movimento->save();
        
        return response()->json($movimento);
        //return "OK";
    }

    public function buscar() {

        $movimentos = MovimentoEstoque::all();
        $movimentos->load('fornecedor');

        //dd($produtos);
      
        return response()->json($movimentos);
    }

    public function abrir(MovimentoEstoque $movimento)
    {
    //$movimento->load('itens', 'itens.produto', 'fornecedor');
        $movimento->load('itens', 'itens.produto', 'fornecedor');

        $produtos = $movimento->itens->transform(function($item) {
            $item->nome = $item->produto->nome;
            return $item;
        });

        $movimento->produtos = $produtos;
        
        return response()->json($movimento);
    }


    public function destroy($id){

        $movimento = MovimentoEstoque::findOrFail($id);
        $movimento->load('itens');
        $movimento->itens()->delete();
        $movimento->delete();

        return "Movimento Excluído com sucesso";


    }
   
}