<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Category;
use App\Models\EventImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Interfaces\EventRepositoryInterface;
use App\Interfaces\CategoryRepositoryInterface;



class EventController extends Controller
{

    private EventRepositoryInterface $eventRepository;
    private CategoryRepositoryInterface $categoryRepository;


    public function __construct(EventRepositoryInterface $eventRepository, CategoryRepositoryInterface $categoryRepository)
    {
        $this->eventRepository = $eventRepository;
        $this->categoryRepository = $categoryRepository;
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
            'title' => ['required','min:1','max:255'],
            'detail' => ['required','min:1','max:255'],
            'category' => ['required'],
            'dateStartIn' => ['required'],
            'datetimeStartIn' => ['required'],
            'dateCloseIn' => ['required'],
            'datetimeCloseIn' => ['required'],
            // 'Annumentdate' => [],
            // 'datetimeAnnument' => [],
            'startEventDate' => ['required'],
            'endEventDate' => ['required'],
            'file_input' => ['required'],
            'poster' => ['required', 'image', 'mimes:jpeg,png,jpg'],
            'listImage'
        ]);
        $category  =  $this->categoryRepository->findCategoryByName($request->category);
        $user = Auth::user();

        $imageName = $request->file('poster')->getClientOriginalName();
        $pathImage = $request->file('poster')->storeAs('images',$imageName,'public');
            
        $imageNameFile = $request->file('file_input')->getClientOriginalName();
        $pathFile = $request->file('file_input')->storeAs('images',$imageNameFile,'public');

        $combinedDTStartIn = date('Y-m-d H:i:s', strtotime("$request->dateStartIn $request->datetimeStartIn"));
        $combinedDTCloseIn = date('Y-m-d H:i:s', strtotime("$request->dateCloseIn $request->datetimeCloseIn"));
        $combinedDTAnnumentdate = date('Y-m-d H:i:s', strtotime("$request->Annumentdate $request->datetimeAnnument"));
        $startEventDate = date('Y-m-d',strtotime("$request->startEventDate"));
        $endEventDate = date('Y-m-d',strtotime("$request->endEventDate"));

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
            $request->latitude,
            $request->longitude,
            $pathFile,
            $user
        );
        return $event;
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
        return view('editEvent',['event' => $event, 'categorys' => $categorys]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Event $event)
    {
        $request->validate([
            'title' => ['required','min:1','max:255'],
            'detail' => ['required','min:1','max:255'],
            'category' => ['required'],
            'dateStartIn' => ['required'],
            'datetimeStartIn' => ['required'],
            'dateCloseIn' => ['required'],
            'datetimeCloseIn' => ['required'],
            'Annumentdate' => ['required'],
            'datetimeAnnument' => ['required'],
            'startEventDate' => ['required'],
            'endEventDate' => ['required'],
            'file_input' => ['required'],
            'poster' => ['required','image', 'mimes:jpeg,png,jpg'],
            'listImage'
        ]);
        // $user = Auth::user();
        // $event->user_id = $
        // return dd($event->all());
        if($request->hasFile('poster')){
            // Storage::delete($event->poster_image);
            $imageName = $request->file('poster')->getClientOriginalName();
            $pathImage = $request->file('poster')->storeAs('images',$imageName,'public');
        }   
        $category  =  $this->categoryRepository->findCategoryByName($request->category);

        // $imageName = $request->file('poster')->getClientOriginalName();
        // $pathImage = $request->file('poster')->storeAs('images',$imageName,'public');
            
        $imageNameFile = $request->file('file_input')->getClientOriginalName();
        $pathFile = $request->file('file_input')->storeAs('images',$imageNameFile,'public');

        $combinedDTStartIn = date('Y-m-d H:i:s', strtotime("$request->dateStartIn $request->datetimeStartIn"));
        $combinedDTCloseIn = date('Y-m-d H:i:s', strtotime("$request->dateCloseIn $request->datetimeCloseIn"));
        $combinedDTAnnumentdate = date('Y-m-d H:i:s', strtotime("$request->Annumentdate $request->datetimeAnnument"));
        $startEventDate = date('Y-m-d',strtotime("$request->startEventDate"));
        $endEventDate = date('Y-m-d',strtotime("$request->endEventDate"));

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
            $request->latitude,
            $request->longitude,
            $pathFile
        );
        return redirect()->route('teamEvent.index');
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
}
