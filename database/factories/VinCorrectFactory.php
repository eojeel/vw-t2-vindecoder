<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class VinCorrectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'chassis_number' => '12 123 123',
            'mmmmm' => '123 123 123 123 123',
            'paint_interior' => 'J2J252',
            'mmmm' => '123 123 123 123',
            'model_year' => '12 1',
            'production_plan' => '1234',
            'export_destination' => '11',
            'body_engine_model' => '1234 11',
        ];
    }
}
