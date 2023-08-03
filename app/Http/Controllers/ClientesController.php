<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Cliente;

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

    public function listar()
    {
        return Cliente::all();
    }

    public function editar()
    {
        return view('cadastro.clientes.clientes');
    }

    public function abrir(Cliente $cliente)
    {
        return response()->json($cliente);
    }

    public function cadastrar(Request $request)
    {

        $cliente = new Cliente();
        $cliente->nome = $request->input('nome');
        $cliente->celular = $request->input('celular');
        $cliente->email = $request->input('email');
        $cliente->cpf = $request->input('cpf');
        $cliente->premium = $request->input('premium');
        $cliente->codigo = $request->input('codigo');
        $cliente->save();
        
        return response()->json($cliente);
    }

    public function destroy($id)
    {
        $cliente = Cliente::findOrFail($id);
        $cliente->delete();

        return "Produto Excluído com sucesso";
    }

    public function atualizar(Request $request, Cliente $cliente)
    {
        // return $request->all();

        $cliente->nome = $request->input('nome');
        $cliente->email = $request->input('email');
        $cliente->cpf = $request->input('cpf');
        $cliente->celular = $request->input('celular');
        $cliente->premium = $request->input('premium');
        $cliente->save();

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