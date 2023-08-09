<?php

namespace App\Repositories;

use App\Interfaces\EventRepositoryInterface;
use Illuminate\Support\Facades\Auth;
use App\Models\Event;



class  EventRepository implements EventRepositoryInterface
{
    public function getAllEvent()
    {

        return Event::all();
    }


    public function getEventByCategory($category)
    {
        return Event::where('category_id', $category->id)->get();
    }


    public function getEventByUserOwner($user)
    {
        return Event::where('user_id', $user->id)->get();
    }

    public function createEvent(
        $title,
        $description,
        $category,
        $image_poster,
        $registration_start_date,
        $registration_end_date,
        $announcement_date,
        $event_start_date,
        $event_end_date,
        $event_latitude,
        $event_longitude,
        $document_payment,
        $user
    ) {
        return Event::create([
            'title' => $title,
            'description' => $description,
            'category_id' => $category->id,
            'image_poster' => $image_poster,
            'registration_start_date' => $registration_start_date,
            'registration_end_date' => $registration_end_date,
            'announcement_date' => $announcement_date,
            'event_start_date' => $event_start_date,
            'event_end_date' => $event_end_date,
            'event_latitude' => $event_latitude,
            'event_longitude' => $event_longitude,
            'document_payment' => $document_payment,
            'user_id' => $user->id,
        ]);
    }

    public function findById($event_id)
    {
        return Event::find($event_id);
    }

    public function editEvent()
    {
    }

    public function deleteEvent()
    {
    }

    public function updateEvent()
    {
    }
}
