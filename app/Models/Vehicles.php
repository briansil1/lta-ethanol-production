<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Vehicles extends Model
{
    public function country(): BelongsTo {
        return $this->belongsTo(Country::class);
    }
}
