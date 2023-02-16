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
        Schema::create('serviciocantvtelefonos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('familia_id') // UNSIGNED BIG INT
                    ->nullable() // <-- IMPORTANTE: LA COLUMNA DEBE ACEPTAR NULL COMO VALOR VALIDO
                    ->constrained()  // <-- DEFINE LA RESTRICCION DE LLAVE FORANEA
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
            $table->boolean('posee_servicio')->nullable();
            $table->string('codigo_operador')->nullable();
            $table->string('nrotelefono')->nullable();
            $table->boolean('estado')->nullable();

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
        Schema::dropIfExists('serviciocantvtelefonos');
    }
};
