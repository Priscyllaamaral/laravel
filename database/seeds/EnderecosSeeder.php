<?php

use Illuminate\Database\Seeder;

class EnderecosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Endereco::create([
            'logradouro' => 'rua das flores',
            'cidade' => 'scc',
            'estado' => 'PE',
            'codigo_postal' => '55190530',
            'numero' => '77',
            'bairro' => 'Viçosa',
            'complemento' => '...',
            'ponto_referencia' => '...'
        ]);

        \App\Endereco::create([
            'logradouro' => 'rua das graças',
            'cidade' => 'cabrália',
            'estado' => 'BA',
            'codigo_postal' => '55190850',
            'numero' => '88',
            'bairro' => 'Marechal Deodoro',
            'complemento' => '...',
            'ponto_referencia' => '...'
        ]);

        \App\Endereco::create([
            'logradouro' => 'rua das praças',
            'cidade' => 'taguatinga',
            'estado' => 'DF',
            'codigo_postal' => '55190850',
            'numero' => '55',
            'bairro' => 'QND 10',
            'complemento' => '...',
            'ponto_referencia' => '...'
        ]);

        \App\Endereco::create([
            'logradouro' => 'Padre Leonardo',
            'cidade' => 'Esperança',
            'estado' => 'PB',
            'codigo_postal' => '55190850',
            'numero' => '11',
            'bairro' => 'Marechal Francisco',
            'complemento' => '...',
            'ponto_referencia' => '...'
        ]);

        \App\Endereco::create([
            'logradouro' => 'Soldado Batista',
            'cidade' => 'Vitória',
            'estado' => 'ES',
            'codigo_postal' => '55190850',
            'numero' => '45',
            'bairro' => 'Maniçoba',
            'complemento' => '...',
            'ponto_referencia' => '...'
        ]);

        \App\Endereco::create([
            'logradouro' => 'rua Frei Caneca',
            'cidade' => 'Puxinanā',
            'estado' => 'PB',
            'codigo_postal' => '55190850',
            'numero' => '34',
            'bairro' => 'Marechal Figueiredo',
            'complemento' => '...',
            'ponto_referencia' => '...'
        ]);
       
    }
}
