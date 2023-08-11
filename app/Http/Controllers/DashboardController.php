<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Event;
use App\Models\Category;

class DashboardController extends Controller
{
    //

    public function index()
    {
        $events = Event::all();

        return view('dashboard', compact('events'));
    }
}
