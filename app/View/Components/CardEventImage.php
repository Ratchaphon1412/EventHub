<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CardEventImage extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public string $title ,public string $image,public string $status, public string $description,public string $category)
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.card-event-image');
    }
}
