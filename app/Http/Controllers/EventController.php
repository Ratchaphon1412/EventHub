<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Category;
use App\Models\EventImage;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use App\Notifications\UpdateEventWhenSomeoneEdit;
use App\Notifications\ResultWhoPass;
use App\Notifications\ResultWhoFail;
use App\Interfaces\EventRepositoryInterface;
use App\Interfaces\CategoryRepositoryInterface;
use App\Interfaces\KanbanRepositoryInterface;
use App\Interfaces\KanbanColumnsRepositoryInterface;


use App\Notifications\EventUpdateNotification;


class EventController extends Controller
{

    private EventRepositoryInterface $eventRepository;
    private CategoryRepositoryInterface $categoryRepository;
    private KanbanRepositoryInterface $kanbanRepository;
    private KanbanColumnsRepositoryInterface $kanbanColumnRepository;


    public function __construct(EventRepositoryInterface $eventRepository, CategoryRepositoryInterface $categoryRepository, KanbanRepositoryInterface $kanbanRepository, KanbanColumnsRepositoryInterface $kanbanColumnRepository)
    {
        $this->eventRepository = $eventRepository;
        $this->categoryRepository = $categoryRepository;
        $this->kanbanRepository = $kanbanRepository;
        $this->kanbanColumnRepository = $kanbanColumnRepository;
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categorys = $this->categoryRepository->getAllCategory();
        return view('createEvent', compact('categorys'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'title' => ['required', 'min:1', 'max:255'],
            'detail' => ['required', 'min:1'],
            'category' => ['required'],
            'dateStartIn' => ['required'],
            'datetimeStartIn' => ['required'],
            'dateCloseIn' => ['required'],
            'datetimeCloseIn' => ['required'],
            'location_name' => ['required'],
            'address_latitude' => ['required'],
            'address_longitude' => ['required'],
            // 'Annumentdate' => [],
            // 'datetimeAnnument' => [],
            'startEventDate' => ['required'],
            'endEventDate' => ['required'],
            'file_input' => ['required'],
            'poster' => ['required', 'image', 'mimes:jpeg,png,jpg'],
            'location_detail' => ['required'],
            'contact' => ['required'],
            'file_certificate' => ['required'],
        ]);
        $category  =  $this->categoryRepository->findCategoryByName($request->category);
        $user = Auth::user();

        $imageName = $request->file('poster')->getClientOriginalName();
        $pathImage = $request->file('poster')->storeAs('events/images', $imageName, 'public');

        $imageNameFile = $request->file('file_input')->getClientOriginalName();
        $pathFile = $request->file('file_input')->storeAs('events/files', $imageNameFile, 'public');

        $certificateFile = $request->file('file_certificate')->getClientOriginalName();
        $pathCertificateFile = $request->file('file_certificate')->storeAs('events/files', $certificateFile, 'public');

        $combinedDTStartIn = date('Y-m-d H:i:s', strtotime("$request->dateStartIn $request->datetimeStartIn"));
        $combinedDTCloseIn = date('Y-m-d H:i:s', strtotime("$request->dateCloseIn $request->datetimeCloseIn"));
        $combinedDTAnnumentdate = date('Y-m-d H:i:s', strtotime("$request->Annumentdate $request->datetimeAnnument"));
        $startEventDate = date('Y-m-d', strtotime("$request->startEventDate"));
        $endEventDate = date('Y-m-d', strtotime("$request->endEventDate"));

        $event = $this->eventRepository->createEvent(
            $request->title,
            $request->detail,
            $category,
            $pathImage,
            $combinedDTStartIn,
            $combinedDTCloseIn,
            $combinedDTAnnumentdate,
            $startEventDate,
            $endEventDate,
            $request->address_latitude,
            $request->address_longitude,
            $pathFile,
            $pathCertificateFile,
            $user,
            $request->location_detail,
            $request->contact,
            $request->location_name,
        );

        //Multiple Image
        $listFiles = $request->file('listImage');
        foreach ($listFiles as $file) {
            $filename = $file->storeAs('events/images',  $file->getClientOriginalName(), 'public');
            $this->eventRepository->addEventImage($event, $filename);
        }

        //create Kanban board
        $kanban = $this->kanbanRepository->createKanban($event);
        $this->kanbanColumnRepository->createKanbanColumn($kanban, "Todo");
        $this->kanbanColumnRepository->createKanbanColumn($kanban, "Working");
        $this->kanbanColumnRepository->createKanbanColumn($kanban, "Done");
        return redirect()->route('dashboard');
    }
    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        // $event_detail = $event;
        return view('eventDetail', ['event' => $event]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        $categorys = $this->categoryRepository->getAllCategory();
        return view('editEvent', ['event' => $event, 'categorys' => $categorys]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Event $event)
    {
        $request->validate([
            'title' => ['required', 'min:1', 'max:255'],
            'detail' => ['required', 'min:1'],
            'category' => ['required'],
            'dateStartIn' => ['required'],
            'datetimeStartIn' => ['required'],
            'dateCloseIn' => ['required'],
            'datetimeCloseIn' => ['required'],
            'location_name' => ['required'],
            'address_latitude' => ['required'],
            'address_longitude' => ['required'],
            // 'Annumentdate' => [],
            // 'datetimeAnnument' => [],
            'startEventDate' => ['required'],
            'endEventDate' => ['required'],
            'file_input' => ['required'],
            'poster' => ['required', 'image', 'mimes:jpeg,png,jpg'],
            'location_detail' => ['required'],
            'contact' => ['required'],
            'file_certificate' => ['required'],
        ]);
        $category  =  $this->categoryRepository->findCategoryByName($request->category);
        $user = Auth::user();

        $imageName = $request->file('poster')->getClientOriginalName();
        $pathImage = $request->file('poster')->storeAs('events/images', $imageName, 'public');

        $imageNameFile = $request->file('file_input')->getClientOriginalName();
        $pathFile = $request->file('file_input')->storeAs('events/files', $imageNameFile, 'public');

        $certificateFile = $request->file('file_certificate')->getClientOriginalName();
        $pathCertificateFile = $request->file('file_certificate')->storeAs('events/files', $certificateFile, 'public');


        $combinedDTStartIn = date('Y-m-d H:i:s', strtotime("$request->dateStartIn $request->datetimeStartIn"));
        $combinedDTCloseIn = date('Y-m-d H:i:s', strtotime("$request->dateCloseIn $request->datetimeCloseIn"));
        $combinedDTAnnumentdate = date('Y-m-d H:i:s', strtotime("$request->Annumentdate $request->datetimeAnnument"));
        $startEventDate = date('Y-m-d', strtotime("$request->startEventDate"));
        $endEventDate = date('Y-m-d', strtotime("$request->endEventDate"));


        $this->eventRepository->updateEvent(
            $event,
            $request->title,
            $request->detail,
            $category,
            $pathImage,
            $combinedDTStartIn,
            $combinedDTCloseIn,
            $combinedDTAnnumentdate,
            $startEventDate,
            $endEventDate,
            $request->address_latitude,
            $request->address_longitude,
            $pathFile,
            $user,
            $request->location_detail,
            $request->contact,
            $request->location_name,
            $pathCertificateFile,
        );
        // notification when someone edit
        $userTeam = $event->userTeam;

        foreach($userTeam as $teamMember){
            Notification::send($teamMember,new UpdateEventWhenSomeoneEdit($event,$user));
        }

        return view('eventDetail', ['event' => $event]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)

    {
        // $event->delete();
        $this->eventRepository->deleteEvent($event);
        return redirect()->route('teamEvent.index');
    }

    public function questionEnable(Request $request)
    {
        $event = $this->eventRepository->findById($request->id);
        $event->question = $request->enable;
        $event->save();
    }

    public function result(Request $request){
        // dd($request->all());
        $event = Event::find($request->event);
        // return $event;
        $resultapplicant = $event->userEventApprove;
        foreach($resultapplicant as $approveUser){
            // return $approveUser;
            if($approveUser->approveEvents->first()->pivot->status === "accept"){
                // return $approveUser;
                Notification::send($approveUser,new ResultWhoPass($event,$approveUser));
            }
            else
            {
                Notification::send($approveUser,new ResultWhoFail($event,$approveUser));
            }
        }
        $event->result = true;
        $event->save();
        // $check->approveEvents->first()->pivot->status
        return redirect()->back();
    }
    public function isJoinedEvent(){
        $user = Auth::user();
        $joinedEvents = $user->approveEvents;
        //  return $joinedEvents;
        
        return view('eventJoined',['joinedEvents' => $joinedEvents]);
        
    }
    public function isInTeam(Request $request){
        $user = Auth::user();
        $inTeamEvents = $user->joinedTeam;
        
        return view('teamJoined',['inTeamEvents' => $inTeamEvents]);
    }
}
