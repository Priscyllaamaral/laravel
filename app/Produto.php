<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $fillable = [
        'descricao', 'id', 'nome', 'quantidade', 'valor_vista','valor_prazo', 'valor_atacado', 'valor_custo','codigo', 'forncedor_id', 'ativo', 'unidade'
    ];
}
