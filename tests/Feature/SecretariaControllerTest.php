<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SecretariaControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_rutas_Secretaria(): void
    {
        $response = $this->get('secretarias');

        $response->assertStatus(200);
        $response->assertSeeText('Listado de secretarias.');
    }
}
