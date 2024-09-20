<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Client;
use App\Models\Project;
use App\Models\User;
use App\Enums\TaskStatus;

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
        $users = User::pluck('id');
        $clients = Client::pluck('id');
        $projects = Project::pluck('id');

        return [
            'title'       => fake()->sentence,
            'description' => fake()->paragraph,
            'user_id'     => $users->random(),
            'client_id'   => $clients->random(),
            'project_id'  => $projects->random(),
            'deadline_at' => fake()->dateTimeBetween('+1 month', '+6 months'),
            'status'      => fake()->randomElement(TaskStatus::cases())->value,
        ];
    }
}
