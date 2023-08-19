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
        // dd($request->all());
        // $allUser = User::all();
        // $status = User::where('email',);
        // $request->validate([
        //     'Email' => ['required','email',Rule::exists('users','email')],
        // ]);
        // dd($request->all());
        if(User::where('email', '=', $request->get('email'))->exists())
        {
            $event_from_id = Event::find($request->get('event')); 
            // return $event_from_id->all();
            $user = User::where('email','=',$request->get('email'))->get();
            // return $user;
            // $user = User::find('email',$request->get('Email'));
            // return $user;
            $event_from_id->userTeam()->attach($user);
            return redirect()->back();
        }
        else
        {
            $request->validate([
            'Email' => ['required','email',Rule::exists('users','email')],
            ]);
            // return "Not have in database";
        }
    }

    public function destory(Request $request,Event $event,User $user){
        // dd($request->all());
        $event_from_id = Event::find($request->get('event')); 
        $user_form_id = User::find($request->get('user'));

        $event_from_id->userTeam()->detach($user_form_id);
        return redirect()->back();
    }
}
