FROM php:7.2-apache

COPY . /src/erp
COPY .docker/vhost.conf /etc/apache2/sites-available/000-default.conf

RUN docker-php-ext-install mbstring pdo pdo_mysql mysqli

RUN yes | pecl install xdebug \
    && echo "zend_extension=$(find /usr/local/lib/php/extensions/ -name xdebug.so)" > /usr/local/etc/php/conf.d/xdebug.ini \
    && echo "xdebug.remote_enable=1" >> /usr/local/etc/php/conf.d/xdebug.ini \
    && echo "xdebug.remote_connect_back=1" >> /usr/local/etc/php/conf.d/xdebug.ini \
    && echo "xdebug.remote_port=9000" >> /usr/local/etc/php/conf.d/xdebug.ini

RUN chown -R www-data:www-data /src \
    && a2enmod rewrite

