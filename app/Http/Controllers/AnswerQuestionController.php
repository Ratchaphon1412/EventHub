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
    public function index(Event $event)
    {
        $questions_name = $this->findQuestionsNameFrom($event);
        return view('answer-question', ['event'=>$event, 'questions_name'=>$questions_name]);
    }

    private function findQuestionsNameFrom(Event $event){
        $questions = Question::where('event_id', $event->id)->get('question_name_id');
        $questions_name = QuestionName::find($questions);
        return $questions_name;
    }

    public function store(Request $request, Event $event)
    {
        $questionsNameOfEvent = $this->findQuestionsNameFrom($event);
        $size = sizeof($questionsNameOfEvent);
        for ($i = 1; $i <= $size; $i++) {

            $answer_str = 'answer'.$i;
            $image_str = 'image'.$i;

            $questionAnswer = new QuestionAnswer();
            if ($request->get($answer_str) != null) {
                $questionAnswer->answer = $request->get($answer_str);
            }
            if ($request->file($image_str) != null) {
                $questionAnswer->image_name = $request->file($image_str)->getClientOriginalName();
                $questionAnswer->image_path = $request->file($image_str)->storeAs('images', $questionAnswer->image_name, 'public');
            }
            $questionAnswer->save();



            $question = new Question();

            $question->event_id = $event->id;
            $question->user_id = Auth::user()->getAuthIdentifier();
            $question->question_name_id = $questionsNameOfEvent->get($i-1)->id;
            $question->question_answer_id = $questionAnswer->id;
            $question->save();
        }
        if ($event->userEventApprove()->find(Auth::user()) == null){
            $event->userEventApprove()->attach(Auth::user());
        }


        return view('dashboard', ['event' =>$event]);
    }
}
