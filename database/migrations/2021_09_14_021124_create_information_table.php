<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('information', function (Blueprint $table) {
            //Firma tutor (bloqueado campo) este campo no va por que es irrelevante
            //Cantidad de horas este campo se saca con las sumas, no es necesario guardar
            $table->id();
            $table->date('fecha');
            $table->time('horas_inicio');
            $table->time('horas_fin');
            $table->string('descripcion');
            $table->string('dia');
            $table->integer('semana');
            $table->integer('horas_diaria');
            $table->unsignedBigInteger('id_estudiante');
            $table->foreign('id_estudiante')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('information');
    }
}
