<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VendaItem extends Model
{
    protected $fillable = [
        'quantidade', 'venda_id', 'codigo', 'valor'
    ];
}
