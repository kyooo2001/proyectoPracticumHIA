<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        //
        Schema::create('emergencias', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('paciente_id');
            $table->integer('frecuencia_cardiaca_alta');
            $table->integer('frecuencia_cardiaca_baja');
            $table->integer('frecuencia_respiratoria');
            $table->integer('presion_arterial');
            $table->integer('saturacion_oxigeno');
            $table->enum('nivel_conciencia', ['Alerta', 'Responde a voz', 'Responde al dolor', 'No responde']);
            $table->enum('categoria', ['Verde', 'Amarillo', 'Naranja', 'Rojo']);
            $table->integer('puntaje_total');
            $table->timestamps();
            $table->foreign('paciente_id')->references('id')->on('pacientes')->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('emergencias');
    }
};
