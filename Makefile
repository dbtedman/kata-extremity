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
