<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Fornecedor;
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

    public function abrir(Produto $produto)
    {
        if ($produto->foto) {
            $binary = isBinary($produto->foto);

            if (!$binary) {
                $produto->foto = base64_decode($produto->foto);
            }
        }

        return response()->json($produto);
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

        
       
        return 'ok';

    }

    public function buscar($id)
   {
    
        $query = Fornecedor::findOrFail($id);

        

        return $query;

   } 
}