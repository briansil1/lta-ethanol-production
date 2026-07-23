# LTA Regional

[English](README.md) | **Español**

## Requisitos

- **Extensión PHP php_zip habilitada**
- **Extensión PHP php_xml habilitada**
- **Extensión PHP php_iconv habilitada**
- **Extensión PHP php_simplexml habilitada**
- **Extensión PHP php_xmlreader habilitada**
- **Extensión PHP php_zlib habilitada**
- **Instalar también la extensión ext-zip**


## Base de datos

Para la base de datos, sigue estas instrucciones.

1. Crea un respaldo del entorno de producción ejecutando:

- **mysqldump -u [usuario] -p [base_de_datos] > prod_database.sql**

2. Crea un respaldo de la tabla de usuarios ejecutando:

- **mysqldump -u [usuario] -p [base_de_datos] users > users.sql**

3. Descarga los últimos cambios y despliega la aplicación.

4. Ejecuta las migraciones de la base de datos:

- **php artisan migrate:fresh --seed**

5. Finalmente, restaura los datos de la tabla de usuarios ejecutando:

- **mysql -u [usuario] -p [base_de_datos] < users.sql**

## Variables de entorno

- **APP_EUROPE_ID** — el id es 23.
- **APP_DEFAULT_COUNTRY_ID** — el id es 4.
- **APP_USA_ID** — el id es 24.
- **ADMIN_PASS** — esta contraseña la define US Grains.

### Botones de continente / Global (funciona en todos los dominios, sin hardcode)

El tool debe funcionar en cualquier dominio (nuestro staging, el QA del cliente,
la producción del cliente) **sin editar código**. Existen dos tipos de enlaces:

- **Botones internos — America / Europe / Asia.** Apuntan a la vista de continente
  del **mismo** tool. Se generan con `route(__('routes.tools-continent'), N)`, así
  que Laravel los construye para el **dominio actual automáticamente**. No
  requieren configuración — funcionan en el dominio donde se sirva el sitio
  (siempre que `APP_URL` coincida con ese dominio).

- **Botón entre-sitios — Global.** Lleva al usuario del tool regional al tool
  **Global**, que puede vivir en **otro dominio y/o path** según el entorno. Es el
  **único** enlace entre-sitios, y su **URL completa** se define en una sola
  variable de entorno:

  - **GLOBAL_TOOL_URL** — URL completa (dominio + path) del tool Global. Se
    consume vía `config('links.global')`. Ejemplos:
    - Proveedor (staging/demo): `https://global.vision-it.com.mx/en/static-home`
    - Cliente (mismo dominio, por path): `https://ethanolblendslta.grains.org/en/global`

> **No hay ningún fallback hardcodeado.** Si `GLOBAL_TOOL_URL` no está definida, se
> usa el default de `config/links.php` (la URL de staging del proveedor), y el
> botón "Global" simplemente no hace nada si el valor está vacío — nunca salta a
> un dominio ajeno por sorpresa.

> Nota: el valor se lee vía `config('links.global')`, **no** `env('...')`
> directamente en Blade. Como el pipeline ejecuta `php artisan config:cache`,
> `env()` devuelve `null` en runtime una vez cacheada la configuración.

> **Acción requerida del cliente:** el tool Global debe estar realmente accesible
> en la URL que pongas en `GLOBAL_TOOL_URL`. Hoy `…grains.org/en/global` da 404
> porque el tool Global aún no está montado ahí — eso es un paso de despliegue del
> lado del cliente, independiente de este código.

Ver `docs/CONFIGURATION.es.md` (español) / `docs/CONFIGURATION.en.md` (inglés)
para la guía completa de configuración por entorno.
