<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FornecedorObservacoes extends Model
{
    protected $fillable = [
        'comissao', 'status', 'observacoes', 'fornecedor_id'
    ];
}