<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Enlace al tool GLOBAL (unico enlace entre-sitios configurable)
    |--------------------------------------------------------------------------
    |
    | Los botones internos (America / Europe / Asia) NO viven aqui: se generan
    | con route(__('routes.tools-continent'), N) en las vistas, por lo que
    | apuntan siempre al dominio actual sin necesidad de configuracion.
    |
    | El unico enlace que cruza a OTRO despliegue es el boton "Global" (lleva
    | del tool regional al tool global). Como el tool global puede vivir en
    | otro dominio y/o path segun el entorno, se define su URL COMPLETA en una
    | sola variable de entorno: GLOBAL_TOOL_URL (dominio + path, sin nada
    | hardcodeado aqui).
    |
    | Ejemplos de GLOBAL_TOOL_URL:
    |   - Proveedor (staging/demo): https://global.vision-it.com.mx/en/static-home
    |   - Cliente (mismo dominio, por path): https://ethanolblendslta.grains.org/en/global
    |
    | Se consume via config('links.global') para que funcione con
    | `php artisan config:cache` (env() directo en Blade devuelve null cacheado).
    | El default es el entorno del proveedor; cada entorno del cliente define su
    | propio valor en su .env.
    |
    */

    'global' => rtrim(env('GLOBAL_TOOL_URL', 'https://global.vision-it.com.mx/en/static-home'), '/'),

];
