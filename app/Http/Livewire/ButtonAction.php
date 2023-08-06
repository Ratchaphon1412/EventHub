<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ButtonAction extends Component
{
    public string $text;
    public string $idfunc;
    public string $modal_target;
    public string $modal_toggle;
    public function render()
    {
        return view('livewire.button-action');
    }
}
