FROM php:8.0-apache
WORKDIR /var/www/html/
RUN docker-php-ext-install mysqli
RUN pecl install redis
RUN docker-php-ext-enable redis
RUN a2enmod authn_dbd && apt-get update && apt-get install -y libaprutil1-dbd-mysql

