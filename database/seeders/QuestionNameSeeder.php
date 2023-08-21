<?php

namespace Database\Seeders;

use App\Models\Event;
use App\Models\QuestionName;
use Illuminate\Database\Seeder;

class QuestionNameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $events = Event::all();

        foreach ($events as $event) {
            if ($event->questionName->count() > 0) {
                echo "There are some question in". $event->title ."event \n";
                continue;
            }
            $numberOfQuestionName = fake()->numberBetween(1, 5);
            $questionNames = QuestionName::factory($numberOfQuestionName)->create();
            $event->questionName()->attach($questionNames);
        }
    }
}
