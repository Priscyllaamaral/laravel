<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterUsers20230805 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('nivel', 20)->nullable()->after('remember_token');
            $table->string('nivel2', 20)->nullable()->after('nivel');
            $table->tinyInteger('ativo')->nullable()->after('nivel2');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('nivel');
            $table->dropColumn('nivel2');
            $table->dropColumn('ativo');
        });
    }
}
