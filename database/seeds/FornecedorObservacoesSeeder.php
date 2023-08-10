<?php

use Illuminate\Database\Seeder;

class FornecedorObservacoesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\FornecedorObservacoes::create([
            'comissao' => 'Permanente',
            'status' => 'Ativo',
            'observacoes' => '???',
            'fornecedor_id' => 1
        ]);

        \App\FornecedorObservacoes::create([
            'comissao' => 'Permanente',
            'status' => 'Suspenso',
            'observacoes' => '...',
            'fornecedor_id' => 2
        ]);

        \App\FornecedorObservacoes::create([
            'comissao' => 'Variável',
            'status' => 'Ativo',
            'observacoes' => 'kjsdbv',
            'fornecedor_id' => 3
        ]);
    }
}
