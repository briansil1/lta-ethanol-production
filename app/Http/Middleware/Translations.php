<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Translations
{
    protected $languages = [
        'es' => 'es_MX',
        'en' => 'en_US',
        'fr' => 'fr_FR',
    ];

    public function handle(Request $request, Closure $next)
    {
        $locale = $request->segment(1);
        if (array_key_exists($locale, $this->languages)) {
            app()->setLocale($this->languages[$locale]);
        }
        return $next($request);
    }
}
