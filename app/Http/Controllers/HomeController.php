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
        $events = Event::paginate(9);

        return view('welcome', compact('categories', 'events'));
    }

    public function categoryView(Category $category)
    {
        $events = $this->eventRepository->getEventByCategory($category);

        return view('categoryView', compact('category', 'events'));
    }
}
