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
    
    public function render()
    {
        
        $this->timeStart = date('d-m');
        $this->timeEnd = date('d-m');
        return view('livewire.card-event-image');
    }
}
