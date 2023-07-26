<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    protected $table = 'enderecos';
    protected $fillable = [
        'rua', 'cidade', 'estado', 'cep', 'id_cliente'
    ];
}
