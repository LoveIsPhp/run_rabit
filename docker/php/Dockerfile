FROM yiisoftware/yii2-php:8.1-apache

RUN apt-get update && apt-get install -y libz-dev libmemcached-dev && \
    apt-get install -y memcached libmemcached-tools && \
    pecl install memcached && \
    docker-php-ext-enable memcached
RUN docker-php-ext-install -j$(nproc)  sockets pdo
RUN pecl channel-update pecl.php.net && \
    pecl install xdebug && \
    docker-php-ext-enable xdebug
WORKDIR /app