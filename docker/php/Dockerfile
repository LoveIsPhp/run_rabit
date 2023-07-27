FROM yiisoftware/yii2-php:8.1-apache

RUN apt-get update && apt-get install -y libz-dev libmemcached-dev
RUN docker-php-ext-install -j$(nproc)  sockets pdo
RUN pecl channel-update pecl.php.net && \
    docker-php-ext-enable xdebug
WORKDIR /app