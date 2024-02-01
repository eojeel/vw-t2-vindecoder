<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Vin>
 */
class VinFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'chassis_number' => fake()->regexify('[0-9]{2} [0-9]{3} [0-9]{3}'),
            'mcode_1' => fake()->regexify('[A-Z0-9]{3} [A-Z0-9]{3} [A-Z0-9]{3} [A-Z0-9]{3} [A-Z0-9]{3}'),
            'paint_interior' => fake()->regexify('[A-Z]{1}[0-9]{1}[A-Z]{1}[0-9]{1}[0-9]{2}'),
            'mcode_2' => fake()->regexify('[A-Z0-9]{3} [A-Z0-9]{3} [A-Z0-9]{3} [A-Z0-9]{3}'),
            'model_year' => fake()->regexify('[0-9]{2} [0-9]{1}'),
            'production_plan' => fake()->randomNumber(4, true),
            'export_destination' => fake()->randomNumber(2, true),
            'body_engine_model' => fake()->regexify('[0-9]{4} [0-9]{2}'),
        ];
    }
}
