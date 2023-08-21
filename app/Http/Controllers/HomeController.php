<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Event;

use App\Interfaces\EventRepositoryInterface;



class HomeController extends Controller
{

    private EventRepositoryInterface $eventRepository;

    public function __construct(EventRepositoryInterface $eventRepository)
    {

        $this->eventRepository = $eventRepository;
    }


    public function index()
    {
        $categories = Category::all();

        $events_sort_date = Event::orderBy('event_start_date', 'desc')->paginate(9);

        $events_sort_newest = Event::orderBy('id', 'desc')->paginate(9);

        return view('welcome', ['categories' => $categories, 'events_sort_date' => $events_sort_date, 'events_sort_newest' => $events_sort_newest]);
    }

    public function categoryView(Category $category)
    {
        $events = $this->eventRepository->getEventByCategory($category);

        return view('categoryView', compact('category', 'events'));
    }
}
