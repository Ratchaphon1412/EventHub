<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\QuestionName>
 */
class QuestionNameFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $answer_type = ['Text', 'File', 'Video'];
        return [
            'name' => $this->faker->realText(100),
            'answer_type' => $answer_type[fake()->numberBetween(0, sizeof($answer_type)-1)],
        ];
    }
}
