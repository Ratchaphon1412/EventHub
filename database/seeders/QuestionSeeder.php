<?php

namespace Database\Seeders;

use App\Models\Event;
use App\Models\Question;
use App\Models\QuestionAnswer;
use App\Models\QuestionName;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        for ($j = 0; $j < 3; $j++) {
            $type = ['text', 'image'];
            $event_id = rand(1, 2);
            $size = 4;
            for ($i = 1; $i <= $size; $i++) {
                $questionName = new QuestionName();
                $question = new Question();

                $questionName->name = fake()->realText(100);
                $questionName->answer_type = $type[rand(0,1)];
                $questionName->save();

                $question->event_id = $event_id;
                $question->question_name_id = $questionName->id;
                $question->save();
            }
        }


    }
}
