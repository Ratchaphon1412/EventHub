<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApproveRegisterController
{
    public function index(Event $event)
    {
        $applicants = $event->getApplicants();
        return view('approve-register', ['event' => $event, 'applicants' => $applicants]);
    }

    public function update(Request $request, Event $event, User $applicant)
    {
        $applicant = User::find($request->get('applicant'));
        if ($event->userEventApprove()->find($applicant)->pivot->status == 'approved') {
            $event->userEventApprove()->updateExistingPivot($applicant->id, ['status' => 'pending']);
        } else $event->userEventApprove()->updateExistingPivot($applicant->id, ['status' => 'approved']);

        return $this->index($event);
    }

    public function join(Event $event)
    {
        if ($event->userEventApprove()->find(Auth::user()) == null) {
            if ($event->question and $event->questionName->count() > 0) {
                $questions_name = $event->questionName;
                return view('answer-question', ['event' => $event, 'questions_name' => $questions_name]);
            }
            $event->userEventApprove()->attach(Auth::user());
        }
        return redirect()->back();
    }

    public function unJoin(Event $event)
    {
        $event->userEventApprove()->detach(Auth::user());
        return redirect()->back();
    }

    public function status(Request $request)
    {
        $event = Event::find($request->get('event_id'));
        $user = User::find($request->get('user_id'));
        $event->userEventApprove()->updateExistingPivot($user->id, ['status' => $request->get('status')]);
    }
}
