<?php

namespace App\Services;

use App\Models\Ticket;
use App\Strategies\TicketHandlingStrategy;

class TicketHandler
{
    private $strategy;

    public function setStrategy(TicketHandlingStrategy $strategy): void
    {
        $this->strategy = $strategy;
    }

    public function handleTicket(Ticket $ticket): void
    {
        $this->strategy->handle($ticket);
    }
}
