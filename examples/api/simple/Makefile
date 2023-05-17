.DEFAULT_GOAL := help
DOCKER?=docker
DOCKER_COMPOSE?=docker-compose
EXEC_PHP?=$(DOCKER_COMPOSE) exec php

##
## Project setup
##---------------------------------------------------------------------------
.PHONY: install up start stop reset clear

install: build start ## Install and start the project with vendors update

up: ## Start the project without vendors update
	$(DOCKER_COMPOSE) up --remove-orphans

start: up vendor ## Start the project with vendors update

stop: ## Do nothing
	$(DOCKER_COMPOSE) kill
	$(DOCKER_COMPOSE) rm -v --force

reset: clear build ## Stop clear and install

clear: stop ## clear project
	rm docker-dev.lock

##
## Dependencies
##---------------------------------------------------------------------------
.PHONY: rm-docker-dev.lock

build: docker-dev.lock

docker-dev.lock:
	$(DOCKER_COMPOSE) pull --ignore-pull-failures
	$(DOCKER_COMPOSE) build --force-rm --pull
	touch docker-dev.lock

rm-docker-dev.lock:
	rm -f docker-dev.lock

vendor: composer.lock
	$(EXEC_PHP) composer install

composer.lock: composer.json
	@echo PHP vendors are not up to date.

##
## Utilities
##---------------------------------------------------------------------------
.PHONY: help

help:
	@grep -E '(^[a-zA-Z_-]+:.*?##.*$$)|(^##)' $(MAKEFILE_LIST) | awk 'BEGIN {FS = ":.*?## "}; {printf "\033[32m%-30s\033[0m %s\n", $$1, $$2}' | sed -e 's/\[32m##/[33m/'

-include Makefile.local
