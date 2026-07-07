## Requirements

- **PHP extension php_zip enabled**
- **PHP extension php_xml enabled**
- **PHP extension php_iconv enabled**
- **PHP extension php_simplexml enabled**
- **PHP extension php_xmlreader enabled**
- **PHP extension php_zlib enabled**
- **Also install the ext-zip extension**


## Database

For the database, you need to follow the following instructions.

1. You need to create a backup of the production environment, You must execute the following instruction

- **mysqldump -u [username] -p [database] > prod_database.sq**

2. Create user table backup, You must execute the following instruction

- **mysqldump -u [username] -p [database] users > users.sql**

3. Download the latest changes and deploy the application

4. Create database migrations
- **php artisan migrate:fresh --seed**

5. Finally we must return the information from the users table, for this it is necessary to execute the following instruction

- **mysql -u [username] -p [database] < users.sql**

## Enviroment variables
- **APP_EUROPE_ID**
The id is 23
- **APP_DEFAULT_COUNTRY_ID**
The id is 4
- **APP_USA_ID**
The id is 24

- **ADMIN_PASS**
This password is set by US Grains

### Dominio base y botones de continente / global (dynamic-tools)

Los botones flotantes de la vista `dynamic-tools` (y el botón "Global" de la
home) enlazan con URL absoluta. Solo el **dominio** cambia entre entornos, por
eso se define en variables; las rutas viven en `config/links.php` y se consumen
vía `config('links.*')` (compatible con `php artisan config:cache`).

- **TOOL_BASE_URL** — dominio base de **este** sitio. Construye los botones
  America/Europe/Asia (`/en/dynamic-tools-continent/1|2|3`). Migrar de dominio =
  cambiar solo esta variable. Por defecto: `https://regional.vision-it.com.mx`.
  En cliente/producción ajustar (ej: `https://ethanolblendslta.grains.org`).
- **GLOBAL_TOOL_URL** — dominio del sitio de la herramienta **Global** (destino
  del botón "Global", que apunta al OTRO sitio). Construye `/en/global`. Por
  defecto: `https://global.vision-it.com.mx`.

> Nota: usar siempre `config('links.xxx')` en las vistas, **no** `env('...')`
> directamente, porque con la config cacheada `env()` devuelve `null` en runtime.