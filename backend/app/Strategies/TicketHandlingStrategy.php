<?php

namespace App\Strategies;

use App\Models\Ticket;

interface TicketHandlingStrategy
{
    public function handle(Ticket $ticket): void;
}
