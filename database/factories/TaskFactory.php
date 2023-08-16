<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'task' => $this->faker->name(),
            'priority' => $this->faker->randomElement(),
            'status' => $this->faker->randomElement(["Heigh", "Low"]),
            'description' => $this->faker->paragraph(3),
        ];
    }
}
