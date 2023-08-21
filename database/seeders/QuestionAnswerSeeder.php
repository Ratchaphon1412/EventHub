<?php

namespace Database\Seeders;

use App\Models\Event;
use App\Models\QuestionAnswer;
use App\Models\QuestionName;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class QuestionAnswerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function answerText(QuestionName $questionName, User $user) {
        $answer = new QuestionAnswer();
        $answer->answer = fake()->realText(50);
        $answer->question_name_id = $questionName->id;
        $answer->user_id = $user->id;
        $answer->save();
    }

    public function answerFile(QuestionName $questionName, User $user) {
        $answer = new QuestionAnswer();
        $image_name = fake()->image('storage/app/public/images', 640, 480, null, false);
        $image_path = "/images/". $image_name;
        $answer->image_name = $image_name;
        $answer->image_path = $image_path;
        $answer->question_name_id = $questionName->id;
        $answer->user_id = $user->id;
        $answer->save();
    }

    public function answerVideo(QuestionName $questionName, User $user) {
        $answer = new QuestionAnswer();
        $answer->question_name_id = $questionName->id;
        $answer->user_id = $user->id;
        $answer->save();
    }

    public function run(): void
    {
        $users = User::all();
        $events = Event::all();
        foreach ($events as $event) {
            if ($event->questionName->count() == 0) {
                echo "There aren't have question in " . $event->title . "\n";
                continue;
            }
            if ($event->questionName->last()->questionAnswer->count() > 0) {
                echo "There are some answer in ". $event->title ."\n";
                continue;
            }
            if ($users->count() > 0) {
                $numberOfUsersAnswer = fake()->numberBetween(1, $users->count());
            } else {
                $numberOfUsersAnswer = 0;
            }
            for ($i = 0; $i < $numberOfUsersAnswer; $i++) {
                $user = $users->random(); // this answer All question in this event
                if ($event->userEventApprove->where('id', $user->id)->count() == 0) {
                    $event->userEventApprove()->attach($user); // join
                } else {
                    continue;
                }

                foreach ($event->questionName as $questionName) {
                    if ($questionName->answer_type == "Text") {
                        $this->answerText($questionName, $user);
                    } elseif ($questionName->answer_type == "File") {
                        $this->answerFile($questionName, $user);
                    } else {
                        $this->answerVideo($questionName, $user);
                    }
                }
            }
        }
    }
}
