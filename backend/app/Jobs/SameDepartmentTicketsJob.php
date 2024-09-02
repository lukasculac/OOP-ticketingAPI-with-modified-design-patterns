<?php

namespace App\Jobs;

use App\Events\SameDepartmentTicketsReady;
use App\Models\Ticket;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SameDepartmentTicketsJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $agent;
    /**
     * Create a new job instance.
     */
    public function __construct($agent)
    {
        $this->agent = $agent;

    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $tickets = Ticket::where('department', $this->agent->department)->get();

        event(new SameDepartmentTicketsReady($tickets));
    }
}
