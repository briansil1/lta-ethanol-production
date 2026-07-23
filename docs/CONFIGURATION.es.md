# Guía de configuración — Tool Regional (Ethanol)

> Objetivo: el mismo código corre en **cualquier dominio** (staging del proveedor,
> QA del cliente, producción del cliente) **sin cambios de código**. Todo lo que
> varía entre entornos vive en el archivo `.env`. **Nada está hardcodeado.**

## 1. Cómo funcionan los enlaces

La app solo construye dos tipos de URL por sí misma:

| Enlace | Cómo se construye | ¿Requiere config? |
|--------|-------------------|-------------------|
| Botones **America / Europe / Asia** | `route(__('routes.tools-continent'), N)` — Laravel los genera para el dominio **actual** | ❌ No |
| Botón **Global** | `config('links.global')` ← lee la variable `GLOBAL_TOOL_URL` | ✅ Sí (una variable) |

Los botones internos siguen automáticamente el dominio donde se sirve el sitio,
así que nunca apuntan al entorno equivocado. El **único** enlace entre-sitios es
el botón "Global", porque el tool Global puede vivir en otro dominio/path.

## 2. Variables de entorno

Definir estas en el `.env` de cada entorno (nunca subir valores reales; copiar
desde `.env.example`):

| Variable | Significado | Ejemplo |
|----------|-------------|---------|
| `APP_URL` | URL pública de **este** sitio. Laravel la usa para generar los enlaces internos. Debe coincidir con el dominio real. | `https://ethanolblendslta.grains.org` |
| `GLOBAL_TOOL_URL` | **URL completa** (dominio **y** path) del tool Global — destino del botón "Global". | `https://ethanolblendslta.grains.org/en/global` |

Tras editar `.env`, reconstruir el cache de config (el pipeline de deploy ya lo
hace):

```bash
php artisan config:cache
php artisan route:cache
```

## 3. Valores por entorno

| Entorno | `APP_URL` | `GLOBAL_TOOL_URL` |
|---------|-----------|-------------------|
| Proveedor (staging/demo) | `https://regional.vision-it.com.mx` | `https://global.vision-it.com.mx/en/static-home` |
| QA del cliente | `https://ethanolblendslta-dev.grains.org` | `https://ethanolblendslta-dev.grains.org/en/global` |
| Producción del cliente | `https://ethanolblendslta.grains.org` | `https://ethanolblendslta.grains.org/en/global` |

> Si `GLOBAL_TOOL_URL` se deja sin definir, se usa el default de
> `config/links.php` (`https://global.vision-it.com.mx/en/static-home`). **No** hay
> fallback hardcodeado que salte a otro dominio: si el valor está vacío, el botón
> "Global" no hace nada.

## 4. Importante — prerequisito de despliegue del lado del cliente

Para que el botón "Global" funcione en los dominios del cliente, el **tool Global
debe estar realmente accesible** en la URL configurada en `GLOBAL_TOOL_URL`.

Al momento de escribir esto, `https://ethanolblendslta.grains.org/en/global` y
`https://ethanolblendslta-dev.grains.org/en/global` devuelven **404**, porque el
tool Global **aún no está montado** bajo `/en/global` en esos dominios. Eso es una
tarea de despliegue/infraestructura del lado del cliente (desplegar la app del tool
Global para que ese path resuelva) e es **independiente de este repositorio**. Una
vez que ese path sirva el tool Global, poner `GLOBAL_TOOL_URL` apuntando ahí hace
que el botón funcione de punta a punta.

## 5. Checklist para validar un despliegue

1. Abrir `<APP_URL>/en/static-home` → carga el tool regional.
2. Iniciar sesión y abrir la vista `dynamic-tools`.
3. Clic en **America / Europe / Asia** → la URL se queda en el **mismo dominio**
   (`<APP_URL>/en/dynamic-tools-continent/1|2|3`), nunca `vision-it.com.mx`.
4. Clic en **Global** → va exactamente al valor de `GLOBAL_TOOL_URL`.
5. Confirmar que esa URL devuelve **200** (si da 404, el tool Global aún no está
   desplegado ahí — ver sección 4).
