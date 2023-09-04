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
        $this->call([
            UsersTableSeeder::class, 
            FornecedorObservacoesSeeder::class,
            EnderecosSeeder::class,
            ClientesSeeder::class, 
            VendedoresSeeder::class, 
            FornecedoresSeeder::class, 
            ProdutosSeeder::class]);
        //$this->call(ProdutosSeeder::class);
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
 
       

    }

}
