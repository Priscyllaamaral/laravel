<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Cliente;
use App\Endereco;


class ClientesController extends Controller
{

    public function index()
    {
        return view('cadastro.clientes.listar');
    }

    public function clientes()
    {
        return view('cadastro.clientes.clientes');
    }

    public function listar(Request $request)
    {
        // dd($request->all());
        $pular = $request->input('pular');

        return Cliente::skip($pular)
            ->take(3)
            ->orderby('id', 'desc')
            ->get();
    }

    public function editar()
    {
        return view('cadastro.clientes.clientes');
    }

    public function abrir(Cliente $cliente)
    {
        if($cliente->endereco_id != null){
            $cliente->load('endereco');
        }
        
        return response()->json($cliente);
    }

    public function cadastrar(Request $request)
    {
        $novoEndereco = $request->input('endereco');
        if($novoEndereco['logradouro'] != null) {

            $endereco = new Endereco();
            $endereco->logradouro = $novoEndereco['logradouro'];
            $endereco->numero = $novoEndereco['numero'];
            $endereco->bairro = $novoEndereco['bairro'];
            $endereco->complemento = $novoEndereco['complemento'];
            $endereco->ponto_referencia = $novoEndereco['ponto_referencia'];
            $endereco->cidade = $novoEndereco['cidade'];
            $endereco->estado = $novoEndereco['estado'];
            $endereco->codigo_postal = $novoEndereco['codigo_postal'];
            $endereco->save();

            $cliente = new Cliente();
            $cliente->nome = $request->input('nome');
            $cliente->celular = $request->input('celular');
            $cliente->email = $request->input('email');
            $cliente->cpf = $request->input('cpf');
            $cliente->premium = $request->input('premium');
            $cliente->codigo = $request->input('codigo');
            $cliente->endereco_id = $endereco->id;  
            $cliente->save();
            
        }else {

            $cliente = new Cliente();
            $cliente->nome = $request->input('nome');
            $cliente->celular = $request->input('celular');
            $cliente->email = $request->input('email');
            $cliente->cpf = $request->input('cpf');
            $cliente->premium = $request->input('premium');
            $cliente->codigo = $request->input('codigo');
            $cliente->save();

        }

        
        

        return response()->json($cliente);
    }

    public function destroy($id)
    {
        $cliente = Cliente::findOrFail($id);
        $cliente->load('endereco');
        $cliente->endereco()->delete();
        $cliente->delete();

        return "Produto Excluído com sucesso";
    }

    public function atualizar(Request $request, Cliente $cliente)
    {
        // return $request->all();

        
        $novoEndereco = $request->input('endereco');

        if($novoEndereco['id'] == null && $novoEndereco['logradouro'] != null) {

            $endereco = new Endereco();
            $endereco->logradouro = $novoEndereco['logradouro'];
            $endereco->numero = $novoEndereco['numero'];
            $endereco->bairro = $novoEndereco['bairro'];
            $endereco->complemento = $novoEndereco['complemento'];
            $endereco->ponto_referencia = $novoEndereco['ponto_referencia'];
            $endereco->cidade = $novoEndereco['cidade'];
            $endereco->estado = $novoEndereco['estado'];
            $endereco->codigo_postal = $novoEndereco['codigo_postal'];
            $endereco->save();

            $cliente->nome = $request->input('nome');
            $cliente->email = $request->input('email');
            $cliente->cpf = $request->input('cpf');
            $cliente->celular = $request->input('celular');
            $cliente->premium = $request->input('premium');
            $cliente->endereco_id = $endereco->id;
            //$cliente->endereco_id = $request->input('endereco_id');
            $cliente->save();

        } else if($novoEndereco['id'] == null && $novoEndereco['logradouro'] == null) {

            $cliente->nome = $request->input('nome');
            $cliente->email = $request->input('email');
            $cliente->cpf = $request->input('cpf');
            $cliente->celular = $request->input('celular');
            $cliente->premium = $request->input('premium');
            //$cliente->endereco_id = $request->input('endereco_id');
            $cliente->save();

        } else{

            $cliente->nome = $request->input('nome');
            $cliente->email = $request->input('email');
            $cliente->cpf = $request->input('cpf');
            $cliente->celular = $request->input('celular');
            $cliente->premium = $request->input('premium');
            //$cliente->endereco_id = $request->input('endereco_id');
            $cliente->save();

            $cliente->endereco()->update($request->input('endereco'));
        }

        

        

        //return redirect()->route('login');
        return response()->json($cliente);
    }


    public function buscarIdEndereco($id){

        $cliente = Cliente::findOrFail($id);

        return $cliente;
    }

    public function search(Request $request)
    { 


        if($request->search == ''){
            return Cliente::all();
        }

        $query = Cliente::where('nome',$request->search)
        ->orWhere('nome','like',"%{$request->search}%")
        ->orWhere('codigo','like',"%{$request->search}%")
        ->orWhere('codigo','like',"%{$request->search}%")
        ->get();

        

        return $query;
 
    } 
   
}