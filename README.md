# LTA Regional

## Requirements

- **PHP extension php_zip enabled**
- **PHP extension php_xml enabled**
- **PHP extension php_iconv enabled**
- **PHP extension php_simplexml enabled**
- **PHP extension php_xmlreader enabled**
- **PHP extension php_zlib enabled**
- **Also install the ext-zip extension**


## Database

For the database, follow these instructions.

1. Create a backup of the production environment by running:

- **mysqldump -u [username] -p [database] > prod_database.sql**

2. Create a backup of the users table by running:

- **mysqldump -u [username] -p [database] users > users.sql**

3. Download the latest changes and deploy the application.

4. Run the database migrations:

- **php artisan migrate:fresh --seed**

5. Finally, restore the users table data by running:

- **mysql -u [username] -p [database] < users.sql**

## Environment variables

- **APP_EUROPE_ID** — the id is 23.
- **APP_DEFAULT_COUNTRY_ID** — the id is 4.
- **APP_USA_ID** — the id is 24.
- **ADMIN_PASS** — this password is set by US Grains.

### Base domain and continent / global buttons (dynamic-tools)

The floating buttons on the `dynamic-tools` view (and the "Global" button on the
home page) link using absolute URLs. Only the **domain** changes between
environments, so it is defined through variables; the routes live in
`config/links.php` and are consumed via `config('links.*')` (compatible with
`php artisan config:cache`).

- **TOOL_BASE_URL** — the base domain of **this** site. Builds the
  America/Europe/Asia buttons (`/en/dynamic-tools-continent/1|2|3`). Changing the
  domain means changing only this variable. Defaults to
  `https://regional.vision-it.com.mx`. In a client/production environment set it
  to the real domain (e.g. `https://ethanolblendslta.grains.org`).
- **GLOBAL_TOOL_URL** — the domain of the **Global** tool site (the target of the
  "Global" button, which points to the OTHER site). Builds `/en/global`.
  Defaults to `https://global.vision-it.com.mx`.

> Note: always use `config('links.xxx')` in the views, **not** `env('...')`
> directly. Because the pipeline runs `php artisan config:cache`, `env()`
> returns `null` at runtime once the config is cached. If a variable is not
> defined, the default value from `config/links.php` is used.
