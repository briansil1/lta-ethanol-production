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
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $group_lang = $request->route()->getPrefix();
        $group_locale_clean = substr($group_lang, 1);
        app()->setLocale($this->languages[$group_locale_clean]);
        return $next($request);
    }
}
