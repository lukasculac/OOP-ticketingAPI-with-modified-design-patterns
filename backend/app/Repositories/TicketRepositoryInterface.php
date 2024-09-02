<?php

namespace App\Repositories;

use App\Models\Ticket;
use Illuminate\Http\Request;

interface TicketRepositoryInterface
{
    public function index(Request $request);
    public function store(Request $request);
    public function show(Ticket $ticket);
    public function update(Request $request, Ticket $ticket);
    public function submitResponse(Request $request, Ticket $ticket);
    public function handleTicketState(Request $request, Ticket $ticket);
    public function updateTicketPriorities();
    public function destroy(Ticket $ticket);
    public function findNotClosed();
    public function findHighPriority();
}



