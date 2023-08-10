<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class DashboardController extends Controller
{
    //

    public function index()
    {
        $user = Auth::user();
        $event = Event::find(2);
        return view('dashboard', ['event' => $event, 'user' => $user]);
    }
}
