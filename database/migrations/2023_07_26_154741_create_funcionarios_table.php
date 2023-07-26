<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFuncionariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('funcionarios', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome')->nullable();
            $table->string('cpfcnpj', 20)->nullable();
            $table->string('celular', 13)->nullable();
            $table->string('email')->nullable();
            $table->string('rg')->nullable();
            $table->date('data_nascimento')->nullable();
            $table->binary('foto')->change();
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
        Schema::dropIfExists('funcionarios');
    }
}
