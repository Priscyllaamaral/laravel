<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\PlanoConta;

class PlanocontasController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function listaPlanoContas()
    {
        return PlanoConta::all();
    }

    public function buscar($id)
    {
        return PlanoConta::findOrFail($id);
    }
}