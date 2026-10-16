<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Category extends Model
{
    public function tickets(): BelongsToMany
    {
        return $this->belongsToMany(Ticket::class, 'category_ticket');
    }
}
