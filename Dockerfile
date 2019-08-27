FROM php:7.2-apache

WORKDIR /var/www
RUN apt-get update && apt-get install -y curl libicu-dev git graphviz

RUN apt-get update && apt-get install -y \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libmcrypt-dev \
    libpng-dev \
    libmemcached-dev \
    memcached \
    zlib1g-dev \
    libltdl7 \
    libltdl-dev \
    libpq-dev \
    libsqlite3-dev \
    git \
    curl \
    libcurl3-dev \
    rsyslog \
    cron \
    supervisor \
    unzip \
    libicu-dev \
    libxml2-dev \
    --no-install-recommends \
    && docker-php-ext-install -j$(nproc) iconv pdo_mysql pdo_pgsql pdo_sqlite zip curl\
    && docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ \
    && docker-php-ext-install -j$(nproc) gd \
    && docker-php-ext-install soap

# Install memcache extension
RUN set -x \
    && apt-get update && apt-get install -y --no-install-recommends unzip libssl-dev libpcre3 libpcre3-dev \
    && cd /tmp \
    && curl -sSL -o php7.zip https://github.com/websupport-sk/pecl-memcache/archive/php7.zip \
    && unzip php7 \
    && cd pecl-memcache-php7 \
    && /usr/local/bin/phpize \
    && ./configure --with-php-config=/usr/local/bin/php-config \
    && make \
    && make install \
    && echo "extension=memcache.so" > /usr/local/etc/php/conf.d/ext-memcache.ini \
    && rm -rf /tmp/pecl-memcache-php7 php7.zip


RUN docker-php-ext-configure opcache
RUN docker-php-ext-install opcache
RUN docker-php-ext-enable opcache

RUN docker-php-ext-configure intl
RUN docker-php-ext-install intl
RUN docker-php-ext-enable intl

RUN a2enmod headers rewrite

# install php composer
RUN curl -sS https://getcomposer.org/installer | php
RUN mv composer.phar /usr/local/bin/composer

#copy source files into docker container
COPY . /var/www

RUN chown -R www-data:www-data /var/www
RUN chmod 755 /var/www
RUN usermod -u 1000 www-data

EXPOSE 80 9000

