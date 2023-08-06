<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('despesas', function (Blueprint $table) {
            $table->bigInteger('id')->primary()->increment();
            $table->integer('idUsuario');
            $table->bigInteger('idUsuario');
            $table->string('descricao', 191);
            $table->date('data');
            $table->double('valor', 9, 2);
            $table->timestamps();

            
            // $table->foreign('idUsuario')->references('id')->on('usuario');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('despesas');
    }
};
