<?php

namespace App\Queries;

use App\Models\Ticket;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;

class TicketQuery
{
    /**
     * Get a filtered collection from the tickets table.
     * @param array $filters
     * @param int $perPage
     * @return LengthAwarePaginator<int, Ticket>
     */
    public function paginate(array $filters = [], int $perPage = 25): LengthAwarePaginator
    {
        // TODO - filter these results to only show the tickets that belong to the authenticated user.
        return Ticket::query()
            ->when(
                $filters['search'] ?? null,
                fn(Builder $query, string $search) => $query
                    ->where('title', 'like', "%{$search}%")
                    ->orWhere('description', 'like', "%{$search}%")
                    ->orWhere('id', 'like', "%{$search}%")
            )
            ->latest()
            ->paginate($perPage)
            ->withQueryString()
            ->onEachSide(0)
            ->through(fn($ticket) => [ // TODO: Filter the data to only send through the fields that are needed.
                'id' => $ticket->id,
                'formatted_id' => $ticket->formatted_id,
                'title' => $ticket->title,
                'description_trimmed' => $ticket->description_trimmed,
                'status' => $ticket->status,
            ]);
    }
}
