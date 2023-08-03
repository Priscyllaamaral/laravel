<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Vendedor;

class VendedorController extends Controller
{

    public function index()
    {
        return view('vendedor');
    }

    public function listar()
    {
        return Vendedor::all();
    }

    public function novo()
    {
        return view('vendedorNovo');
    }

    public function editar()
    {
        return view('vendedorNovo');
    }

    public function abrir(Vendedor $vendedor)
    {
        return response()->json($vendedor);
    }

    public function destroy($id)
    {
        $vendedor = Vendedor::findOrFail($id);
        $vendedor->delete();

        return "Vendedor Excluído com sucesso";
    }

    public function cadastrar(Request $request)
    {

        $vendedor = new Vendedor();
        $vendedor->nome = $request->input('nome');
        $vendedor->cpf = $request->input('cpf');
        $vendedor->rg = $request->input('rg');
        $vendedor->email = $request->input('email');
        $vendedor->celular = $request->input('celular');
        $vendedor->data_nascimento = $request->input('data_nascimento');
        $vendedor->save();

        return response()->json($vendedor);

    }

    public function atualizar(Request $request, Vendedor $vendedor)
    {
        
        $vendedor->nome = $request->input('nome');
        $vendedor->cpf = $request->input('cpf');
        $vendedor->rg = $request->input('rg');
        $vendedor->email = $request->input('email');
        $vendedor->celular = $request->input('celular');
        $vendedor->data_nascimento = $request->input('data_nascimento');
        $vendedor->save();
        
        return response()->json($cliente);
    }

    public function search(Request $request)
    { 


        if($request->search == ''){
            return Vendedor::all();
        }

        $query = Vendedor::where('nome',$request->search)
        ->orWhere('nome','like',"%{$request->search}%")
        ->orWhere('id','like',"%{$request->search}%")
        ->get();

        

        return $query;
 
    } 
}