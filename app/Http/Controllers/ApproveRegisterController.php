<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\User;
use Illuminate\Http\Request;

class ApproveRegisterController
{
    public function index(Event $event){
        $applicants = $event->getApplicants();
        return view('approve-register', ['event'=>$event, 'applicants' => $applicants]);
    }

    public function update(Request $request, Event $event, User $applicant)
    {
        $applicant = User::find($request->get('applicant'));
        if($event->userEventApprove()->find($applicant)->pivot->status == 'approved'){
            $event->userEventApprove()->updateExistingPivot($applicant->id, ['status' => 'pending']);
        } else $event->userEventApprove()->updateExistingPivot($applicant->id, ['status' => 'approved']);

        return $this->index($event);
    }
}
