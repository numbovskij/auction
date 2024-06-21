init: docker-down-clear pull build up
restart: up down

up:
	docker compose up -d

down:
	docker compose down --remove-orphans

build:
	docker compose build

pull:
	docker compose pull

docker-down-clear:
	docker compose down -v --remove-orphans
