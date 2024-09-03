<?php

namespace App\Observers;

use App\Models\Ticket;
use Illuminate\Support\Facades\Log;

class TicketObserver
{

    public function eddited(Ticket $ticket): void
    {
        Log::channel('custom')->info('Ticket '. $ticket->id . ' EDDITED ');
    }

    public function priorityMedium(Ticket $ticket): void
    {
        Log::channel('custom')->info('Ticket '. $ticket->id . ' priority changed to Medium ');
    }

    public function priorityHigh(Ticket $ticket): void
    {
        Log::channel('custom')->info('Ticket '. $ticket->id . ' priority changed to Medium ');
    }

    public function openned(Ticket $ticket): void
    {
        Log::channel('custom')->info('Ticket '. $ticket->id . ' OPENNED ');
    }

    public function closed(Ticket $ticket): void
    {
        Log::channel('custom')->info('Ticket '. $ticket->id . ' CLOSED ');
    }


    /**
     * Handle the Ticket "created" event.
     */
    public function created(Ticket $ticket): void
    {
        Log::channel('custom')->info('Ticket '. $ticket->id . ' CREATED ');
    }

    /**
     * Handle the Ticket "updated" event.
     */
    public function updated(Ticket $ticket): void
    {
        //
    }

    /**
     * Handle the Ticket "deleted" event.
     */
    public function deleted(Ticket $ticket): void
    {
       // Log::channel('custom')->info('Ticket deleted: ' . $ticket->id);
        Log::channel('custom')->info('Ticket '. $ticket->id . ' DELETED ');    }

    /**
     * Handle the Ticket "restored" event.
     */
    public function restored(Ticket $ticket): void
    {
        //
    }

    /**
     * Handle the Ticket "force deleted" event.
     */
    public function forceDeleted(Ticket $ticket): void
    {
        //
    }
}
