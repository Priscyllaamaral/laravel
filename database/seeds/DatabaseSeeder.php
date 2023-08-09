<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
    }
}

class UsersTableSeeder extends Seeder 
{

    public function run()
    {

        \App\User::create([
            'name' => 'Admin',
            'email' => 'laravel@anronsoftware.com.br',
            'password' => bcrypt('@n40ns'),
            'nivel' => 'Administrador',
            'nivel2' => 'Master',
            'ativo' => 1,
        ]);


        \App\User::create([
            'name' => 'Elon',
            'email' => 'elon@anronsoftware.com.br',
            'password' => bcrypt('@elon12'),
            'nivel' => 'Administrador',
            'nivel2' => 'CEO',
            'ativo' => 1,
        ]);


        \App\Cliente::create([
            'nome' => 'Jade',
            'email' => 'ajade@gmail.com',
            'cpf' => '009.786.562-90',
            'celular' => '81995143219',
            'premium' => 1,
        ]);

        \App\Cliente::create([
            'nome' => 'Pedro Sampaio',
            'email' => 'pedrinho@gmail.com',
            'cpf' => '009.786.534-33',
            'celular' => '61995143218',
            'premium' => 1,
        ]);

        \App\Cliente::create([
            'nome' => 'Sasha',
            'email' => 'sasha@hotmail.com',
            'cpf' => '009.597.534-34',
            'celular' => '71995563218',
            'premium' => 0,
        ]);

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

        \App\Fornecedor::create([
            'nome' => 'Docinha',
            'email' => 'docinha@hotmail.com',
            'cpf' => '009.597.534-07',
            'celular' => '71995563218',
            'rg' => '8560576',
            'data_nascimento' => '1991-08-08' 
        ]);

        \App\Fornecedor::create([
            'nome' => 'Goku',
            'email' => 'goku@gmail.com',
            'cpf' => '009.894.532-07',
            'celular' => '63995563234',
            'rg' => '7450924',
            'data_nascimento' => '1993-05-07' 
        ]);

        \App\Fornecedor::create([
            'nome' => 'Bob Esponja',
            'email' => 'bob_e@gmail.com',
            'cpf' => '007.894.532-67',
            'celular' => '81994463234',
            'rg' => '9760564',
            'data_nascimento' => '1992-10-10' 
        ]);

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
