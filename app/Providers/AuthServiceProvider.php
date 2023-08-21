<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Models\Event;
use App\Models\EventImage;
use App\Models\Kanban;
use App\Models\KanbanCard;
use App\Models\KanbanColumn;
use App\Models\QuestionAnswer;
use App\Models\QuestionName;
use App\Policies\EventPolicy;
use App\Policies\KanBanPolicy;
use App\Policies\QuestionAnswerPolicy;
use App\Policies\QuestionNamePolicy;
use Database\Seeders\KanbanSeeder;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Event::class => EventPolicy::class,
        EventImage::class => EventPolicy::class,
        Kanban::class => KanBanPolicy::class,
        KanbanCard::class => KanBanPolicy::class,
        KanbanColumn::class => KanBanPolicy::class,
        QuestionName::class => QuestionNamePolicy::class,
        QuestionAnswer::class => QuestionAnswerPolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        //
    }
}
