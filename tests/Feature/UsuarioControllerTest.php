<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Support\Facades\Auth;
use App\Models\Usuario;
use Illuminate\Database\Eloquent\Factories\Factory;

class UsuarioControllerTest extends TestCase
{
    public function test_todos_usuarios()
    {
        $this->login();
        $response = $this->get('/api/usuario');

        $response->assertStatus(200);
        $this->assertArrayHasKey('data', $response->json());
    }

    private function login()
    {
        Auth::login(\App\Models\Usuario::where('email', 'api@controledespesa.com')->first());
    }
}
