<?php

namespace Database\Factories;

use App\Models\Cliente;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ClienteFactory extends Factory
{

    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Cliente::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nome' => $this->faker->name,
            'cpf' => $this->faker->unique()->numberBetween(11111111111, 99999999999),
            'data_nascimento' => $this->faker->dateTimeBetween('1960-01-01', '2000-12-31')
    ->format('Y-m-d'),
            'sexo_id' => rand(1, 2),
            'endereco' => $this->faker->address,
            'estado_id' => 3,
            'cidade_id' => 4,
        ];
    }
}
