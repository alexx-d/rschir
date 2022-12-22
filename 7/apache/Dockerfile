FROM php:8.0-apache
RUN apt-get update \
    && docker-php-ext-install mysqli \
    && docker-php-ext-enable mysqli \
    && docker-php-ext-install pdo_mysql \
    && docker-php-ext-enable pdo_mysql