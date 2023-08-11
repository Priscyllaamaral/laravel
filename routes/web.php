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

Route::get('/menuMovimentacoes', function() {
    return view('menuMovimentacoes');
});

Route::get('/caixa', function() {
    return view('caixa');
});

Route::get('/usuario', function() {
    return view('usuarios');
});

Route::get('/usuario/novo', 'UsuariosController@novo');
Route::post('/usuario/adicionar', 'UsuariosController@cadastrar');
Route::get('/usuario/buscar', 'UsuariosController@buscar');
Route::get('/usuario/editar', 'UsuariosController@editar');
Route::get('/usuario/{user}/abrir', 'UsuariosController@abrir');
Route::post('/usuario/{usuario}/atualizar', 'UsuariosController@atualizar');
Route::post('/usuario/destroy/{id}', 'UsuariosController@destroy');


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

Route::group(['prefix' => 'movimentoCaixa', "middleware" => "auth"], function()
{
    Route::post('/cadastrar', ['uses' => 'MovimentoCaixaController@cadastrar']);
    Route::get('/listar', ['uses' => 'MovimentoCaixaController@movimentos']);
    Route::post('/destroy/{id}', ['uses' => 'MovimentoCaixaController@destroy']);
    Route::get('/filtrarPorData', ['uses' => 'MovimentoCaixaController@filtrarPorData']);
    Route::get('/filtrarPorObservacao', ['uses' => 'MovimentoCaixaController@filtrarPorObservacao']);

    //refazer
    
    
    Route::get('/despesas/{despesa}/abrir', ['uses' => 'DespesaController@abrir']); 
    Route::get('/despesas/editar', ['uses' => 'DespesaController@editar']); 
    Route::post('/despesas/cadastrar', ['uses' => 'DespesaController@cadastrar']); 
    Route::post('/despesas/{despesa}/atualizar',  ['uses' => 'DespesaController@atualizar']); 

});

Route::group(['prefix' => 'fornecedores', "middleware" => "auth"], function()
{

    Route::get('/index', ['middleware' => 'auth', 'uses' => 'FornecedorController@index']);
    Route::get('/buscar', ['middleware' => 'auth', 'uses' => 'FornecedorController@listarFornecedores']);
    Route::get('/buscar/{id}', ['middleware' => 'auth', 'uses' => 'FornecedorController@buscar']);
    Route::get('/filtrar', ['middleware' => 'auth', 'uses' => 'FornecedorController@search']); 
    Route::post('/salvar', ['middleware' => 'auth', 'uses' => 'FornecedorController@salvar']);
    Route::get('/', ['middleware' => 'auth', 'uses' => 'FornecedorController@tela']);
    Route::get('/{fornecedor}/abrir', ['middleware' => 'auth', 'uses' => 'FornecedorController@abrir']);
    Route::get('/editar', ['middleware' => 'auth', 'uses' => 'FornecedorController@editar']);
    Route::get('/listar', ['middleware' => 'auth', 'uses' => 'FornecedorController@listar']);
    Route::get('/todos', ['middleware' => 'auth', 'uses' => 'FornecedorController@listarFornecedores']);
    Route::post('/destroy/{id}', ['uses' => 'FornecedorController@destroy']);
    Route::post('/{fornecedor}/atualizar',  ['uses' => 'FornecedorController@atualizar']);

});

Route::get('/vendedores', ['middleware' => 'auth', 'uses' => 'VendedorController@index']);
Route::get('/vendedores/novo', ['middleware' => 'auth', 'uses' => 'VendedorController@novo']);
Route::post('/vendedores/cadastrar', ['middleware' => 'auth', 'uses' => 'VendedorController@cadastrar']);
Route::get('/vendedores/filtrar', ['middleware' => 'auth', 'uses' => 'VendedorController@search']);
Route::get('/vendedores/listar', ['middleware' => 'auth', 'uses' => 'VendedorController@listar']);
Route::post('/vendedores/destroy/{id}', ['middleware' => 'auth', 'uses' => 'VendedorController@destroy']);
Route::get('/vendedores/editar', ['middleware' => 'auth', 'uses' => 'VendedorController@editar']);
Route::get('/vendedores/{vendedor}/abrir', ['middleware' => 'auth', 'uses' => 'VendedorController@abrir']);
Route::post('vendedores/{vendedor}/atualizar', ['middleware' => 'auth', 'uses' => 'VendedorController@atualizar']);

Route::get('/planoContas', ['uses' => 'PlanocontasController@listaPlanoContas']);
Route::get('/planoContas/buscar/{id}', ['uses' => 'PlanocontasController@buscar']);

Route::post('/enderecos/cadastrar', ['middleware' => 'auth', 'uses' => 'EnderecosController@cadastrar']);
Route::get('/enderecos/{id}/abrir', ['uses' => 'EnderecosController@abrir']); 
Route::post('/enderecos/{endereco}/atualizar',  ['uses' => 'EnderecosController@atualizar']);


Route::post('/itemVenda/adicionar', ['middleware' => 'auth', 'uses' => 'ItemVendaController@novo']);
Route::get('/itemVenda', ['middleware' => 'auth', 'uses' => 'ItemVendaController@listar']);

Route::post('/funcionario', ['middleware' => 'auth', 'uses' => 'FuncionarioController@novo']);



