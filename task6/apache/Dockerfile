FROM php:8.0-apache
WORKDIR /var/www/html/
RUN docker-php-ext-install mysqli
RUN pecl install redis
RUN docker-php-ext-enable redis
RUN a2enmod authn_dbd && apt-get update && apt-get install -y libaprutil1-dbd-mysql
COPY vendor /var/www/vendor
RUN apt-get update && apt-get install -y \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libpng-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) gd