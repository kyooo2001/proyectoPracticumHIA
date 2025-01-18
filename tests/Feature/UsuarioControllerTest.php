<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UsuarioControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_rutas_User(): void
    {
        $response = $this->get('Usuarios');

        $response->assertStatus(200);
        $response->assertSeeText('Listado de usuarios del sistema.');
    }
}
