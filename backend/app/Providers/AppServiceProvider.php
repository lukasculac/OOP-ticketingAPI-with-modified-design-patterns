<?php

namespace App\Providers;

use App\Models\Agent;
use App\Models\File;
use App\Models\Ticket;
use App\Models\Worker;
use App\Observers\AgentObserver;
use App\Observers\FileObserver;
use App\Observers\TicketObserver;
use App\Observers\WorkerObserver;
use App\Repositories\TicketRepository;
use App\Repositories\TicketRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(TicketRepositoryInterface::class, TicketRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Ticket::observe(TicketObserver::class);
        Worker::observe(WorkerObserver::class);
        Agent::observe(AgentObserver::class);
        File::observe(FileObserver::class);
    }
}
