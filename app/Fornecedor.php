<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fornecedor extends Model
{
    protected $table = 'fornecedores';

    protected $fillable = [
        'nome', 'cpfcnpj', 'celular', 'email', 'rg', 'data_nascimento',
    ];


    function endereco() {
        return $this->hasOne(FornecedorEnderecos::class, 'fornecedor_id', 'id');
    }

    public function observacao(){
        return $this->hasOne(FornecedorObservacoes::class, 'fornecedor_id', 'id');
    }
}
