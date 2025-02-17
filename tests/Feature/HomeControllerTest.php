<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class HomeControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_rutas_Home(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSeeText('Sign in to start your session');
    }
}
