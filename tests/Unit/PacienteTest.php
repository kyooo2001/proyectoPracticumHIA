<?php

namespace Tests\Unit;
use App\Models\Paciente;
use PHPUnit\Framework\TestCase;

class PacienteTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_creacion_paciente_en_memoria()
    {
        $paciente = new Paciente([
            'nombres'=>'Felipe S',
            'apellidos'=>'Barriga S',
            'ci'=>'1234567892',
            'celular'=>'2568974123',
            'correo'=>'fs@test.com',
            'seguro_medico'=>'Humana',
            'fecha_nacimiento'=>'2025-01-16',
            'genero'=>'Masculino',
            'grupo_sanguineo'=>'O+',
            'alergias'=>'Ninguna',
            'ciudad'=>'Quito',
            'provincia'=>'Pichincha',
            'direccion'=>'Calle C',
            'contacto_emergencia'=>'Mar',
            'observaciones'=>'Ninguna',
             ]);

        $this->assertEquals('Felipe S',$paciente->nombres);
        $this->assertEquals('Barriga S',$paciente->apellidos);
        $this->assertEquals('1234567892',$paciente->ci);
        $this->assertEquals('fs@test.com',$paciente->correo);
        $this->assertEquals('2568974123',$paciente->celular);
        $this->assertEquals('Humana',$paciente->seguro_medico);
        $this->assertEquals('2025-01-16',$paciente->fecha_nacimiento);
        $this->assertEquals('Masculino',$paciente->genero);
        $this->assertEquals('O+',$paciente->grupo_sanguineo);
        $this->assertEquals('Ninguna',$paciente->alergias);
        $this->assertEquals('Quito',$paciente->ciudad);
        $this->assertEquals('Pichincha',$paciente->provincia);
        $this->assertEquals('Calle C',$paciente->direccion);
        $this->assertEquals('Mar',$paciente->contacto_emergencia);
        $this->assertEquals('Ninguna',$paciente->observaciones);

    }

    /**
     * Verficar que los Guarded esten correctos
     */

     public function test_guarded_paciente()
    {

        $paciente = new Paciente();
        $this->assertEquals([], $paciente->getGuarded());
        
    }
}
