<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Enlaces externos de los botones de continente / global
    |--------------------------------------------------------------------------
    |
    | Botones flotantes de la vista dynamic-tools (y boton "Global" de la home):
    |
    |  - America / Europe / Asia -> rutas dynamic-tools-continent de ESTE sitio.
    |    Solo cambia el dominio entre entornos => variable TOOL_BASE_URL.
    |
    |  - Global -> apunta al OTRO sitio (la herramienta global), por eso usa una
    |    variable de dominio distinta => GLOBAL_TOOL_URL.
    |
    | Se consumen via config('links.xxx') para que funcionen con
    | `php artisan config:cache` (env() directo en Blade devuelve null cacheado).
    | Los valores por defecto son los dominios de staging; el proveedor solo
    | ajusta TOOL_BASE_URL y GLOBAL_TOOL_URL en su .env al desplegar.
    |
    */

    'base'        => $base   = rtrim(env('TOOL_BASE_URL', 'https://regional.vision-it.com.mx'), '/'),
    'global_base' => $global = rtrim(env('GLOBAL_TOOL_URL', 'https://global.vision-it.com.mx'), '/'),

    'america' => $base.'/en/dynamic-tools-continent/1',
    'europe'  => $base.'/en/dynamic-tools-continent/2',
    'asia'    => $base.'/en/dynamic-tools-continent/3',
    'global'  => $global.'/en/global',

];
