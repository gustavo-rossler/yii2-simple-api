FROM php:7.1-fpm

RUN apt-get update && apt-get install -y libmcrypt-dev \
    default-mysql-client libmagickwand-dev --no-install-recommends \
    && pecl install imagick \
    && docker-php-ext-enable imagick \
    && docker-php-ext-install mcrypt pdo_mysql

RUN docker-php-ext-install zip

RUN mkdir -p /var/www/html

WORKDIR /var/www/html

# INSTALL AND UPDATE COMPOSER
COPY --from=composer:1.10 /usr/bin/composer /usr/bin/composer

COPY ./src/ .

# INSTALL YOUR DEPENDENCIES
RUN composer install
