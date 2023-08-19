<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Question;
use App\Models\QuestionAnswer;
use App\Models\User;

class ApplicantAnswerController
{
    public function index(Event $event, QuestionAnswer $answer)
    {
        $applicant = $answer->user;
        $questionName = $event->questionName;
        return view('applicant-answer', [ 'event'=>$event,
                                                'applicant'=> $applicant]);
    }
}
