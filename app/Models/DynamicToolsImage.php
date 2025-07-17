<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DynamicToolsImage extends Model
{
    public function country(): BelongsTo {
        return $this->belongsTo(Country::class);
    }

    public function locale(): BelongsTo {
        return $this->belongsTo(Locale::class);
    }
}
