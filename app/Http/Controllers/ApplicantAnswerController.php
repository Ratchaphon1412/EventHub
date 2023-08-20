<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Question;
use App\Models\QuestionAnswer;
use App\Models\User;
use function Symfony\Component\String\u;

class ApplicantAnswerController
{
    public function index(Event $event, User $user)
    {
        $questionName = $event->questionName;
        return view('applicant-answer', [ 'event'=>$event,
                                                'user'=> $user]);
    }
    
}
