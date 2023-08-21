<?php

namespace App\View\Components\Events;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Event;

class EventDetailView extends Component
{
    /**
     * Create a new component instance.
     */





    public function __construct(public Event $event)
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.events.event-detail-view');
    }
}
