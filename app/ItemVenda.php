<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemVenda extends Model
{
    //

    function produto() {
        return $this->hasOne(Produto::class, 'codigo', 'codigo');
    }
}
