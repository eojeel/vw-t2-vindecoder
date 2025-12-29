Project development guidelines (VW T2 VIN Decoder)

Audience: Advanced Laravel developers contributing to this repository.

1) Build and configuration
- Runtime versions
  - PHP 8.3.x (project enforces 8.3 in composer.json). Enable required extensions: PDO (mysql, sqlite), openssl, mbstring, tokenizer, xml, ctype, json, fileinfo.
  - Node 18+ (or 20+) with npm for Vite/Tailwind build.
  - Composer 2.x.

- Environment setup
  - Composer install: composer install
  - Application key: php artisan key:generate (done automatically on first install by composer script if .env does not exist)
  - Assets
    - Dev server: npm install && npm run dev (vite)
    - Production build: npm run build
  - Database connections
    - Default DB connection is env-driven (config/database.php, default "mysql"). Project ships with:
      - mysql (preferred for prod); uses AZURE_MYSQL_* env names:
        - AZURE_MYSQL_HOST, AZURE_MYSQL_PORT, AZURE_MYSQL_DBNAME, AZURE_MYSQL_USERNAME, AZURE_MYSQL_PASSWORD
      - sqlite (useful for local quick start)
      - pgsql, sqlsrv (standard)
      - turso (libsql via richan-fongdasen/turso-laravel). Env:
        - DB_URL (e.g. libsql://<db>.turso.io or http://localhost:8080 when using local libsql)
        - DB_ACCESS_TOKEN, DB_REPLICA (optional), DB_PREFIX, DB_FOREIGN_KEYS, DB_STICKY
    - For local development you can either:
      - Use sqlite: set DB_CONNECTION=sqlite and DB_DATABASE="database/database.sqlite" (create the file if it does not exist).
      - Use MySQL: set the AZURE_MYSQL_* values accordingly.
      - Use Turso/libsql: set DB_CONNECTION=turso and provide DB_URL/DB_ACCESS_TOKEN.
  - Migrations and seeders
    - php artisan migrate --seed
    - Seeds are expected by tests; tests call $this->seed() in tests/Pest.php before each test.

- Docker / Sail
  - laravel/sail is included as a dev dependency; you may use Sail if preferred. Not strictly required; standard local PHP/DB works fine.

- Frontend stack specifics
  - Vite 4.x, Tailwind 3.x (+ @tailwindcss/forms), Flowbite is included. Livewire v3 and WireUI v2 are used; ensure Vite is running for interactive components.

2) Testing
- Framework
  - Pest 2.x is configured (see tests/Pest.php). PHPUnit 10.x is also available. phpunit.xml is present and configures an in-memory sqlite database for tests (DB_DATABASE=:memory:, CACHE/SESSION array drivers, QUEUE sync). This means tests do not require an external DB.
  - Livewire plugin for Pest is included (pestphp/pest-plugin-livewire), so you can write Livewire component tests idiomatically.

- Running tests
  - Composer dev dependencies must be installed: composer install
  - Run all tests with Pest: vendor/bin/pest
  - Or run with phpunit: vendor/bin/phpunit
  - Filter examples:
    - vendor/bin/pest --group=vin
    - vendor/bin/pest tests/Feature/VinDecoderTest.php

- Writing tests
  - Use Pest test style (recommended). tests/Pest.php already binds Tests\TestCase and RefreshDatabase and calls $this->seed() before each test.
  - Unit tests go under tests/Unit; feature tests under tests/Feature. The test case has Illuminate\Foundation\Testing\RefreshDatabase available, so ensure your migrations cover the schema used by the test.
  - Livewire component testing tips (using pest-plugin-livewire):
    - Example:
      it('shows results for a known VIN', function () {
          livewire(\App\Livewire\VinForm::class)
              ->set('vin', '1234567890')
              ->call('submit')
              ->assertSee('M-Code');
      });
    - For the above to pass, ensure the seeders create consistent fixtures or mock the lookup accordingly.

- Minimal smoke test (example you can add locally)
  - Create tests/Unit/SmokeTest.php with:
    <?php
    it('works', function () {
        expect(true)->toBeTrue();
    });
  - Run: vendor/bin/pest
  - Remove the file after verifying the workflow to keep the repo clean.

3) Code style and quality
- Code style: Use Laravel Pint (laravel/pint) for PHP. Run: vendor/bin/pint
- Static analysis: Not enforced in CI here; feel free to use phpstan locally if desired.
- Naming/conventions:
  - Livewire components are under app/Livewire; corresponding Blade views under resources/views/livewire.
  - Custom pagination templates exist under resources/views/livewire/vin-pagination.blade.php and resources/views/vin-pagination.blade.php; ensure to use the correct view when customizing pagination for Livewire vs. non-Livewire lists.
  - Layout: resources/views/components/layouts/app.blade.php is the main layout wrapper; integrates Vite assets.

4) Domain/model notes (VIN decoder)
- The application decodes vintage VW Type 2 VIN/M-code plates. Relevant tables include colors, mcodes, paint_codes, interior_codes, export_destinations, vins, and mapping tables for model/engine/gearbox codes. Review database/migrations for column details.
- Seeding is important: the app and tests assume seed data for codes and lookups.
- Livewire components of interest:
  - app/Livewire/VinForm.php and app/Livewire/Forms/VinSubmitForm.php handle VIN input and submission.
  - Views: resources/views/livewire/vin-form.blade.php, results-mcode.blade.php, results-string.blade.php, vin-list.blade.php.

5) Environment variables (non-standard specifics)
- MySQL uses AZURE_* names (see config/database.php):
  - AZURE_MYSQL_HOST, AZURE_MYSQL_PORT, AZURE_MYSQL_DBNAME, AZURE_MYSQL_USERNAME, AZURE_MYSQL_PASSWORD
- Turso/libsql driver (richan-fongdasen/turso-laravel):
  - DB_CONNECTION=turso, DB_URL, DB_ACCESS_TOKEN, DB_REPLICA (optional)
- Queues/sessions are local defaults; tests force sync/array. For production, set appropriate drivers.

6) Running locally (quick start)
- cp .env.example .env
- For sqlite local dev:
  - touch database/database.sqlite
  - Set in .env: DB_CONNECTION=sqlite and DB_DATABASE="database/database.sqlite"
  - php artisan migrate --seed
- Start server and assets:
  - php artisan serve
  - npm run dev

7) Debugging tips
- Enable Laravel Debugbar in local (installed as dev dependency). In .env: APP_DEBUG=true. Debugbar auto-enables in local env.
- When debugging Livewire:
  - Ensure Vite dev server is connected; stale assets can cause non-updating components.
  - Use ->dd() or assert* methods in Livewire test components.
- Database selection
  - If using Turso in dev and you see connection issues, try switching to sqlite for quick iteration; the code is portable across these drivers.

8) Release/build
- Build assets: npm run build
- Clear/optimize (optional):
  - php artisan config:cache && php artisan route:cache

Notes about this document
- Test examples are based on the current configuration (phpunit.xml uses in-memory sqlite for tests). They should run as-is after composer install. Create the smoke test locally if you want to validate the runner; remove it when done.

Project development guidelines (VW T2 VIN Decoder)

Audience: Advanced Laravel developers contributing to this repository.

1) Build and configuration
- Runtime versions
  - PHP 8.3.x (project enforces 8.3 in composer.json). Enable required extensions: PDO (mysql, sqlite), openssl, mbstring, tokenizer, xml, ctype, json, fileinfo.
  - Node 18+ (or 20+) with npm for Vite/Tailwind build.
  - Composer 2.x.

- Environment setup
  - Composer install: composer install
  - Application key: php artisan key:generate (done automatically on first install by composer script if .env does not exist)
  - Assets
    - Dev server: npm install && npm run dev (vite)
    - Production build: npm run build
  - Database connections
    - Default DB connection is env-driven (config/database.php, default "mysql"). Project ships with:
      - mysql (preferred for prod); uses AZURE_MYSQL_* env names:
        - AZURE_MYSQL_HOST, AZURE_MYSQL_PORT, AZURE_MYSQL_DBNAME, AZURE_MYSQL_USERNAME, AZURE_MYSQL_PASSWORD
      - sqlite (useful for local quick start)
      - pgsql, sqlsrv (standard)
      - turso (libsql via richan-fongdasen/turso-laravel). Env:
        - DB_URL (e.g. libsql://<db>.turso.io or http://localhost:8080 when using local libsql)
        - DB_ACCESS_TOKEN, DB_REPLICA (optional), DB_PREFIX, DB_FOREIGN_KEYS, DB_STICKY
    - For local development you can either:
      - Use sqlite: set DB_CONNECTION=sqlite and DB_DATABASE="database/database.sqlite" (create the file if it does not exist).
      - Use MySQL: set the AZURE_MYSQL_* values accordingly.
      - Use Turso/libsql: set DB_CONNECTION=turso and provide DB_URL/DB_ACCESS_TOKEN.
  - Migrations and seeders
    - php artisan migrate --seed
    - Seeds are expected by tests; tests call $this->seed() in tests/Pest.php before each test.

- Docker / Sail
  - laravel/sail is included as a dev dependency; you may use Sail if preferred. Not strictly required; standard local PHP/DB works fine.

- Frontend stack specifics
  - Vite 4.x, Tailwind 3.x (+ @tailwindcss/forms), Flowbite is included. Livewire v3 and WireUI v2 are used; ensure Vite is running for interactive components.

2) Testing
- Framework
  - Pest 2.x is configured (see tests/Pest.php). PHPUnit 10.x is also available. phpunit.xml is present and configures an in-memory sqlite database for tests (DB_DATABASE=:memory:, CACHE/SESSION array drivers, QUEUE sync). This means tests do not require an external DB.
  - Livewire plugin for Pest is included (pestphp/pest-plugin-livewire), so you can write Livewire component tests idiomatically.

- Running tests
  - Composer dev dependencies must be installed: composer install
  - Run all tests with Pest: vendor/bin/pest or composer test
  - Or run with phpunit: vendor/bin/phpunit
  - Filter examples:
    - vendor/bin/pest --group=vin
    - vendor/bin/pest tests/Feature/VinDecoderTest.php

- Writing tests
  - Use Pest test style (recommended). tests/Pest.php already binds Tests\TestCase and RefreshDatabase and calls $this->seed() before each test.
  - Unit tests go under tests/Unit; feature tests under tests/Feature. The test case has Illuminate\Foundation\Testing\RefreshDatabase available, so ensure your migrations cover the schema used by the test.
  - Livewire component testing tips (using pest-plugin-livewire):
    - Example:
      it('shows results for a known VIN', function () {
          livewire(\App\Livewire\VinForm::class)
              ->set('vin', '1234567890')
              ->call('submit')
              ->assertSee('M-Code');
      });
    - For the above to pass, ensure the seeders create consistent fixtures or mock the lookup accordingly.

- Minimal smoke test (example you can add locally)
  - Create tests/Unit/SmokeTest.php with:
    <?php
    it('works', function () {
        expect(true)->toBeTrue();
    });
  - Run: vendor/bin/pest
  - Remove the file after verifying the workflow to keep the repo clean.

3) Code style and quality
- Code style: Use Laravel Pint (laravel/pint) for PHP. Run: vendor/bin/pint or composer format; check only: composer lint
- Static analysis: Not enforced in CI here; feel free to use phpstan locally if desired.
- Naming/conventions:
  - Livewire components are under app/Livewire; corresponding Blade views under resources/views/livewire.
  - Custom pagination templates exist under resources/views/livewire/vin-pagination.blade.php and resources/views/vin-pagination.blade.php; ensure to use the correct view when customizing pagination for Livewire vs. non-Livewire lists.
  - Layout: resources/views/components/layouts/app.blade.php is the main layout wrapper; integrates Vite assets.

4) Domain/model notes (VIN decoder)
- The application decodes vintage VW Type 2 VIN/M-code plates. Relevant tables include colors, mcodes, paint_codes, interior_codes, export_destinations, vins, and mapping tables for model/engine/gearbox codes. Review database/migrations for column details.
- Seeding is important: the app and tests assume seed data for codes and lookups.
- Livewire components of interest:
  - app/Livewire/VinForm.php and app/Livewire/Forms/VinSubmitForm.php handle VIN input and submission.
  - Views: resources/views/livewire/vin-form.blade.php, results-mcode.blade.php, results-string.blade.php, vin-list.blade.php.

5) Environment variables (non-standard specifics)
- MySQL uses AZURE_* names (see config/database.php):
  - AZURE_MYSQL_HOST, AZURE_MYSQL_PORT, AZURE_MYSQL_DBNAME, AZURE_MYSQL_USERNAME, AZURE_MYSQL_PASSWORD
- Turso/libsql driver (richan-fongdasen/turso-laravel):
  - DB_CONNECTION=turso, DB_URL, DB_ACCESS_TOKEN, DB_REPLICA (optional)
- Queues/sessions are local defaults; tests force sync/array. For production, set appropriate drivers.

6) Running locally (quick start)
- cp .env.example .env
- For sqlite local dev:
  - touch database/database.sqlite
  - Set in .env: DB_CONNECTION=sqlite and DB_DATABASE="database/database.sqlite"
  - php artisan migrate --seed
- Start server and assets:
  - php artisan serve
  - npm run dev

7) Debugging tips
- Enable Laravel Debugbar in local (installed as dev dependency). In .env: APP_DEBUG=true. Debugbar auto-enables in local env.
- When debugging Livewire:
  - Ensure Vite dev server is connected; stale assets can cause non-updating components.
  - Use ->dd() or assert* methods in Livewire test components.
- Database selection
  - If using Turso in dev and you see connection issues, try switching to sqlite for quick iteration; the code is portable across these drivers.

8) Release/build
- Build assets: npm run build
- Clear/optimize (optional):
  - php artisan config:cache && php artisan route:cache

9) Tooling scripts added (Composer)
- composer test — runs Pest test suite
- composer pest — alias for Pest
- composer lint — checks code style with Pint (no changes)
- composer format — formats code with Pint

Notes about this document
- Test examples are based on the current configuration (phpunit.xml uses in-memory sqlite for tests). They should run as-is after composer install. Create the smoke test locally if you want to validate the runner; remove it when done.


Upgrade notes
- Framework version: Laravel 12.x. Ensure your local PHP is 8.3+ as enforced by composer.json.
- Dev tooling scripts remain the same (composer test, pest, lint, format). If you upgrade global PHPUnit, ensure it's compatible with PHPUnit 11 used by this repo's dev dependencies.
