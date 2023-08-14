<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cliente extends Model
{
    protected $fillable = [
        'nome', 'email', 'cpf', 'celular', 'premium', 'endereco_id',
    ];


    public function endereco(){
        return $this->hasOne(Endereco::class, 'id', 'endereco_id');
    }

}
