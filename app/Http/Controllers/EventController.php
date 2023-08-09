<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Category;
use App\Models\EventImage;
use Illuminate\Http\Request;
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
        // $request->validate([
        //     'title' => ['required', 'min:1', 'max:255'],
        //     'detail' => ['required', 'min:1', 'max:255'],
        //     'category' => ['required'],
        //     'dateCloseIn' => ['required'],
        //     'datetimeCloseIn' => ['required'],
        //     'Annumentdate' => ['required'],
        //     'datetimeAnnument' => ['required'],
        //     'startEventDate' => ['required'],
        //     'endEventDate' => ['required'],
        //     'file_input' => ['required'],
        //     'poster' => ['required', 'image', 'mimes:jpeg,png,jpg', 'max:2048'],
        //     'listImage'
        // ]);

        $category  =  $this->categoryRepository->findCategoryByName($request->category);
        $user = Auth::user();
        $image_poster = $request->file('poster')->store('images', 'public');
        $event = $this->eventRepository->createEvent(
            $request->title,
            $request->detail,
            $category,
            $image_poster,
            $request->dateCloseIn,
            $request->datetimeCloseIn,
            $request->Annumentdate,
            $request->datetimeAnnument,
            $request->startEventDate,
            $request->endEventDate,
            $request->latitude,
            $request->longitude,
            $request->file('file_input'),
            $user
        );
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Event $event)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        //
    }
}
