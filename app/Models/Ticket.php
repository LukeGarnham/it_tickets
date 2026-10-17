<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ticket extends Model
{
    use HasFactory, SoftDeletes;
    /**
     * Get a collection of users that a ticket is owned by.
     */
    public function owners(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'ticket_owners');
    }

    /**
     * Get a collection of users that a ticket is assigned to.
     */
    public function assignees(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'ticket_assignees');
    }

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'category_ticket');
    }

    public function status(): BelongsTo
    {
        return $this->belongsTo(TicketStatus::class, 'ticket_status_id');
    }

    public function impact(): BelongsTo
    {
        return $this->belongsTo(TicketImpact::class, 'ticket_impact_id');
    }
}
