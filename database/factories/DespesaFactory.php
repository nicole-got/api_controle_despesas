<?php

namespace Database\Factories;

use App\Models\Despesa;
// use App\Models\Usuario;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Despesa>
 */
class DespesaFactory extends Factory
{
    protected $model = Despesa::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "idUsuario"     =>  '1',
            "descricao"     =>  $this->faker->sentence,
            "data"          =>  $this->faker->date,
            "valor"         =>  $this->faker->randomFloat(2, 10, 1000)
        ];
    }
}
