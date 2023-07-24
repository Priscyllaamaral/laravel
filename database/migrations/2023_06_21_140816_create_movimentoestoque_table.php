<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMovimentoestoqueTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movimentoestoque', function (Blueprint $table) {
            $table->increments('id');
            $table->string('movimento')->nullable();
            $table->integer('fornecedor_id')->nullable();
            $table->string('notafiscal')->nullable();
            $table->date('data')->nullable();
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
        Schema::dropIfExists('movimentoestoque');
    }
}
