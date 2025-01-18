<?php

namespace Tests\Unit;
use App\Models\Secretaria;
use PHPUnit\Framework\TestCase;

class SecretariaTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_creacion_secretaria_en_memoria()
    {
        $secretaria = new Secretaria([
            'nombres'=>'María A',
            'apellidos'=>'B A',
            'ci'=>'123456897',
            'celular'=>'253698745',
            'fecha_nacimiento'=>'2025-01-16',
            'ciudad'=>'Quito',
            'provincia'=>'Pichincha',
            'direccion'=>'Calle C',
            'email'=>'ma@test.com',
            'password'=>'123456789',
            'user_id'=>'52',
             ]);

        $this->assertEquals('María A',$secretaria->nombres);
        $this->assertEquals('B A',$secretaria->apellidos);
        $this->assertEquals('123456897',$secretaria->ci);
        $this->assertEquals('253698745',$secretaria->celular);
        $this->assertEquals('2025-01-16',$secretaria->fecha_nacimiento);
        $this->assertEquals('Quito',$secretaria->ciudad);
        $this->assertEquals('Pichincha',$secretaria->provincia);
        $this->assertEquals('Calle C',$secretaria->direccion);
        $this->assertEquals('ma@test.com',$secretaria->email);
        $this->assertEquals('123456789',$secretaria->password);
        $this->assertEquals('52',$secretaria->user_id);
        

    }

    /**
     * Verficar que los Guarded esten correctos
     */

     public function test_guarded_secretaria()
    {

        $secretaria = new Secretaria();
        $this->assertEquals([], $secretaria->getGuarded());
        
    }
}
