<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\QuestionAnswer;
use App\Models\User;
use App\Models\QuestionName;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Interfaces\EventRepositoryInterface;
use App\Interfaces\QuestionRepositoryInterface;
use Illuminate\Support\Facades\Gate;


class QuestionController extends Controller
{

    private EventRepositoryInterface $eventRepository;
    private QuestionRepositoryInterface $questionRepository;

    public function __construct(EventRepositoryInterface $eventRepository, QuestionRepositoryInterface $questionRepository)
    {
        $this->eventRepository = $eventRepository;
        $this->questionRepository = $questionRepository;
        $this->authorizeResource(QuestionName::class);
    }


    public function index(Event $event)
    {
        return view('event.question.create-question', ['event' => $event]);
    }



    public function store(Request $request, Event $event)
    {

        Gate::authorize('create', $event);
        $questionName = $this->questionRepository->newQuestionName($request->get("question"), $request->get('type'));
        $this->eventRepository->addQuestionName($event, $questionName);
        return redirect()->back();
    }

    public function delete(Event $event, QuestionName $questionName)
    {

        Gate::authorize('delete', $questionName);
        $this->eventRepository->removeQuestionName($event, $questionName);
        $this->questionRepository->deleteQuestionName($questionName);

        return redirect()->back();
    }

    public function applicant(Event $event, User $user)
    {
        return view('event.question.applicant-answer', [
            'event' => $event,
            'user' => $user
        ]);
    }

    public function answer(Request $request, Event $event)
    {
        $this->authorizeResource(QuestionAnswer::class);
        Gate::authorize('create', QuestionAnswer::class);
        $this->authorizeResource(QuestionName::class);
        $questionsNameOfEvent = $this->eventRepository->getQuestionName($event);
        $size = sizeof($questionsNameOfEvent);

        for ($i = 1; $i <= $size; $i++) {
            $questionName = $questionsNameOfEvent->get($i - 1);
            $answer_str = 'answer' . $i;
            $image_str = 'image' . $i;

            //data
            $answer = null;
            $fileName = null;
            $filePath = null;
            $user = Auth::user();

            //validate Data
            if ($request->get($answer_str != null)) {
                $answer = $request->get($answer_str);
            }

            if ($request->file($image_str) != null) {
                $fileName = $request->file($image_str)->getClientOriginalName();
                $filePath = $request->file($image_str)->storeAs('images', $fileName, 'public');
            }
            $this->questionRepository->newQuestionAnswer($answer, $fileName, $filePath, $questionName, $user);
        }
        //finish answer question redirect to event detail
        $this->eventRepository->addUserInApproveEvent($event, $user);
        return view('event.eventDetail', ['event' => $event]);
    }
}
