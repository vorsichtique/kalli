dev: composer
	docker-compose up

prod:
	docker-compose run -e APP_ENV=prod app composer install --no-dev --optimize-autoloader
	docker-compose -e APP_ENV=prod up --build

test:
	docker-compose run app sh -c "APP_ENV='test' && DATABASE_URL=sqlite:///%kernel.project_dir%/var/test.db && php bin/console doctrine:schema:update --force && ./vendor/bin/simple-phpunit"

composer:
	docker-compose run app composer install

migrate:
	docker-compose run app php bin/console doctrine:migrations:migrate

fixtures:
	docker-compose run app php bin/console doctrine:fixtures:load

db:
	docker-compose run app sqlite3 var/data.db

app:
	docker-compose run app sh

encore:
	docker-compose run node yarn run encore dev

watch:
	docker-compose run node yarn run encore dev --watch

yarn:
	docker-compose run node yarn install

node:
	docker-compose run node bash