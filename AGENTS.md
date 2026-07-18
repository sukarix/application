# Sukarix Application

Skeleton application for the Sukarix PHP framework.
MIT licensed. Contributions welcome.

## Quick start

```bash
composer install
php tools/statera.php        # run tests
```

## Tech stack

- PHP 8.2+, strict types
- Sukarix framework (`sukarix/sukarix: dev-main`)
- Statera (`sukarix/statera: dev-main`) — testing kit, not PHPUnit
- Phinx — database migrations
- PostgreSQL, Redis

## Project structure

- `app/src/Actions/` — controller actions (WebAction, Action)
- `app/config/` — F3 `.ini` configuration files
- `app/templates/` — `.phtml` view templates
- `app/i18n/` — translation dictionaries
- `db/migrations/` — Phinx migration files
- `tests/src/` — Statera test scenarios and suites
- `tools/statera.php` — test runner

## Testing

Tests use **Statera**, never PHPUnit. Structure:
- `tests/src/Core/` — test scenarios
- `tests/src/Suite/` — test groups
- `tests/src/Test/` — base test classes

Register groups in `tests/src/Core/Statera.php`. Run: `php tools/statera.php`.

## Conventions

- `declare(strict_types=1)` in every file
- Configuration via F3 `.ini` files in `app/config/`
- Actions extend `Sukarix\Actions\WebAction` or `Sukarix\Actions\Action`
- Migrations via Phinx: `vendor/bin/phinx create <Name>` / `vendor/bin/phinx migrate`

## AI usage

This project is developed with AI assistance (Devin, GitHub Copilot, and others).
AI-generated contributions are welcome and should follow the same conventions as human contributions.

## Commits

One logical change per commit.

```
<description>

Co-Authored-By: Devin
```
