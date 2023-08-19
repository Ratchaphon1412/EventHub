<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Question;
use App\Models\QuestionName;
use Illuminate\Http\Request;

class CreateQuestionController
{
    public function index(Event $event){
        return view('create-question', ['event'=>$event]);
    }

    private function getRequestSize(Request $request): float|int
    {
        return (sizeof($request->keys()) - 1)/2;
    }

    public function store(Request $request, Event $event)
    {


        $size = $this->getRequestSize($request);
        for ($i = 1; $i <= $size; $i++) {
            $questionName = new QuestionName();
            $question = new Question();

            $q = "question" . $i;
            $answerType = 'answerType' . $i;

            $questionName->name = (string)$request->get($q);  //get question 1 to question 3
            $questionName->answer_type = strtolower((string)$request->get($answerType));
            $questionName->save();

            $question->event_id = $event->id;
            $question->question_name_id = $questionName->id;
            $question->save();
        }
        return view('dashboard', ['event'=> $event]);
    }
}
