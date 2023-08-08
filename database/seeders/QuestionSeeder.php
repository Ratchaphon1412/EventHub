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
    public static function run(): void
    {

        for ($i = 0; $i < 10; $i++) {
            $questionAnswer = new QuestionAnswer();
            $questionAnswer->answer = fake()->realText(110);
            $questionAnswer->save();

            $questionName = new QuestionName();
            $questionName->name = fake()->realText(100);
            $questionName->save();

            $question = new Question();
            $question->question_answer_id = $questionAnswer->id;
            $question->question_name_id = $questionName->id;
            $question->user_id = random_int(1,4);
            $question->event_id = 1;
            $question->save();
        }

        for ($i = 0; $i < 10; $i++) {
            $questionAnswer = new QuestionAnswer();
            $questionAnswer->answer = fake()->realText(110);
            $questionAnswer->save();

            $question = new Question();
            $question->question_answer_id = $questionAnswer->id;
            $question->question_name_id = random_int(1,10);
            $question->user_id = random_int(1,4);
            $question->event_id = 1;
            $question->save();
        }

    }
}
