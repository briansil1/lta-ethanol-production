<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Locale extends Model
{
    public function reports(): HasMany {
        return $this->hasMany(Report::class);
    }

    public function profiles(): HasMany {
        return $this->hasMany(Profile::class);
    }

    public function dynamicToolsImages(): HasMany {
        return $this->hasMany(DynamicToolsImage::class);
    }

    public function dynamicToolsTexts(): HasMany {
        return $this->hasMany(DynamicToolsText::class);
    }
}
