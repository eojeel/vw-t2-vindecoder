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
            'cc' => fake()->regexify('[0-9]{2} [0-9]{3} [0-9]{3}'),
            'mmmmm' => fake()->regexify('[A-Z0-9]{3} [A-Z0-9]{3} [A-Z0-9]{3} [A-Z0-9]{3} [A-Z0-9]{3}'),
            'pp' => fake()->regexify('[A-Z]{1}[0-9]{1}[A-Z]{1}[0-9]{1}[0-9]{2}'),
            'mmmm' => fake()->regexify('[A-Z0-9]{3} [A-Z0-9]{3} [A-Z0-9]{3} [A-Z0-9]{3}'),
            'dd' => fake()->regexify('[0-9]{2} [0-9]{1}'),
            'uu' => fake()->randomNumber(4, true),
            'ee' => fake()->randomNumber(2, true),
            'tt' => fake()->regexify('[0-9]{4} [0-9]{2}'),
        ];
    }
}
