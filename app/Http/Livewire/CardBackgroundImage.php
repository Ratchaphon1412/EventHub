<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CardBackgroundImage extends Component
{
    public string $image;
    public string $title;
    public string $description;
    public string $route;



    public function render()
    {
        return view('livewire.card-background-image');
    }
}
