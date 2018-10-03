FROM php:7.2-apache

COPY . /src/erp
COPY .docker/vhost.conf /etc/apache2/sites-available/000-default.conf

RUN docker-php-ext-install mbstring pdo pdo_mysql mysqli

RUN chown -R www-data:www-data /src/erp \
    && a2enmod rewrite

