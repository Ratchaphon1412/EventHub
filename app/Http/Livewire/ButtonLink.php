<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ButtonLink extends Component
{
    public string $text;
    public string $link;
    
    public function render()
    {
        return view('livewire.button-link');
    }
}
