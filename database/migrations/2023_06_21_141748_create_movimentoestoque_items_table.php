<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMovimentoestoqueItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movimentoestoque_items', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('movimentoestoques_id')->nullable();
            $table->string('codigo')->nullable();
            $table->integer('quantidade')->nullable();
            $table->float('valor')->nullable();
            $table->string('movimento')->nullable();
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
        Schema::dropIfExists('movimentoestoque_items');
    }
}
