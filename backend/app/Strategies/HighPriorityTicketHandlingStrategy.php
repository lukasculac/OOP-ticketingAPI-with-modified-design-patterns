<?php

namespace App\Strategies;

use App\Models\Ticket;

class HighPriorityTicketHandlingStrategy implements TicketHandlingStrategy
{
    public function handle(Ticket $ticket): void
    {
        // TODO: Implement handle() method.
    }

}

class LowPriorityTicketHandlingStrategy implements TicketHandlingStrategy
{
    public function handle(Ticket $ticket): void
    {
        // Logic for handling low priority tickets
    }
}
