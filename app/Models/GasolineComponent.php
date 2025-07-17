<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

class GasolineComponent extends \Illuminate\Database\Eloquent\Model
{
    public function country(): BelongsTo {
        return $this->belongsTo(Country::class);
    }
}
