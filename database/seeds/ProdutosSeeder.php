<?php

use Illuminate\Database\Seeder;

class ProdutosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Produto::create([
            'nome' => 'Café Torrado',
            'codigo' => 101,
            'valor_vista' => 50.00,
            'valor_prazo' => 55.00,
            'valor_atacado' => 45.00,
            'valor_custo' => 40.00,
            'unidade' => 'Kg',
            'ativo' => 1,
            'fornecedor_id' => 1,
        ]);

        \App\Produto::create([
            'nome' => 'Açúcar Refinado',
            'codigo' => 102,
            'valor_vista' => 7.00,
            'valor_prazo' => 8.00,
            'valor_atacado' => 6.00,
            'valor_custo' => 5.00,
            'unidade' => 'Kg',
            'ativo' => 1,
            'fornecedor_id' => 2,
        ]);

        \App\Produto::create([
            'nome' => 'Notebook',
            'codigo' => 302,
            'valor_vista' => 5000,
            'valor_prazo' => 5500,
            'valor_atacado' => 4500,
            'valor_custo' => 4000,
            'unidade' => 'Un',
            'ativo' => 1,
            'fornecedor_id' => 3,
        ]);


        \App\Produto::create([
            'nome' => 'Creme Dental',
            'codigo' => 401,
            'valor_vista' => 5,
            'valor_prazo' => 5.5,
            'valor_atacado' => 4.5,
            'valor_custo' => 4.0,
            'unidade' => 'Un',
            'ativo' => 1,
            'fornecedor_id' => 1,
        ]);
    }
}
