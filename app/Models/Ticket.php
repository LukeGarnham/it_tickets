<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Ticket extends Model
{
    use HasFactory, SoftDeletes;
    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = ['formatted_id', 'description_trimmed'];
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
    /**
     * Returns the ID formatted as a string to 5 digits with leading zeroes i.e. 123 => 00123.
     * @return Attribute
     */
    protected function formattedId(): Attribute
    {
        return Attribute::make(
            get: fn() => Str::padLeft($this->id, 5, '0'),
        );
    }
    /**
     * Returns a trimmed version of the description with only 50 characters then and ellipsis i.e. a long paragraph => a long...
     * @return Attribute
     */
    protected function descriptionTrimmed(): Attribute
    {
        return Attribute::make(
            get: fn() => Str::limit($this->description, 50, '...'),
        );
    }
}
