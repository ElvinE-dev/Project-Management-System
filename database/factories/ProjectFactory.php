<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'start_date' => date('Y-m-d', random_int(1770013115, 1770063115)),
            'deadline' => date('Y-m-d', random_int(1770063115, 1770313115)),
            'is_completed' => false,
            'members' => '',
        ];
    }
}
