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
        Schema::create('carnetdelapatrias', function (Blueprint $table) {
            $table->id();
            $table->foreignId('persona_id') // UNSIGNED BIG INT
                    ->nullable() // <-- IMPORTANTE: LA COLUMNA DEBE ACEPTAR NULL COMO VALOR VALIDO
                    ->constrained()  // <-- DEFINE LA RESTRICCION DE LLAVE FORANEA
                    ->onDelete('cascade')
                    ->onUpdate('cascade');

            $table->string('codigo')->unique()->nullable();
            $table->string('serial')->unique()->nullable();
            $table->string('hogarespatria');
            $table->string('integrantes')->nullable();
            $table->boolean('partohumanizado')->nullable();
            $table->boolean('lactanciamaterna')->nullable();
            $table->boolean('mjgh')->nullable();
            $table->boolean('amormayor')->nullable();
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
        Schema::dropIfExists('carnetdelapatrias');
    }
};
