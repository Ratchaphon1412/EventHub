<?php

namespace App\Interfaces;

use Illuminate\Support\Facades\Auth;

interface EventRepositoryInterface{
    public function getAllEvent();
    public function getEventByCategory($category);
    public function getEventByUserOwner($user);
    public function createEvent($title,$description,$category,$image_poster,$registration_start_date,$registration_end_date,$announcement_date,$event_start_date,$event_end_date,$event_latitude,$event_longitude,$document_payment,$user);
    public function findById($event_id);
    public function editEvent();
    public function deleteEvent();
    public function updateEvent();
    
}