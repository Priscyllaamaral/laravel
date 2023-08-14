<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MovimentoEstoque extends Model
{
    protected $table = 'movimentoestoque';

    protected $fillable = [
        'id', 'movimento', 'fornecedor_id', 'data'
    ];

    public function fornecedor() {
        return $this->hasOne(Fornecedor::class, 'id', 'fornecedor_id');
    }

    public function itens(){
        return $this->hasMany(MovimentoEstoqueItem::class, 'movimentoestoques_id', 'id');
    }
}
