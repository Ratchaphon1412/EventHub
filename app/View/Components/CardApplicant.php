<?php

namespace App\View\Components;

use App\Models\Event;
use App\Models\User;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CardApplicant extends Component
{
    /**
     * Create a new component instance.
     */
    public $event;
    public User $applicant;
    public function __construct($event, User $applicant, public string $approveRoute, public string $moreRoute,
                                public string $button1, public string $button2)
    {
        $this->event = $event;
        $this->applicant = $applicant;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.card-applicant');
    }
}
