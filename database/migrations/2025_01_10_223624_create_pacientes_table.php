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
        Schema::create('pacientes', function (Blueprint $table) {
            $table->id();
            
            $table->string('nombres',150);
            $table->string('apellidos',150);
            $table->string('ci',150)->unique();
            $table->string('celular',150);
            $table->string('correo',150)->unique();
            $table->string('seguro_medico',150);
            $table->string('fecha_nacimiento',150);
            $table->string('genero',150);
            $table->string('grupo_sanguineo',255);
            $table->string('alergias',255);
            $table->string('ciudad',150);
            $table->string('provincia',150);
            $table->string('direccion',255);
            $table->string('contacto_emergencia',255);
            $table->string('observaciones',255)->nullable();
            
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pacientes');
    }
};
