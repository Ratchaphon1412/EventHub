<?php

namespace App\Interfaces;

use Illuminate\Support\Facades\Auth;

interface EventRepositoryInterface
{
    public function getAllEvent();
    public function getEventByCategory($category);
    public function getEventByUserOwner($user);
    public function createEvent($title, $description, $category, $image_poster, $registration_start_date, $registration_end_date, $announcement_date, $event_start_date, $event_end_date, $event_latitude, $event_longitude, $document_payment,$certificate_file, $user, $location_detail, $contact, $location_name);
    public function findById($event_id);
    public function editEvent($event);
    public function deleteEvent($event);
    public function updateEvent($event,$title, $description, $category, $image_poster, $registration_start_date, $registration_end_date, $announcement_date, $event_start_date, $event_end_date, $event_latitude, $event_longitude, $document_payment, $user, $location_detail, $contact, $location_name);
    public function addEventImage($event, $image);
}
