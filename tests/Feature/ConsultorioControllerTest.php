<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ConsultorioControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_rutas_Consultorio(): void
    {
        $response = $this->get('consultorios');

        $response->assertStatus(200);
        $response->assertSeeText('Hospital Isidro Ayora');
    }
}
