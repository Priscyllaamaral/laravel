<?php

use Illuminate\Database\Seeder;

class ClientesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Cliente::create([
            'nome' => 'Jade',
            'email' => 'ajade@gmail.com',
            'cpf' => '009.786.562-90',
            'celular' => '81995143219',
            'premium' => 1,
            'endereco_id' => 4
        ]);

        \App\Cliente::create([
            'nome' => 'Pedro Sampaio',
            'email' => 'pedrinho@gmail.com',
            'cpf' => '009.786.534-33',
            'celular' => '61995143218',
            'premium' => 1,
            'endereco_id' => 5
        ]);

        \App\Cliente::create([
            'nome' => 'Sasha',
            'email' => 'sasha@hotmail.com',
            'cpf' => '009.597.534-34',
            'celular' => '71995563218',
            'premium' => 0,
            'endereco_id' => 6
        ]);
    }
}
