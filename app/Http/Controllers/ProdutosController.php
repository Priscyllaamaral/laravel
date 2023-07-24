<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Produto;

class ProdutosController extends Controller
{

    public function index()
    {
        return view('produtos.listar');
    }

    public function listar()
    {
        $produtos = Produto::all();

        //$produtos->transform(function($produto) {
        //    $produto->estoque = $this->movimentoDeEstoque($produto);
        //    return $produto;
        //});

        return $produtos;
    }

    public function search(Request $request)
    { 


        if($request->search == ''){
            return Produto::all();
        }

        $query = Produto::where('nome',$request->search)
        ->orWhere('nome','like',"%{$request->search}%")
        ->orWhere('codigo','like',"%{$request->search}%")
        ->orWhere('codigo','like',"%{$request->search}%")
        ->get();

        

        return $query;
 
    } 

    public function abrir(Produto $produto)
    {

        return response()->json($produto);
    }

    public function produto()
    {
        return view('produtos.produtos');
    }
   
    public function destroy($id)
    {

        $produto = Produto::findOrFail($id);
        $produto->delete();

        return "Produto Excluído com sucesso";
    }

    public function localizar(Request $request)
    {

        $produto = Produto::where('codigo', $request->codigo)->count();

        if($produto != 0){
            return 1;
        }

        return 0;
    }

    public function editar()
    {
        return view('produtos.produtos');
    }

    public function novo(Request $request)
    {

        $produto = new Produto();
        $produto->codigo = $request->input('codigo');
        $produto->nome = $request->input('nome');
        $produto->descricao = $request->input('descricao');
        $produto->valor_vista = $request->input('valor_vista');
        $produto->valor_atacado = $request->input('valor_atacado');
        $produto->valor_custo = $request->input('valor_custo');
        $produto->valor_prazo = $request->input('valor_prazo');
        $produto->quantidade = $request->input('quantidade');
        $produto->unidade = $request->input('unidade');
        $produto->ativo = $request->input('ativo');
        $produto->fornecedor_id = $request->input('fornecedor_id');
        $produto->save();
        
        return response()->json($produto);
    }

    public function atualizar(Request $request, Produto $produto)
    {
        // return $request->all();

        $produto->codigo = $request->input('codigo');
        $produto->nome = $request->input('nome');
        $produto->descricao = $request->input('descricao');
        $produto->valor_vista = $request->input('valor_vista');
        $produto->valor_atacado = $request->input('valor_atacado');
        $produto->valor_custo = $request->input('valor_custo');
        $produto->valor_prazo = $request->input('valor_prazo');
        $produto->quantidade = $request->input('quantidade');
        $produto->unidade = $request->input('unidade');
        $produto->ativo = $request->input('ativo');
        $produto->fornecedor_id = $request->input('fornecedor_id');
        $produto->save();;

        //return redirect()->route('login');
        return response()->json($produto);
    }
    
    public function movimentoDeEstoque(Request $request, Produto $produto) {
        $entradas = MovimentoEstoqueItem::where('codigo', $produto->codigo)
            ->where('movimento', 'Entrada')
            ->sum('quantidade');

        $saidas = VendaItem::where('codigo', $produto->codigo)
            ->sum('quantidade');

        $result = $entradas - $saidas;

        return $result;
    }

    public function buscarProdutos($request){

        $resposta = Produto::where("codigo", $request)->get();

        return $resposta;
    }
   
}