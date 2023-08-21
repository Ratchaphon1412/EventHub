<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

use App\Interfaces\EventRepositoryInterface;
use App\Interfaces\UserRepositoryInterface;

class TeamEventController extends Controller
{

    private $eventRepository;
    private $userRepository;

    public function __construct(EventRepositoryInterface $eventRepository, UserRepositoryInterface $userRepository)
    {
        $this->eventRepository = $eventRepository;
        $this->userRepository = $userRepository;
    }

    public function index()
    {
        $events = Event::all();
        return view('event.teamEvent', compact('events'));
    }


    public function update(Request $request, Event $event)
    {

        // $request->validate([
        //     'email' => 'required|email|unique:users,email',
        // ]);

        if ($this->userRepository->checkUserExist($request->get('email'))) {
            $event_from_id = $this->eventRepository->findById($request->get('event'));
            $user = $this->userRepository->findByEmail($request->get('email'));
            $this->eventRepository->addUserToTeam($event_from_id, $user);
        } else {
            return redirect()->back()->with(['tab' => "team", 'error' => 'Not have email in system']);
        }

        return redirect()->back()->with(['tab' => "team"]);
    }

    public function destory(Request $request, Event $event, User $user)
    {

        $event_from_id = $this->eventRepository->findById($request->get('event'));
        $user_form_id = $this->userRepository->findById($request->get('user'));

        $this->eventRepository->removeUserFromTeam($event_from_id, $user_form_id);

        return redirect()->back()->with(['tab' => "team"]);
    }
}
