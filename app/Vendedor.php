<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vendedor extends Model
{
    protected $table = 'vendedores';

    protected $fillable =[
        'nome', 'cpf', 'rg', 'data_nascimento', 'celular', 'email',
    ];
}