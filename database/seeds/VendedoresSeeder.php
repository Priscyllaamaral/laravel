<?php

use Illuminate\Database\Seeder;

class VendedoresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Vendedor::create([
            'nome' => 'Neymar',
            'email' => 'neymarFilho@hotmail.com',
            'cpf' => '009.597.453-07',
            'celular' => '71995563232',
            'rg' => '8561571',
            'data_nascimento' => '1991-08-13' 
        ]);

        \App\Vendedor::create([
            'nome' => 'Roberto Marinho',
            'email' => 'marinho@gmail.com',
            'cpf' => '008.597.534-07',
            'celular' => '71994363218',
            'rg' => '8563376',
            'data_nascimento' => '1990-08-10' 
        ]);

        \App\Vendedor::create([
            'nome' => 'Fábio Assunção',
            'email' => 'fabinho@hotmail.com',
            'cpf' => '081.597.534-07',
            'celular' => '71995561818',
            'rg' => '8560579',
            'data_nascimento' => '1990-02-20' 
        ]);

    }
}
