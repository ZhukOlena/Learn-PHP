FROM php:7.4-fpm

RUN \
    apt-get update &&\
    apt-get -y install git nano telnet

RUN docker-php-ext-install pdo_mysql

WORKDIR /code
