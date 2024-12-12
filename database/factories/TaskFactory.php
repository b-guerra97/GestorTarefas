<?php

namespace Database\Factories;

use App\Models\Project;
use App\Models\Tag;
use App\Models\Task;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
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
            'name' => fake()->words(3, true),
            'description' => fake()->sentence(),
            'status_id' => 1,
            'project_id' => Project::all()->random()->id,
        ];
    }

    public function withTags() {
        return $this->afterCreating(function (Task $task) {
            $tags = Tag::all()->random(2)->pluck('id'); // Associa até 2 tags aleatórias
            $task->tags()->attach($tags);
        });
    }
}
