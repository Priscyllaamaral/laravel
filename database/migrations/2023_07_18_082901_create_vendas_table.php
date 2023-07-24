<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVendasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cliente_id')->nullable();
            $table->date('data')->nullable();
            $table->string('status')->nullable();
            $table->string('forma_pagamento')->nullable();
            $table->float('desconto')->nullable();
            $table->float('acrescimo')->nullable();
            $table->string('tabela')->nullable();
            $table->integer('cancelada')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vendas');
    }
}
