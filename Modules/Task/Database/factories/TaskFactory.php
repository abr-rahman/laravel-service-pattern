<?php

namespace Modules\Task\Database\Factories;

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
            'priority' => $this->faker->randomElement(["Heigh", "Low"]),
            'status' => $this->faker->randomNumber('1', '2'),
            'description' => $this->faker->paragraph(3),
        ];
    }
}
