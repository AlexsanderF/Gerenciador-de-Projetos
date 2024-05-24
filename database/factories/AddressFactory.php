<?php

namespace Database\Factories;

use App\Models\Address;
use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class AddressFactory extends Factory
{
    protected $model = Address::class;

    public function definition(): array
    {
        return [
            'logradouro' => $this->faker->word(),
            'numero' => $this->faker->word(),
            'bairro' => $this->faker->word(),
            'cidade' => $this->faker->word(),
            'complemento' => $this->faker->word(),
            'cep' => $this->faker->word(),
            'estado' => $this->faker->word(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

            'employee_id' => Employee::factory(),
        ];
    }
}
