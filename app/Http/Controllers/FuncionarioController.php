<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Funcionario;

class FuncionarioController extends Controller
{
  
   public function novo(Request $request)
   {
    
        $funcionario = new Funcionario();
        $funcionario->nome = $request->input('nome');
        $funcionario->save();


        return response()->json($funcionario);


   }
}