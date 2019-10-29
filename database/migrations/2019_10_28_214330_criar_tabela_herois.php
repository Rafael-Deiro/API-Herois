<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CriarTabelaHerois extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('herois', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
            $table->string('nome_real');
            $table->string('origem');
            $table->string('poder_principal');
            $table->string('poder_secundario')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('herois');
    }
}
