<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Support\Facades\Auth;
use App\Models\Despesa;
use App\Models\Usuario;
use Illuminate\Database\Eloquent\Factories\Factory;

class DespesaControllerTest extends TestCase
{
    public function test_todas_despesas()
    {
        $this->login();
        $response = $this->get('/api/despesa');

        $response->assertStatus(200);
        $this->assertArrayHasKey('data', $response->json());
    }

    private function login()
    {
        Auth::login(Usuario::where('email', 'api@controledespesa.com')->first());
    }

    public function test_delete()
    {
        $despesa = Despesa::factory()->create();

        $this->login();
        $response = $this->delete('/api/despesa/'.$despesa->id);

        $response->assertStatus(200);
    }

    public function test_cadastro()
    {
        $despesa = Despesa::factory()->make();
        
        $this->login();
        $response = $this->post('/api/despesa',[
            'idUsuario' => 1,
            'descricao' => $despesa->descricao,
            'data'      => $despesa->data,
            'valor'     => $despesa->valor
        ]);

        $response->assertStatus(201);

        $this->assertDatabaseHas('despesas', [
            'idUsuario' => 1,
            'descricao' => $despesa->descricao,
            'data'      => $despesa->data,
            'valor'     => $despesa->valor
        ]);

        $response = $this->delete('/api/despesa/'.$response->json()['id']);
        $response->assertStatus(200);
    }
}
