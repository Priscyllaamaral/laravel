<?php

use Illuminate\Database\Seeder;

class FornecedoresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Fornecedor::create([
            'nome' => 'Docinha',
            'email' => 'docinha@hotmail.com',
            'cpf' => '009.597.534-07',
            'celular' => '71995563218',
            'rg' => '8560576',
            'data_nascimento' => '1991-08-08',
            'endereco_id' => 1
        ]);

        \App\Fornecedor::create([
            'nome' => 'Goku',
            'email' => 'goku@gmail.com',
            'cpf' => '009.894.532-07',
            'celular' => '63995563234',
            'rg' => '7450924',
            'data_nascimento' => '1993-05-07',
            'endereco_id' => 2
        ]);

        \App\Fornecedor::create([
            'nome' => 'Bob Esponja',
            'email' => 'bob_e@gmail.com',
            'cpf' => '007.894.532-67',
            'celular' => '81994463234',
            'rg' => '9760564',
            'data_nascimento' => '1992-10-10' ,
            'endereco_id' => 3
        ]);

    }
}
