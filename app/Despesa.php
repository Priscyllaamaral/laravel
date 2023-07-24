<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Despesa extends Model
{
    protected $fillable = [
        'fornecedor', 'plano_de_contas', 'data', 'valor','tipo'
    ];
}
