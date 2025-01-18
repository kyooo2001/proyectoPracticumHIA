<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DoctorControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_rutas_Doctor(): void
    {
        $response = $this->get('doctores');

        $response->assertStatus(200);
        $response->assertSeeText('Listado de doctores.');
    }
}
