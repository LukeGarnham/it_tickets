<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Queries\TicketQuery;
use Illuminate\Http\Request;
use Inertia\Inertia;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(TicketQuery $ticketQuery, Request $request)
    {
        $filters = [];
        if ($search = $request->input('search')) {
            $filters['search']  = $search;
        }
        $tickets = $ticketQuery->paginate($filters, 10);
        return Inertia::render('ticket/Index', [
            'tickets' => $tickets,
            'filters' => $filters,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Ticket $ticket, TicketQuery $ticketQuery)
    {
        // TODO - authorise - check the authenticated user has permission to view this ticket.
        $tickets = $ticketQuery->paginate([], 10);
        return Inertia::render('ticket/Show', [
            'currentTicket' => $ticket,
            'tickets' => $tickets
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ticket $ticket)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ticket $ticket)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ticket $ticket)
    {
        //
    }
}
