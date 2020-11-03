.PHONY: build run restart

build: build-logos build-php

build-logos:
	docker-compose build logos

build-php:
	docker-compose build php

rebuild:
	docker-compose build --no-cache logos

run:
	docker-compose up -d

stop:
	docker-compose down

logs:
	docker-compose logs -f
