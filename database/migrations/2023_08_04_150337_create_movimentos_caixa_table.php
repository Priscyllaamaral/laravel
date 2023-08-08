<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMovimentosCaixaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movimentos_caixa', function (Blueprint $table) {
            $table->increments('id');
            $table->dateTime('data')->nullable();
            $table->longText('historico')->nullsble();
            $table->string('forma_pagamento')->nullable();
            $table->string('tipo')->nullable();
            $table->float('valor')->nullable();
            $table->boolean('sangria')->nullable();
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
        Schema::dropIfExists('movimentos_caixa');
    }
}
