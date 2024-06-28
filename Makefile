#пересобирает проект с нуля
init: docker-down-clear docker-pull docker-build docker-up api-init

up: docker-up
down: docker-down
restart: up down
lint: api-lint

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