<?php

namespace App\Jobs;

use App\Events\OtherTicketsReady;
use App\Http\Controllers\Api\V1\TicketController;
use App\Models\Ticket;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class UpdateTicketPrioritiesAndSendOtherTicketsJob implements ShouldQueue
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

        $ticketController = new TicketController;
        $ticketController->updateTicketPriorities();

        // Fetch the remaining tickets
        $otherTickets = Ticket::where('department', '!=', $this->agent->department)->get();

        event(new OtherTicketsReady($otherTickets));
    }
}
