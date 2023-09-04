<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    protected $table = 'enderecos';
    protected $fillable = [
        'logradouro', 'cidade', 'estado', 'codigo_postal', 'numero', 'bairro', 'complemento', 'ponto_referencia',
    ];
}
