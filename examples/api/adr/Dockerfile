ARG PHP_VERSION=8.1

FROM php:${PHP_VERSION}-cli

RUN apt-get update -q && \
    apt-get install -qy software-properties-common && \
    export LC_ALL=en_US.UTF-8 && \
    export LANG=en_US.UTF-8 && \
    apt-get update -q && \
    apt-get install --no-install-recommends -qy \
        git \
        libicu-dev \
        libzip-dev \
        libpng-dev \
        libpq-dev \
        libonig-dev \
        unzip

ENV APCU_VERSION 5.1.18
RUN docker-php-ext-install \
        gd \
        iconv \
        intl \
        mbstring \
        opcache \
        pdo_pgsql \
        zip && \
    pecl install \
        apcu-${APCU_VERSION} &&\
	docker-php-ext-enable --ini-name 20-apc.ini apcu && \
    rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*

RUN ln -s $PHP_INI_DIR/php.ini-production $PHP_INI_DIR/php.ini
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html
CMD ["php"]

ENV COMPOSER_ALLOW_SUPERUSER 1
RUN composer global require "symfony/flex" --prefer-dist --no-progress --no-suggest --classmap-authoritative; \
    composer clear-cache

ENV PANTHER_NO_SANDBOX 1
ENV PANTHER_CHROME_ARGUMENTS='--disable-dev-shm-usage'
RUN apt-get update -q && \
    export LC_ALL=en_US.UTF-8 && \
    export LANG=en_US.UTF-8 && \
    apt-get install --no-install-recommends -qy \
        chromium \
        chromium-driver

ADD . .
RUN mkdir -p var/cache var/logs var/sessions \
    && composer install --prefer-dist --no-dev --no-scripts --no-progress --no-suggest --classmap-authoritative --no-interaction \
    && composer clear-cache \
    && chown -R www-data var
