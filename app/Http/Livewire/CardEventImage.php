<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Date;
use Livewire\Component;

class CardEventImage extends Component
{
    public string $title;
    public string $image;
    public string $status;
    public string $description;
    public string $category;
    public string $timeStart;
    public string $timeEnd;
    public string $location_name;


    public function mount()
    {
        //
        $this->timeStart = Date::parse($this->timeStart)->format('D,d M');
        $this->timeEnd = Date::parse($this->timeEnd)->format('D,d M');
    }

    public function render()
    {


        return view('livewire.card-event-image');
    }
}
