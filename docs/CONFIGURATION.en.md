# Configuration guide — Regional (Ethanol) tool

> Goal: the same codebase runs on **any domain** (provider staging, client QA,
> client production) **with zero code changes**. Everything that varies between
> environments lives in the `.env` file. **Nothing is hardcoded.**

## 1. How links work

There are only two kinds of URLs the app builds by itself:

| Link | How it is built | Needs config? |
|------|-----------------|---------------|
| **America / Europe / Asia** buttons | `route(__('routes.tools-continent'), N)` — Laravel generates them for the **current** domain | ❌ No |
| **Global** button | `config('links.global')` ← reads env var `GLOBAL_TOOL_URL` | ✅ Yes (one variable) |

The internal buttons follow the domain the site is served from automatically, so
they never point to the wrong environment. The **only** cross-site link is the
"Global" button, because the Global tool may live on a different domain/path.

## 2. Environment variables

Set these in each environment's `.env` (never commit real values; copy from
`.env.example`):

| Variable | Meaning | Example |
|----------|---------|---------|
| `APP_URL` | Public URL of **this** site. Laravel uses it to generate internal links. Must match the real domain. | `https://ethanolblendslta.grains.org` |
| `GLOBAL_TOOL_URL` | **Full URL** (domain **and** path) of the Global tool — the target of the "Global" button. | `https://ethanolblendslta.grains.org/en/global` |

After editing `.env`, rebuild the config cache (the deploy pipeline already does
this):

```bash
php artisan config:cache
php artisan route:cache
```

## 3. Values per environment

| Environment | `APP_URL` | `GLOBAL_TOOL_URL` |
|-------------|-----------|-------------------|
| Provider (staging/demo) | `https://regional.vision-it.com.mx` | `https://global.vision-it.com.mx/en/static-home` |
| Client QA | `https://ethanolblendslta-dev.grains.org` | `https://ethanolblendslta-dev.grains.org/en/global` |
| Client production | `https://ethanolblendslta.grains.org` | `https://ethanolblendslta.grains.org/en/global` |

> If `GLOBAL_TOOL_URL` is left unset, the default in `config/links.php`
> (`https://global.vision-it.com.mx/en/static-home`) is used. There is **no**
> hardcoded fallback that jumps to another domain: if the value is empty, the
> "Global" button does nothing.

## 4. Important — client-side deployment prerequisite

For the "Global" button to work on the client's domains, the **Global tool must
actually be reachable** at the URL configured in `GLOBAL_TOOL_URL`.

At the time of writing, `https://ethanolblendslta.grains.org/en/global` and
`https://ethanolblendslta-dev.grains.org/en/global` both return **404**, because
the Global tool has **not been mounted** under `/en/global` on those domains yet.
This is a deployment/infrastructure task on the client side (deploy the Global
tool app so that path resolves) and is **independent of this repository**. Once
that path serves the Global tool, setting `GLOBAL_TOOL_URL` to it makes the
button work end to end.

## 5. Checklist to validate a deployment

1. Open `<APP_URL>/en/static-home` → the regional tool loads.
2. Log in and open the `dynamic-tools` view.
3. Click **America / Europe / Asia** → the URL stays on the **same domain**
   (`<APP_URL>/en/dynamic-tools-continent/1|2|3`), never `vision-it.com.mx`.
4. Click **Global** → it goes to exactly the value of `GLOBAL_TOOL_URL`.
5. Confirm that URL returns **200** (if it 404s, the Global tool is not deployed
   there yet — see section 4).
