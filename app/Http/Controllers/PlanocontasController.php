<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\planoConta;

class PlanocontasController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function listaPlanoContas()
    {
        return planoConta::all();
    }
}