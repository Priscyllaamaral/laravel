<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Fornecedor;
use App\FornecedorEnderecos;
use App\FornecedorObservacoes;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Image; //composer require intervention/image


class FornecedorController extends Controller
{
    public function index()
    {
        return view('fornecedor');
    }

    public function tela()
    {
        return view('fornecedorTabs');
    }

    public function listarFornecedores()
    {
        return view('fornecedoresListar');
    }

    public function editar()
    {
        return view('fornecedorTabs');
    }

    public function listar()
    {
        // $fornecedores = Fornecedor::all();
        // dd($fornecedores);
        return Fornecedor::all();
    }

    public function search(Request $request)
    { 

        if($request->search == ''){
            return Fornecedor::all()->take(10);
        }

        //$query = Fornecedor::all()->where('nome', '=', $request->search );

        $query = Fornecedor::where('nome',$request->search)->orWhere('nome','like',"%{$request->search}%")->get();

        

        return $query;
 
    } 

    public function abrir(Fornecedor $fornecedor)
    {
        $fornecedor->foto = base64_decode($fornecedor->foto);
        $fornecedor->load('endereco');
        $fornecedor->load('observacao');
        
        return response()->json($fornecedor);
    }


    public function atualizar(Request $request, Fornecedor $fornecedor)
    {


        if ($request->filled('foto')) {
            $fornecedor->foto = base64_encode($request->input('foto'));     
        }

        $fornecedor->nome = $request->input('nome');
        $fornecedor->cpfcnpj = $request->input('cpfcnpj');
        $fornecedor->email = $request->input('email');
        $fornecedor->rg = $request->input('rg');
        $fornecedor->data_nascimento = $request->input('data_nascimento');
        $fornecedor->celular = $request->input('celular');
        $fornecedor->save();

        $fornecedor->endereco()->update($request->input('endereco'));
        $fornecedor->observacao()->update($request->input('observacao'));
     

    }


    public function salvar(Request $request)
    {
    
        $fornecedor = new Fornecedor();
        if ($request->filled('foto')) {
            $fornecedor->foto = base64_encode($request->input('foto'));     
        }

        $fornecedor->nome = $request->input('nome');
        $fornecedor->cpfcnpj = $request->input('cpfcnpj');
        $fornecedor->email = $request->input('email');
        $fornecedor->rg = $request->input('rg');
        $fornecedor->data_nascimento = $request->input('data_nascimento');
        $fornecedor->celular = $request->input('celular');
        $fornecedor->save();

        $endereco = new FornecedorEnderecos ();
        $novoEndereco = $request->input('endereco');
        $endereco->rua = $novoEndereco['rua'];
        $endereco->cidade = $novoEndereco['cidade'];
        $endereco->estado = $novoEndereco['estado'];
        $endereco->cep = $novoEndereco['cep'];
        $endereco->numero = $novoEndereco['numero'];
        $endereco->bairro = $novoEndereco['bairro'];
        $endereco->complemento = $novoEndereco['complemento'];
        $endereco->ponto_referencia = $novoEndereco['ponto_referencia'];
        $endereco->fornecedor_id = $fornecedor->id;
        $endereco->save();

        $observacao = new FornecedorObservacoes ();
        $novaObservacao = $request->input('observacao');
        $observacao->comissao = $novaObservacao['comissao'];
        $observacao->status = $novaObservacao['status'];
        $observacao->observacoes = $novaObservacao['observacoes'];
        $observacao->fornecedor_id = $fornecedor->id;
        $observacao->save();

        // if ($request->hasFile('file')) {
        //     $file = $request->file('file');
        //     $file->move(public_path('/assets/miniatura/'), $file->getClientOriginalName());
        // }
                
   
        // if ($request->hasFile('file')) {

        //     dd($request->file('file'));
        //     $img = Image::make($request->file('file'));
		// 	$extension = $request->file('file')->getClientOriginalExtension();
        //     $path = public_path() . '/assets/miniatura/';

        //     if (!File::exists($path)) {
        //         Storage::makeDirectory(public_path('/assets/miniatura/'));
        //     }
            
        //     $img->resize(50, 50, function ($constraint) {
        //         $constraint->aspectRatio();
        //     })->save($path . $img->filename . '.' . $extension);
        // }

        
       
        return response()->json($fornecedor);

    }

    public function buscar($id)
   {
        $query = Fornecedor::findOrFail($id);
        return $query;
   } 

   public function destroy($id){

        $fornecedor = Fornecedor::findOrFail($id);
        $fornecedor->load('endereco');
        $fornecedor->endereco()->delete();
        $fornecedor->load('observacao');
        $fornecedor->observacao()->delete();
        $fornecedor->delete();

    return "Fornecedor Excluído com sucesso";
    }
}