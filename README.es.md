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

### Dominio base y botones de continente / global (dynamic-tools)

Los botones flotantes de la vista `dynamic-tools` (y el botón "Global" de la
home) enlazan con URL absoluta. Solo el **dominio** cambia entre entornos, por
eso se define en variables; las rutas viven en `config/links.php` y se consumen
vía `config('links.*')` (compatible con `php artisan config:cache`).

- **TOOL_BASE_URL** — dominio base de **este** sitio. Construye los botones
  America/Europe/Asia (`/en/dynamic-tools-continent/1|2|3`). Migrar de dominio =
  cambiar solo esta variable. Por defecto: `https://regional.vision-it.com.mx`.
  En cliente/producción ajustar al dominio real (ej: `https://ethanolblendslta.grains.org`).
- **GLOBAL_TOOL_URL** — dominio del sitio de la herramienta **Global** (destino
  del botón "Global", que apunta al OTRO sitio). Construye `/en/global`. Por
  defecto: `https://global.vision-it.com.mx`.

> Nota: usar siempre `config('links.xxx')` en las vistas, **no** `env('...')`
> directamente. Como el pipeline ejecuta `php artisan config:cache`, `env()`
> devuelve `null` en runtime una vez cacheada la configuración. Si una variable no
> está definida, se usa el valor por defecto de `config/links.php`.
