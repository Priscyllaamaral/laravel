<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
if (env('PROXY_URL')) {
    URL::forceRootUrl(env('PROXY_URL', ''));
}

if (env('PROXY_SCHEMA')) {
    URL::forceScheme(env('PROXY_SCHEMA', ''));
}


Route::get('/teste', function() {
    return view('teste');
});

Route::get('/menu', function() {
    return view('menu');
});

Route::get('/menuCadastro', function() {
    return view('menuCadastro');
});

Route::get('/login', 'LoginController@index')->name('login');
Route::get('/login/logout', 'LoginController@logout')->name('logout');
Route::get('/login/novo', 'LoginController@novo')->name('novo');
Route::post('/login/cadastrar', 'LoginController@cadastrar')->name('cadastrar');
Route::post('/login/autorizar', 'LoginController@autorizar')->name('autorizar');

Route::get('/', ['middleware' => 'auth', 'uses' => 'PrincipalController@index'])->name('home');


Route::get('/venda', ['middleware' => 'auth', 'uses' => 'VendasController@index']);
Route::group(['prefix' => 'vendas', "middleware" => "auth"], function()
{
    Route::get('/', ['middleware' => 'auth', 'uses' => 'VendasController@index2']);
    Route::post('/adicionar', ['middleware' => 'auth', 'uses' => 'VendasController@novo']);
    Route::post('/{venda}/atualizar', ['middleware' => 'auth', 'uses' => 'VendasController@atualizar']);
    Route::get('/buscar', ['middleware' => 'auth', 'uses' => 'VendasController@listar']);
    Route::get('/{venda}/abrir', ['middleware' => 'auth','uses' => 'VendasController@abrir']); 
    Route::get('/editar', ['middleware' => 'auth','uses' => 'VendasController@editar']);
    Route::post('/destroy/{id}', ['middleware' => 'auth', 'uses' => 'VendasController@destroy']);
});

Route::group(['prefix' => 'movEstoque', "middleware" => "auth"], function()
{
    Route::get('/', ['middleware' => 'auth', 'uses' => 'MovimentoEstoqueController@index']);
    Route::get('/buscar', ['middleware' => 'auth', 'uses' => 'MovimentoEstoqueController@buscar']);
    Route::post('/adicionar', ['middleware' => 'auth', 'uses' => 'MovimentoEstoqueController@novo']);
    Route::get('/listar', ['middleware' => 'auth', 'uses' => 'MovimentoEstoqueController@lista']);
    Route::get('/{movimento}/abrir', ['uses' => 'MovimentoEstoqueController@abrir']); 
    Route::get('/editar', ['middleware' => 'auth', 'uses' => 'MovimentoEstoqueController@editar']);
    Route::post('/{movimento}/atualizar',  ['uses' => 'MovimentoEstoqueController@atualizar']); 
    Route::post('/destroy/{id}', ['middleware' => 'auth', 'uses' => 'MovimentoEstoqueController@destroy']);
    
});

Route::post('/movimentoItem/adicionar', ['middleware' => 'auth', 'uses' => 'MovimentoEstoqueItemController@novo']);
Route::get('/movimentoItem/buscar/{id}', ['uses' => 'MovimentoEstoqueItemController@buscarItens']);
Route::post('/movimentoItem/destroy/{id}', ['uses' => 'MovimentoEstoqueItemController@destroy']);


Route::group(['prefix' => 'clientes', "middleware" => "auth"], function()
{
    Route::get('/', ['middleware' => 'auth', 'uses' => 'ClientesController@index'])->name('clientes');
    Route::post('/cadastrar', ['middleware' => 'auth', 'uses' => 'ClientesController@cadastrar']);
    Route::get('/index', ['middleware' => 'auth', 'uses' => 'ClientesController@clientes']);
    Route::get('/listar', ['middleware' => 'auth', 'uses' => 'ClientesController@listar']);
    Route::get('/editar', ['middleware' => 'auth', 'uses' => 'ClientesController@editar']);
    Route::get('/{cliente}/abrir', ['uses' => 'ClientesController@abrir']); 
    Route::post('/destroy/{id}', ['uses' => 'ClientesController@destroy']);
    Route::post('/{cliente}/atualizar',  ['uses' => 'ClientesController@atualizar']); 
    Route::get('/buscar/{id}', ['uses' => 'ClientesController@buscarIdEndereco']);
    Route::get('/filtrar', ['uses' => 'ClientesController@search']); 
});

Route::group(['prefix' => 'produtos', "middleware" => "auth"], function()
{
    Route::get('/', ['middleware' => 'auth', 'uses' => 'ProdutosController@index']);
    Route::get('/listar', ['middleware' => 'auth', 'uses' => 'ProdutosController@listar']);
    Route::post('/destroy/{id}', ['uses' => 'ProdutosController@destroy']);
    Route::get('/editar', ['uses' => 'ProdutosController@editar']);
    Route::post('/cadastrar', ['uses' => 'ProdutosController@novo']);
    Route::get('/index', ['middleware' => 'auth', 'uses' => 'ProdutosController@produto']);
    Route::get('/{produto}/abrir', ['uses' => 'ProdutosController@abrir']); 
    Route::post('/{produto}/atualizar',  ['uses' => 'ProdutosController@atualizar']); 
    Route::get('/localizar', ['uses' => 'ProdutosController@localizar']); 
    Route::get('/filtrar', ['uses' => 'ProdutosController@search']); 
    Route::get('/buscar/{id}', ['uses' => 'ProdutosController@buscarProdutos']);
});


Route::group(['prefix' => 'movimentacoes', "middleware" => "auth"], function()
{
    Route::get('/despesas', ['middleware' => 'auth', 'uses' => 'DespesaController@index'])->name('despesasListar');
    Route::get('/despesas/nova', ['uses' => 'DespesaController@nova']);
    Route::get('/despesas/listar', ['uses' => 'DespesaController@despesas']);
    Route::post('/despesas/destroy/{id}', ['uses' => 'DespesaController@destroy']);
    Route::get('/despesas/{despesa}/abrir', ['uses' => 'DespesaController@abrir']); 
    Route::get('/despesas/editar', ['uses' => 'DespesaController@editar']); 
    Route::post('/despesas/cadastrar', ['uses' => 'DespesaController@cadastrar']); 
    Route::post('/despesas/{despesa}/atualizar',  ['uses' => 'DespesaController@atualizar']); 

});

Route::get('/fornecedor', ['middleware' => 'auth', 'uses' => 'FornecedorController@index']);
Route::get('/fornecedor/buscar', ['middleware' => 'auth', 'uses' => 'FornecedorController@listarFornecedores'])->name('fornecedores');
Route::get('/fornecedor/buscar/{id}', ['middleware' => 'auth', 'uses' => 'FornecedorController@buscar']);
Route::get('/fornecedor/filtrar', ['middleware' => 'auth', 'uses' => 'FornecedorController@search']); 
Route::post('/fornecedor/salvar', ['middleware' => 'auth', 'uses' => 'FornecedorController@salvar']);
Route::get('/fornecedores', ['middleware' => 'auth', 'uses' => 'FornecedorController@tela']);
Route::get('/fornecedores/{fornecedor}/abrir', ['middleware' => 'auth', 'uses' => 'FornecedorController@abrir']);
Route::get('/fornecedores/editar', ['middleware' => 'auth', 'uses' => 'FornecedorController@editar']);
Route::get('/fornecedores/listar', ['middleware' => 'auth', 'uses' => 'FornecedorController@listar']);
Route::get('/fornecedores/todos', ['middleware' => 'auth', 'uses' => 'FornecedorController@listarFornecedores']);





Route::get('/planoContas', ['uses' => 'PlanocontasController@listaPlanoContas']);

Route::post('/enderecos/cadastrar', ['middleware' => 'auth', 'uses' => 'EnderecosController@cadastrar']);
Route::get('/enderecos/{endereco}/abrir', ['uses' => 'EnderecosController@abrir']); 
Route::post('/enderecos/{endereco}/atualizar',  ['uses' => 'EnderecosController@atualizar']);


Route::post('/itemVenda/adicionar', ['middleware' => 'auth', 'uses' => 'ItemVendaController@novo']);
Route::get('/itemVenda', ['middleware' => 'auth', 'uses' => 'ItemVendaController@listar']);

Route::post('/funcionario', ['middleware' => 'auth', 'uses' => 'FuncionarioController@novo']);



