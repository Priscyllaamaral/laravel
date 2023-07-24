<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVendaItens extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendas_itens', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('venda_id')->nullable();
            $table->integer('codigo')->nullable();
            $table->integer('quantidade')->nullable();
            $table->float('valor')->nullable();
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
        Schema::dropIfExists('vendas_itens');
    }
}
