<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Country extends Model
{
    public function users(): HasMany {
        return $this->hasMany(User::class);
    }

    public function reports(): HasMany {
        return $this->hasMany(Report::class);
    }

    public function profiles(): HasMany {
        return $this->hasMany(Profile::class);
    }

    public function emissions(): HasMany {
        return $this->hasMany(Emission::class);
    }

    public function vehicles(): HasMany {
        return $this->hasMany(Vehicles::class);
    }

    public function gasolineComponents(): HasMany {
        return $this->hasMany(GasolineComponent::class);
    }

    public function dynamicToolsImages(): HasMany {
        return $this->hasMany(DynamicToolsImage::class);
    }

    public function dynamicToolsTexts(): HasMany {
        return $this->hasMany(DynamicToolsText::class);
    }
}
