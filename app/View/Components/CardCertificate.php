<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Routing\Route;
use Illuminate\View\Component;

class CardCertificate extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public string $image, public string $title,
                                public string $dateStart, public string $dateEnd, public string $route)
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.card-certificate');
    }
}
