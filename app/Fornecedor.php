<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fornecedor extends Model
{
    protected $table = 'fornecedores';
    protected $fillable = [
        'id', 'nome', 'cpf'
    ];


    function enderecos() {
        return $this->hasOne(FornecedorEnderecos::class, 'fornecedor_id', 'id');
    }

    public function observacoes(){
        return $this->hasOne(FornecedorObservacoes::class, 'fornecedor_id', 'id');
    }
}
