<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMacTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mac', function (Blueprint $table) {
            $table->increments('id');
            $table->string('mac', 17);
            $table->integer('id_user');
            $table->integer('id_dev');
            $table->string('ticket', 15);
            $table->string('nome_eq', 15);
            $table->boolean('ativo');
            $table->timestamp('criado_em');
            $table->timestamp('modificado_em');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('mac');
    }
}
