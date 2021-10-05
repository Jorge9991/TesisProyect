<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activities', function (Blueprint $table) {
            $table->id();
            $table->string('descripcion');
            $table->date('fecha');
            $table->string('recurso')->nullable();
            $table->string('descripcion_visita');
            $table->integer('estado');
            $table->unsignedBigInteger('id_convenio');
            $table->foreign('id_convenio')->references('id')->on('convenios')->onDelete('cascade')->onUpdate('cascade');         
            $table->unsignedBigInteger('id_tutor');
            $table->foreign('id_tutor')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');         
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
        Schema::dropIfExists('activities');
    }
}
