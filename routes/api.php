<?php

use Illuminate\Http\Request;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DespesaController;
use App\Http\Controllers\FornecedorController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/user', [LoginController::class,'tudo']); 
Route::get('/user/filtrar', [LoginController::class,'search']); 
//Route::get('/fornecedor/filtrar', [FornecedorController::class,'search']); 
Route::get('/despesas/todas', [DespesaController::class,'despesasTodas']); 
//Route::get('/fornecedor', [FornecedorController::class,'listarFornecedores']);

