<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Ticket;
use App\Repositories\TicketRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;


class TicketController extends Controller
{
    //definition of repository
    protected $ticketRepository;
    public function __construct(TicketRepositoryInterface $ticketRepository)
    {
        $this->ticketRepository = $ticketRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $tickets = $this->ticketRepository->index($request);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $tickets = $this->ticketRepository->store($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(Ticket $ticket)
    {
        $tickets = $this->ticketRepository->show($ticket);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ticket $ticket)
    {
        $tickets = $this->ticketRepository->update($request, $ticket);

    }

    public function submitResponse(Request $request, Ticket $ticket)
    {
        $tickets = $this->ticketRepository->submitResponse($request, $ticket);

    }

    public function handleTicketState(Request $request, Ticket $ticket)
    {
        $tickets = $this->ticketRepository->handleTicketState($request, $ticket);

    }

    public function updateTicketPriorities()
    {
        $tickets = $this->ticketRepository->updateTicketPriorities();

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ticket $ticket)
    {
        $tickets = $this->ticketRepository->destroy($ticket);

    }

    public function findNotClosed()
    {
        Log::info('Called findNotClosed method');
        $tickets = $this->ticketRepository->findNotClosed();
    }

    public function findHighPriority()
    {
        $tickets = $this->ticketRepository->findHighPriority();
    }

    public function listTicketsOfHighPriorityNotClosed()
    {
        $tickets = $this->ticketRepository->listTicketsOfHighPriorityNotClosed();
    }


}
