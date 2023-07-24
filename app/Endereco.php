<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    protected $fillable = [
        'rua', 'cidade', 'estado', 'codigo_postal', 'id_cliente'
    ];
}
