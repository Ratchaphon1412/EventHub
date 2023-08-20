<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Question;
use App\Models\QuestionAnswer;
use App\Models\QuestionName;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Ramsey\Collection\Collection;

class AnswerQuestionController
{
    public function index(Event $event, User $user)
    {
        return $user;
        return view('applicant-answer', ['event'=>$event, 'user'=>$user]);
    }

    public function store(Request $request, Event $event)
    {
        $questionsNameOfEvent = $event->questionName;
        $size = sizeof($questionsNameOfEvent);
        $user = Auth::user();

        for ($i = 1; $i <= $size; $i++) {
            $questionName = $questionsNameOfEvent->get($i-1);
            $answer_str = 'answer' . $i;
            $image_str = 'image' . $i;

            $questionAnswer = new QuestionAnswer();
            if ($request->get($answer_str) != null) {
                $questionAnswer->answer = $request->get($answer_str);
            }
            if ($request->file($image_str) != null) {
                $questionAnswer->image_name = $request->file($image_str)->getClientOriginalName();
                $questionAnswer->image_path = $request->file($image_str)->storeAs('images', $questionAnswer->image_name, 'public');
            }
            $questionAnswer->question_name_id = $questionName->id;
            $questionAnswer->user_id = $user->id;
            $questionAnswer->save();


            // $question = new Question();

            // $question->event_id = $event->id;

            // $question->user_id = $user->id;
            // $question->question_name_id = $questionsNameOfEvent->get($i - 1)->id;
            // $question->question_answer_id = $questionAnswer->id;
            // $question->save();
        }
        // if ($event->userEventApprove()->find(Auth::user()) == null) {
        //     $event->userEventApprove()->attach(Auth::user());
        // }
        $event->userEventApprove()->attach($user);
        return view('eventDetail', ['event' => $event]);
    }
}
