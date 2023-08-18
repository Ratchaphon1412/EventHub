<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class TeamEventController extends Controller
{
    public function index()
    {
        $events = Event::all();
        return view('teamEvent',compact('events'));
    }


    public function update(Request $request,Event $event)
    {
        $event_from_id = Event::find($request->get('event')); 
        // return $event_from_id;
        // dd($request->all());
        // $allUser = User::all();
        // $status = User::where('email',);
        // $request->validate([
        //     'Email' => ['required','email',Rule::exists('users','email')],
        // ]);
        // dd($request->all());

        $user = User::where('email','=',$request->get('email'))->get();
        // return $user;
        // $user = User::find('email',$request->get('Email'));
        // return $user;
        $event_from_id->userTeam()->attach($user);
        
        return redirect()->back();
    }
}
