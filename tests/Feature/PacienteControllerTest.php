<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PacienteControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_rutas_Paciente(): void
    {
        $response = $this->get('pacientes');

        $response->assertStatus(200);
        $response->assertSeeText('Listado de pacientes.');
    }
}
