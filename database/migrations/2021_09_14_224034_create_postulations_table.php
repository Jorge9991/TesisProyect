<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostulationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('postulations', function (Blueprint $table) {
            $table->id();
            $table->integer('estado');
            $table->string('codigo')->nullable();
            $table->string('link')->nullable();
            $table->unsignedBigInteger('id_estudiante');
            $table->foreign('id_estudiante')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('id_oferta');
            $table->foreign('id_oferta')->references('id')->on('ofertas')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('postulations');
    }
}
