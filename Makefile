.DEFAULT_GOAL := all

all: install lint test

install:
	@pnpm install && composer install

lint:
	@pnpm run lint && composer run lint

format:
	@pnpm run format && composer run format

test:
	@composer run test

help_ide:
	@rm -rf ./wordpress/ && curl https://wordpress.org/latest.zip -O && unzip -q latest.zip && rm latest.zip

wordpress:
	@docker compose down --volumes --rmi local \
		&& docker compose up --detach \
		&& sleep 20 \
		&& docker exec -it --user www-data "extremity_web" /app/docker-setup-wordpress.sh \
		&& echo "visit http://localhost:8080"
