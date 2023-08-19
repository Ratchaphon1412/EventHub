<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Event;
use Illuminate\Support\Facades\Auth;

class CertificateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $events = Event::all();
        $approveEvents = $user->approveEvents;
        // return $approveEvents;
        // foreach($events as $event){
        //     if($event->userEventApprove->where('user_id',$user->id) != null){
        //         array_push($approveEvent,$event->userEventApprove->where('user_id',$user->id));
        //     }
        //     // array_push($approveEvent,$event->userEventApprove->where('user_id',$user->id));
        //     // foreach($event->userEventApprove as $pivotTable){
        //     //     $approveEvent = $event->userEventApprove->where('user_id',$user->id);
        //     // }
        // }
        // return $approveEvent;

        return view('certificate',['approveEvent' => $approveEvents]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
