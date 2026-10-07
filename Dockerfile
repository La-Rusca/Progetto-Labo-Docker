FROM php:8.4-apache AS app

RUN docker-php-ext-install pdo pdo_mysql

WORKDIR /var/www/html

COPY app/ /var/www/html/

EXPOSE 80

FROM mysql:8.4 AS db

COPY database/database.sql /docker-entrypoint-initdb.d/database.sql