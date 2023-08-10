<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterEnderecos20230810 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('enderecos', function (Blueprint $table) {
            $table->integer('numero')->nullable()->after('rua');
            $table->string('bairro')->nullable()->after('numero');
            $table->string('complemento')->nullable()->after('bairro');
            $table->string('ponto_referencia')->nullable()->after('complemento');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('enderecos', function (Blueprint $table) {
            $table->dropColumn('numero');
            $table->dropColumn('bairro');
            $table->dropColumn('complemento');
            $table->dropColumn('ponto_referencia');
        });
    }
}
