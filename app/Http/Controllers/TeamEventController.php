<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class TeamEventController extends Controller
{
    public function index()
    {
        $events = Event::all();
        return view('teamEvent',compact('events'));
    }
}
