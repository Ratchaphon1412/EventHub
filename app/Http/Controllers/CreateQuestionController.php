<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Question;
use App\Models\QuestionName;
use Illuminate\Http\Request;

class CreateQuestionController
{
    public function index(Event $event)
    {
        return view('create-question', ['event' => $event]);
    }

    private function getRequestSize(Request $request): float|int
    {
        return sizeof($request->keys()) - 1;
    }

    public function store(Request $request, Event $event)
    {
        $questionName = new QuestionName();

        $q = "question";
        $answerType = 'type';

        $questionName->name = (string)$request->get($q);
        $questionName->answer_type = (string)$request->get($answerType);
        $questionName->save();

        $event->questionName()->attach($questionName);
        return view('eventDetail', ['event' => $event]);
    }

    public function delete(Event $event, QuestionName $questionName)
    {
        $event->questionName()->detach($questionName);
        $questionName->delete();
        return view('eventDetail', ['event' => $event]);
    }
}
