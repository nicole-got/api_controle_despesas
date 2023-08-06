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

    public function test_delete()
    {
        $usuario = Usuario::factory()->create();

        $this->login();
        $response = $this->delete('/api/usuario/'.$usuario->id);

        $response->assertStatus(200);
    }

    public function test_cadastro()
    {
        $usuario = Usuario::factory()->make();
        
        $response = $this->post('/api/cadastrar/usuario',[
            'nome' => $usuario->nome,
            'email' => $usuario->email,
            'senha' => '123',
        ]);

        $response->assertStatus(201);

        $this->assertDatabaseHas('usuarios', [
            'nome' => $usuario->nome,
            'email' => $usuario->email,
        ]);

        $this->login();
        $response = $this->delete('/api/usuario/'.$response->json()['data']['id']);
    }

}
