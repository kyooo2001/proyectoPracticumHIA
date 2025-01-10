<?php

use App\Models\User;
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
        Schema::create('secretarias', function (Blueprint $table) {
            $table->id();
            $table->string('nombres',150);
            $table->string('apellidos',150);
            $table->string('ci',150)->unique();
            $table->string('celular',150)->unique();
            $table->string('fecha_nacimiento',150);
            $table->string('ciudad',150);
            $table->string('provincia',150);
            $table->string('direccion',255);
            
            //relacion de tablas
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('secretarias');
    }
};
