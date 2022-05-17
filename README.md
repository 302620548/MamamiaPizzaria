#README

## New computer setup
1. `composer install`
2. Setup database `php ./bin/console doctrine:database:create` (creates the empty database) uses the `.env` file.
3. Create tables in the database with migrations `php ./bin/console doctrine:migrations:migrate`

## Create new entity
