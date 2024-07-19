#пересобирает проект с нуля
init: docker-down-clear docker-pull docker-build docker-up api-init

up: docker-up
down: docker-down
restart: up down
check: lint analyze test
lint: api-lint
analyze: api-analyze
test: api-test
test-unit: api-test-unit
test-functional: api-test-functional

docker-up:
	docker compose up -d

docker-down:
	docker compose down --remove-orphans

docker-pull:
	docker compose pull

docker-build:
	docker compose build

api-init: api-composer-install

api-composer-install:
	docker compose run --rm api-php-cli composer install

docker-down-clear:
	docker compose down -v --remove-orphans

api-lint:
	docker compose run --rm api-php-cli composer lint
	docker compose run --rm api-php-cli composer cs-check

api-analyze:
	docker compose run --rm api-php-cli composer psalm

api-test:
	docker compose run --rm api-php-cli composer test
api-test-unit:
	docker compose run --rm api-php-cli composer test -- --testsuite=unit
api-test-functional:
	docker compose run --rm api-php-cli composer test -- --testsuite=functional