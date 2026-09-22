FROM php:8.3-fpm-alpine

ARG USER_ID=1000
ARG GROUP_ID=1000

RUN apk add --no-cache \
        acl \
        bash \
        git \
        libpq-dev \
        libxml2-dev \
        libzip-dev \
        sqlite-dev \
        zip \
    && docker-php-ext-install \
        pdo \
        pdo_sqlite \
        zip \
        opcache

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
COPY --link \
    --from=ghcr.io/symfony-cli/symfony-cli:latest \
    /usr/local/bin/symfony /usr/local/bin/symfony

# Install runtime and build dependencies for intl
RUN apk add --no-cache icu-dev \
    && docker-php-ext-configure intl \
    && docker-php-ext-install intl \
    && docker-php-ext-enable intl


RUN apk add --no-cache shadow && usermod -u ${USER_ID} www-data && groupmod -g ${GROUP_ID} www-data
RUN apk add --no-cache bash

WORKDIR /var/www

RUN chown -R www-data:www-data /var/www

RUN mkdir -p var/data && chown -R www-data:www-data /var/www

USER www-data