<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fornecedor extends Model
{
    protected $table = 'fornecedores';
    protected $fillable = [
        'id', 'nome', 'cpf'
    ];
}
