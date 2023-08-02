<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CardEventImage extends Component
{
    public string $title;
    public string $image;
    public string $status;
    public string $description;
    public string $category;

    
    public function render()
    {
        return view('livewire.card-event-image');
    }
}
