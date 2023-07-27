<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fornecedor extends Model
{
    protected $table = 'fornecedores';
    protected $fillable = [
        'id', 'nome', 'cpf'
    ];


    function endereco() {
        return $this->hasOne(FornecedorEnderecos::class, 'fornecedor_id', 'id');
    }

    public function observacao(){
        return $this->hasOne(FornecedorObservacoes::class, 'fornecedor_id', 'id');
    }
}
