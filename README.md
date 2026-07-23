# LTA Regional

**English** | [Español](README.es.md)

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

### Continent / Global buttons (works on every domain, nothing hardcoded)

The tool must work on any domain (our staging, the client's QA, the client's
production) **without editing code**. Two kinds of links exist:

- **Internal buttons — America / Europe / Asia.** They point to the continent
  view of **this same** tool. They are generated with
  `route(__('routes.tools-continent'), N)`, so Laravel builds them for the
  **current domain automatically**. No configuration needed — they just work on
  whatever domain the site is served from (as long as `APP_URL` matches it).

- **Cross-site button — Global.** It sends the user from the regional tool to the
  **Global** tool, which may live on a **different domain and/or path** depending
  on the environment. This is the **only** cross-site link, and its **full URL**
  is set in a single environment variable:

  - **GLOBAL_TOOL_URL** — full URL (domain + path) of the Global tool. Consumed
    via `config('links.global')`. Examples:
    - Provider (staging/demo): `https://global.vision-it.com.mx/en/static-home`
    - Client (same domain, by path): `https://ethanolblendslta.grains.org/en/global`

> There is **no hardcoded fallback** anywhere. If `GLOBAL_TOOL_URL` is not set,
> the default in `config/links.php` (the provider's staging URL) is used, and the
> "Global" button simply does nothing if the value is empty — it never jumps to a
> foreign domain by surprise.

> Note: the value is read via `config('links.global')`, **not** `env('...')`
> directly in Blade. Because the pipeline runs `php artisan config:cache`,
> `env()` returns `null` at runtime once the config is cached.

> **Client action required:** the Global tool must actually be reachable at the
> URL you put in `GLOBAL_TOOL_URL`. Today `…grains.org/en/global` returns 404
> because the Global tool is not mounted there yet — that is a deployment step on
> the client side, independent of this code.

See `docs/CONFIGURATION.en.md` (English) / `docs/CONFIGURATION.es.md` (Spanish)
for the full per-environment configuration guide.
