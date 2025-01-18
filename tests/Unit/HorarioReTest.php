<?php

namespace Tests\Unit;

use App\Models\Horario;

use PHPUnit\Framework\TestCase;

class HorarioReTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_horario_belongs_to_doctor()
    {
        /**
     * Validar la relación entre cita medica y enfermedad
     */
        

        $horario = new Horario();

        // Verificar que la relación es una instancia de BelongsTo
        $this->assertInstanceOf(\Illuminate\Database\Eloquent\Relations\BelongsTo::class, $horario->doctor());

        
    }

  
}
