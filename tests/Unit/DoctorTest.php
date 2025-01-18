<?php

namespace Tests\Unit;

use App\Models\Doctor;
use PHPUnit\Framework\TestCase;

class DoctorTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_creacion_doctor_en_memoria()
    {
        $doctor = new Doctor([
            'nombres'=>'Doctor Doctor',
            'apellidos'=>'Good Doctor',
            'celular'=>'2568974124',
            'licencia_medica'=>'2568974123',
            'especialidad' => 'Pediatría',
            'user_id'=>'100'
            
             ]);

        $this->assertEquals('Doctor Doctor',$doctor->nombres);
        $this->assertEquals('Good Doctor',$doctor->apellidos);
        $this->assertEquals('2568974124',$doctor->celular);
        $this->assertEquals('2568974123',$doctor->licencia_medica);
        $this->assertEquals('Pediatría',$doctor->especialidad);
        $this->assertEquals('100',$doctor->user_id);
        
    }

    /**
     * Verficar que los Guarded esten correctos
     */

     public function test_fillable_doctor()
    {

        $doctor = new Doctor();
        //$this->assertEquals([], $consultorio->getGuarded());
        $this->assertEquals([
        'nombres', 
        'apellidos',
        'celular',
        'licencia_medica',
        'especialidad',
        'user_id',
        ], $doctor->getFillable());
    }
}
