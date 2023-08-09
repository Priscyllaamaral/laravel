<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $fillable = [
        'nome', 'valor_vista','valor_prazo', 'valor_atacado', 'valor_custo','codigo', 'forncedor_id', 'ativo', 'unidade',
    ];
}
