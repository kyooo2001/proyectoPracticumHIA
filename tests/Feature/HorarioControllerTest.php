<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class HorarioControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_rutas_Horario(): void
    {
        $response = $this->get('horarios');

        $response->assertStatus(200);
        $response->assertSeeText('Listado de horarios.');
    }
}
