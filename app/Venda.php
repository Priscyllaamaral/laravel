<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Venda extends Model
{
    protected $fillable = [
        'cancelada', 'cliente_id', 'desconto', 'acrescimo', 'status', 'forma_pagamento', 'tabela'
    ];


    public function itens(){
        return $this->hasMany(ItemVenda::class, 'venda_id', 'id');
    }

    public function cliente(){
        return $this->belongsTo(Cliente::class, 'cliente_id', 'id' );
    }

    public function vendedor(){
        return $this->belongsTo(Vendedor::class, 'vendedor_id', 'id' );
    }
}
