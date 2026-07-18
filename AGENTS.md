# Sukarix Application — Agent Guidelines

## Project

Skeleton application for the Sukarix PHP framework. Demonstrates routing,
sessions, models, and the Statera test suite.

## Tech stack

- **PHP 8.2+**, strict types
- **Sukarix framework** (`sukarix/sukarix: dev-main`)
- **Statera** (`sukarix/statera: dev-main`) — testing kit, NOT PHPUnit
- **Phinx** — database migrations
- **PostgreSQL 17**, **Redis**

## Testing

- Tests use **Statera**, never PHPUnit.
- Run tests: `php tools/statera.php`
- Test structure: `tests/src/Core/*` (scenarios), `tests/src/Suite/*` (groups), `tests/src/Test/*` (base classes).
- Register groups in `tests/src/Core/Statera.php`.

## Code style

- Follow existing PSR-12 conventions.
- Configuration via F3 `.ini` files in `app/config/`.
- Actions extend `Sukarix\Actions\WebAction` or `Sukarix\Actions\Action`.

## Commits

- One logical change per commit (unitary commits).
- Author: Ghazi Triki <ghazi.triki@riadvice.com>
- Co-author trailer:
  ```
  Co-Authored-By: Devin <158243242+devin-ai-integration[bot]@users.noreply.github.com>
  ```
- Format:
  ```
  <short description>

  Generated with [Devin](https://devin.ai)

  Co-Authored-By: Devin <158243242+devin-ai-integration[bot]@users.noreply.github.com>
  ```
