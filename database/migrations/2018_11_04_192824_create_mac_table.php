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
            $table->string('mac', 17)->unique();
            $table->integer('id_user')->unsigned();
            $table->foreign('id_user')->references('id')->on('user');
            $table->integer('id_dev')->unsigned();
            $table->foreign('id_dev')->references('id')->on('dispositivo');
            $table->string('ticket', 15);
            $table->string('sei', 20);
            $table->string('nome_eq', 15);
            $table->boolean('ativo');
	        $table->datetime('expira')->default('2099-01-01 01:01:01');
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
        Schema::drop('mac');
    }
}
