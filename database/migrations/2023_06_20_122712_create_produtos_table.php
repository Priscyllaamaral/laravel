<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProdutosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produtos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome')->nullable();
            $table->integer('codigo')->nullable();
            $table->string('descricao')->nullable();
            $table->float('valor_vista')->nullable();
            $table->float('valor_prazo')->nullable();
            $table->float('valor_atacado')->nullable();
            $table->float('valor_custo')->nullable();
            $table->integer('quantidade')->nullable();
            $table->string('unidade')->nullable();
            $table->integer('ativo')->nullable();
            $table->integer('fornecedor_id')->nullable();
          
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
        Schema::dropIfExists('produtos');
    }
}
