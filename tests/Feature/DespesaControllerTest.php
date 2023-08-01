<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Support\Facades\Auth;
use App\Models\Despesa;
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
        Auth::login(\App\Models\Usuario::where('email', 'api@controledespesa.com')->first());
    }
}
