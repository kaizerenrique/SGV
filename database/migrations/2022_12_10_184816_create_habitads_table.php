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
        Schema::create('habitads', function (Blueprint $table) {
            $table->id();
            $table->string('codigo');
            $table->string('habitad');
            $table->string('literal')->nullable();             
            $table->string('tipo');
            $table->string('observacion')->nullable();
            $table->string('latitud')->nullable();
            $table->string('longitud')->nullable();
            $table->foreignId('direccion_id') // UNSIGNED BIG INT
                    ->nullable() // <-- IMPORTANTE: LA COLUMNA DEBE ACEPTAR NULL COMO VALOR VALIDO
                    ->constrained()  // <-- DEFINE LA RESTRICCION DE LLAVE FORANEA
                    ->onDelete('SET NULL')
                    ->onUpdate('cascade');
            $table->foreignId('consejo_comunal_id') // UNSIGNED BIG INT
                    ->nullable() // <-- IMPORTANTE: LA COLUMNA DEBE ACEPTAR NULL COMO VALOR VALIDO
                    ->constrained()  // <-- DEFINE LA RESTRICCION DE LLAVE FORANEA
                    ->onDelete('SET NULL')
                    ->onUpdate('cascade');
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
        Schema::dropIfExists('habitads');
    }
};
