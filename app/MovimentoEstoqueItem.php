<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MovimentoEstoqueItem extends Model
{
    protected $table = 'movimentoestoque_items';

    protected $fillable = [
        'id', 'movimentoestoques_id', 'codigo', 'quantidade', 'valor'
    ];

    function produto() {
        return $this->hasOne(Produto::class, 'codigo', 'codigo');
    }
}
