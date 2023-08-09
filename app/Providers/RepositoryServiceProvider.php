<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Interfaces\KanbanCardRepositoryInterface;
use App\Repositories\KanbanCardRepository;
use App\Interfaces\KanbanColumnsRepositoryInterface;
use App\Repositories\KanbanColumnRepository;
use App\Interfaces\KanbanRepositoryInterface;
use App\Repositories\KanbanRepository;


class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
        $this->app->bind(KanbanRepositoryInterface::class,KanbanRepository::class);
        $this->app->bind(KanbanColumnsRepositoryInterface::class,KanbanColumnRepository::class);
        $this->app->bind(KanbanCardRepositoryInterface::class,KanbanCardRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
