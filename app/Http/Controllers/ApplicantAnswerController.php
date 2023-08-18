<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Question;
use App\Models\QuestionAnswer;
use App\Models\User;

class ApplicantAnswerController
{
    public function index(Event $event, User $applicant)
    {
        $allQuestionName = Question::getQuestionsNameByEvent($event); // collection of id with question name
        $itemSize = sizeof($allQuestionName);

        $allMapId = Question::where('user_id', $applicant->id)->get();

        $questionsName = [$itemSize+1];
        $questionsAnswer = [$itemSize+1];
        for ($i = 0; $i < $itemSize; $i++) {
            $questionsName[$i] = $allQuestionName->get($i)->questionName;
            $questionsAnswer[$i] = Question::where('question_name_id', $questionsName[$i]->id)->where('question_answer_id', '!=', null)->first();
            if ($questionsAnswer[$i] != null) $questionsAnswer[$i] = QuestionAnswer::find($questionsAnswer[$i]->question_answer_id);
        }
        return view('applicant-answer', [ 'event'=>$event,
                                                'applicant'=> $applicant,
                                                'questionsName'=>$questionsName,
                                                'questionsAnswer'=>$questionsAnswer]);
    }
}
