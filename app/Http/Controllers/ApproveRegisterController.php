<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Interfaces\EventRepositoryInterface;
use App\Interfaces\UserRepositoryInterface;

class ApproveRegisterController
{

    private EventRepositoryInterface $eventRepository;
    private UserRepositoryInterface $userRepository;

    public function __construct(EventRepositoryInterface $eventRepository, UserRepositoryInterface $userRepository)
    {
        $this->eventRepository = $eventRepository;
        $this->userRepository = $userRepository;
    }


    public function index(Event $event)
    {
        $applicants = $this->eventRepository->getApplicants($event);
        return view('event.approve-register', ['event' => $event, 'applicants' => $applicants]);
    }

    public function join(Event $event)
    {
        // user not in approve
        if ($this->eventRepository->checkUserInApproveEvent($event, Auth::user()) == null) {
            if ($event->question and $event->questionName->count() > 0) {
                $questions_name = $event->questionName;
                return view('event.answer-question', ['event' => $event, 'questions_name' => $questions_name]);
            }
            $this->eventRepository->addUserInApproveEvent($event, Auth::user());
        }
        return redirect()->back();
    }

    public function unJoin(Event $event)
    {
        $this->eventRepository->removeUserInApproveEvent($event, Auth::user());
        return redirect()->back();
    }

    public function status(Request $request)
    {
        $event = $this->eventRepository->findById($request->get('event_id'));

        $user = $this->userRepository->findById($request->get('user_id'));

        $this->eventRepository->updateStatusApproveEvent($event, $user, $request->get('status'));
    }
    public function notComplateQuestion(Event $event)
    {

        //user in approve but not complate Question
        if ($this->eventRepository->checkUserInApproveEvent($event, Auth::user())->pivot->status == "notcomplate") {
            $questions_name = $event->questionName;
            return view('event.answer-question', ['event' => $event, 'questions_name' => $questions_name]);
        }
    }
}
