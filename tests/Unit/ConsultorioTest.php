<?php

namespace Tests\Unit;

use App\Models\Consultorio;
use PHPUnit\Framework\TestCase;

class ConsultorioTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_creacion_consultorio_en_memoria()
    {
        $consultorio = new Consultorio([
            'nombre'=>'Pediatría',
            'especialidad' => 'Pediatría',
            'estado'=>'mantenimiento',
            'telefono'=>'2568974123',
            'capacidad'=>'60',
             ]);

        $this->assertEquals('Pediatría',$consultorio->nombre);
        $this->assertEquals('Pediatría',$consultorio->especialidad);
        $this->assertEquals('mantenimiento',$consultorio->estado);
        $this->assertEquals('2568974123',$consultorio->telefono);
        $this->assertEquals('60',$consultorio->capacidad);
        
    }

    /**
     * Verficar que los Guarded esten correctos
     */

     public function test_fillable_consultorio()
    {

        $consultorio = new Consultorio();
        //$this->assertEquals([], $consultorio->getGuarded());
        $this->assertEquals([
        'nombre',
        'especialidad',
        'estado',
        'telefono',
        'capacidad',
        ], $consultorio->getFillable());
    }

}
