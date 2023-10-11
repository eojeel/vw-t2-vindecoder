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
            'cc' => '12 123 123',
            'mmmmm' => '123 123 123 123 123',
            'pp' => 'J2J252',
            'mmmm' => '123 123 123 123',
            'dd' => '12 1',
            'uu' => '1234',
            'ee' => '11',
            'tt' => '1234 11',
        ];
    }
}
