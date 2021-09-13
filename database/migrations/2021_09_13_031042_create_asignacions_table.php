<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAsignacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asignacions', function (Blueprint $table) {
            $table->id();
            $table->integer('estado');

            $table->unsignedBigInteger('id_estudiante');
            $table->foreign('id_estudiante')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
           
            $table->unsignedBigInteger('id_docente');
            $table->foreign('id_docente')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
           
            $table->unsignedBigInteger('id_convenio');
            $table->foreign('id_convenio')->references('id')->on('convenios')->onDelete('cascade')->onUpdate('cascade');
           
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
        Schema::dropIfExists('asignacions');
    }
}
