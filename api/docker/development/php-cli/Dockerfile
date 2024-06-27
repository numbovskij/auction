FROM php:8.3-cli-alpine

# Установка необходимых пакетов и Xdebug
RUN apk add --no-cache autoconf g++ make linux-headers \
    && pecl install xdebug \
    && rm -rf /tmp/pear \
    && docker-php-ext-enable xdebug

RUN apk add --no-cache unzip

# Перемещение файла конфигурации PHP для среды разработки
RUN mv "$PHP_INI_DIR/php.ini-development" "$PHP_INI_DIR/php.ini"

# Копирование конфигураций PHP
COPY ./common/php/conf.d /usr/local/etc/php/conf.d
COPY ./development/php/conf.d /usr/local/etc/php/conf.d

# Установка переменной окружения для Composer
ENV COMPOSER_ALLOW_SUPERUSER=1

# Установка Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer --quiet

# Установка рабочей директории
WORKDIR /app
