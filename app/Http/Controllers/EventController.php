<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Category;
use App\Models\EventImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class EventController extends Controller
{
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
        $category = Category::all(); 
        return view('createEvent',['categorys'=>$category]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required','min:1','max:255'],
            'detail' => ['required','min:1','max:255'],
            'category' => ['required'],
            'dateCloseIn' => ['required'],
            'datetimeCloseIn' => ['required'],
            'Annumentdate' => ['required'],
            'datetimeAnnument' => ['required'],
            'startEventDate' => ['required'],
            'endEventDate' => ['required'],
            'file_input' => ['required'],
            'poster' => ['required','image','mimes:jpeg,png,jpg','max:2048'],
            'listImage'
        ]);

        $event = new Event();
        //poster

        $event->title = $request->get('title');
        $event->description = $request->get('detail');

        $category = Category::where();
        $event->category_id = $category->where('category_name', '=', $request->category)->get()->id;

        $event->poster = $request->get('poster');
        $combinedDTCloseIn = date('Y-m-d H:i:s', strtotime("$request->dateCloseIn $request->datetimeCloseIn"));
        $event->registration_end_date = $combinedDTCloseIn;

        $combinedDTAnnumentdate = date('Y-m-d H:i:s', strtotime("$request->Annumentdate $request->datetimeAnnument"));
        $event->announcement_date = $combinedDTAnnumentdate;

        $event->event_start_date = $request->startEventDate;
        $event->event_end_date = $request->endEventDate;
        $event->document_payment = $request->file_input;

        // $
        //Images_event
        // foreach($request->listImage)
        // $eventImage = new EventImage();
        // $event->event_image_id = $eventImage->id;
        // $listImg = [];

        // $request->get('listImage')->$eventImage;


        // $user = Auth::user();
        // $event->user_id = $user->id;



        // $event->
        return view('home');
    }
    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        // $event_detail = $event;
        return view('eventDetail',['event'=>$event]);
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
