<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Despesa;

class DespesaController extends Controller
{
    public function index()
    {
        return view('movimentacoes.despesas.listar');
    }

    public function despesas(Request $request)
    {


        $resposta = Despesa::join('fornecedors', 'fornecedors.id', '=', 'despesas.fornecedor')
        ->join('plano_contas', 'plano_contas.id', '=', 'despesas.plano_de_contas')
        ->select('despesas.id','fornecedors.nome', 'plano_contas.descricao','despesas.data', 'despesas.valor', 'despesas.tipo');

        if ($request->nomeFornecedor) {
            $resposta->where('fornecedors.nome', '=', $request->nomeFornecedor);
        }

        if ($request->planoConta) {
            $resposta->where('plano_contas.descricao', '=', $request->planoConta);
        }

        if ($request->tipo) {
            $resposta->where('despesas.tipo', '=', $request->tipo);
        }
        if ($request->dataInicio) {
            $resposta->where('despesas.data', '>=', $request->dataInicio);
        }
        if ($request->dataFim) {
            $resposta->where('despesas.data', '<=', $request->dataFim);
        }

        return $resposta->get();
    }

    public function nova()
    {
        return view('movimentacoes.despesas.despesas');
    }

    
    public function abrir(Despesa $despesa)
    {
        // return $request->all();

        return response()->json($despesa);
    }

    public function editar()
    {
        return view('movimentacoes.despesas.despesas');
        
    }    

    public function cadastrar(Request $request)
    {
        // return $request->all();

        $desp = new Despesa();
        $desp->fornecedor = $request->input('fornecedor');
        $desp->plano_de_contas = $request->input('plano_de_contas');
        $desp->valor = $this->valorUS($request->input('valor'));
        $desp->tipo = $request->input('tipo');
        $desp->data = $request->input('data');
        $desp->save();

        //return redirect()->route('login');
        return response()->json($desp);
    }

    public function atualizar(Request $request, Despesa $despesa)
    {
        // return $request->all();

        $despesa->fornecedor = $request->input('fornecedor');
        $despesa->plano_de_contas = $request->input('plano_de_contas');
        $despesa->valor = $this->valorUS($request->input('valor'));
        $despesa->tipo = $request->input('tipo');
        $despesa->data = $request->input('data');
        $despesa->save();

        //return redirect()->route('login');
        return response()->json($despesa);
    }

    public function valorUS($valor)
    {
        if (is_float($valor)) {
            return $valor;
        }

        return floatval(str_replace(',', '.', str_replace('.', '', $valor)));
    }

    public function search(Request $request)
    { 


        $query = User::all()->where('name', '=', $request->search);

        if($request->search == ''){
            return Despesa::all();
        }

        //$todos = $query->paginate();
        //$filtrado = User::query()->where('name', '=', $request->search );

    

        //echo($query);
        return $query;
        //return $filtrado->paginate();
        //return User::all();
    } 

    public function destroy($id){

        $despesa = Despesa::findOrFail($id);
        $despesa->delete();

        return "Produto Excluído com sucesso";


    }
}
