FROM php:7.4.1-apache-buster

LABEL maintainer="Aleksa Sukovic"

RUN mv "$PHP_INI_DIR/php.ini-development" "$PHP_INI_DIR/php.ini"

RUN docker-php-ext-install mysqli

COPY ./src /var/www/html/
