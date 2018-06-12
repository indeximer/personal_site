<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConfigGeralTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('config_geral', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
            $table->string('slogan');
            $table->string('logo_img');
            $table->string('logo_alt');
            $table->string('avatar_img');
            $table->string('avatar_alt');
            $table->string('email');
            $table->integer('ddd');
            $table->integer('telefone');
            $table->string('facebook');
            $table->string('linkedin');
            $table->string('endereco');
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
        Schema::dropIfExists('config_geral');
    }
}
