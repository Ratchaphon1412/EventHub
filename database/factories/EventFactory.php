<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $image_path = '/images/'. fake()->image('storage/app/public/images', 240, 240, null, false);
        return [
            'title' => fake()->name(),
            'description' => fake()->realText( fake()->numberBetween(30, 100)),
            'category_id' => fake()->numberBetween(1, Category::all()->count()),
            'image_poster' => $image_path,
            'registration_start_date' => fake()->dateTime(),
            'registration_end_date' => fake()->dateTime(),
            'event_start_date' => fake()->dateTime(),
            'event_end_date' => fake()->dateTime(),
            'user_id' => fake()->numberBetween(1, User::all()->count()),
            'certificate_file' => $image_path,
            'location_detail' => fake()->country()
        ];
    }
}
