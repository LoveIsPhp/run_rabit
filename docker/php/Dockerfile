FROM yiisoftware/yii2-php:8.1-apache

RUN apt-get update && apt-get install -y libpq-dev
RUN docker-php-ext-install -j$(nproc)  sockets pgsql pdo pdo_pgsql
RUN pecl channel-update pecl.php.net && \
    pecl install xdebug && \
    docker-php-ext-enable xdebug
WORKDIR /app