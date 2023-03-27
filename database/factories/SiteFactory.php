<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Site>
 */
class SiteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => $this->faker->numberBetween(1, User::all()->count()),
            'domaine' => $this->faker->unique()->domainName(),
            'image' => $this->faker->imageUrl(1024, 1024),
            //'image' => $this->faker->image(storage_path('images'), 1024, 1024),
            'description' => $this->faker->paragraph(),
            'nbCommentaires' => 0,
            'nbVotes' => 0,
        ];
    }
}
