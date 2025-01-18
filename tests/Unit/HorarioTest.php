<?php

namespace Tests\Unit;
use App\Models\Horario;
use PHPUnit\Framework\TestCase;

class HorarioTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_creacion_horario_en_memoria()
    {
        $horario = new Horario([
            'dia'=>'Lunes',
            'hora_inicio'=>'16:36:00',
            'hora_final'=>'17:36:00',
            'doctor_id'=>'6',
            'consultorio_id' => '3',
            
            
             ]);

        $this->assertEquals('Lunes',$horario->dia);
        $this->assertEquals('16:36:00',$horario->hora_inicio);
        $this->assertEquals('17:36:00',$horario->hora_final);
        $this->assertEquals('6',$horario->doctor_id);
        $this->assertEquals('3',$horario->consultorio_id);
        
        
    }

    /**
     * Verficar que los Guarded esten correctos
     */

     public function test_fillable_horario()
    {

        $horario = new Horario();
        //$this->assertEquals([], $consultorio->getGuarded());
        $this->assertEquals([
        'dia', 
        'hora_inicio',
        'hora_final',
        'doctor_id',
        'consultorio_id'
        ], $horario->getFillable());
    }
}
