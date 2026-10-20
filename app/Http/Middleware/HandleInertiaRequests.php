<?php

namespace App\Http\Middleware;

use App\Models\Ticket;
use Illuminate\Http\Request;
use Inertia\Middleware;

class HandleInertiaRequests extends Middleware
{
    /**
     * The root template that's loaded on the first page visit.
     *
     * @see https://inertiajs.com/server-side-setup#root-template
     *
     * @var string
     */
    protected $rootView = 'app';

    /**
     * Determines the current asset version.
     *
     * @see https://inertiajs.com/asset-versioning
     */
    public function version(Request $request): ?string
    {
        return parent::version($request);
    }

    /**
     * Define the props that are shared by default.
     *
     * @see https://inertiajs.com/shared-data
     *
     * @return array<string, mixed>
     */
    public function share(Request $request): array
    {
        // TODO - filter these results to only show the tickets that below to the authenticated user.
        $tickets = Ticket::paginate(10)->through(fn($ticket) => [ // TODO: Filter the data to only send through the fields that are needed.
            'id' => $ticket->id,
            'formatted_id' => $ticket->formatted_id,
            'title' => $ticket->title,
            'description_trimmed' => $ticket->description_trimmed,
            'status' => $ticket->status,
        ]);
        return [
            ...parent::share($request),
            'name' => config('app.name'),
            'auth' => [
                'user' => $request->user(),
            ],
            'tickets' => $tickets,
        ];
    }
}
