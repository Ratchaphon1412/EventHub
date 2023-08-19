<?php

namespace App\Repositories;

use App\Interfaces\EventRepositoryInterface;
use App\Models\Event;
use App\Models\EventImage;



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
        $certificate_file,
        $user,
        $location_detail,
        $contact,
        $location_name,
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
            'certificate_file' => $certificate_file,
            'user_id' => $user->id,
            'location_detail' => $location_detail,
            'contact' => $contact,
            'location_name' => $location_name
        ]);
    }

    public function findById($event_id)
    {
        return Event::find($event_id);
    }

    public function editEvent($event)
    {
    }

    public function deleteEvent($event)
    {
        $event->delete();
    }

    public function updateEvent(
        $event,
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
        $user,
        $location_detail,
        $contact,
        $location_name
    ) {
        return Event::where('id', $event->id)->update([
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
            'location_detail' => $location_detail,
            'contact' => $contact,
            'location_name' => $location_name
        ]);
    }

    public function addEventImage($event, $image)
    {

        return EventImage::create([
            'event_id' => $event->id,
            'event_image' => $image,
        ]);
    }
}
