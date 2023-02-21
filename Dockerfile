FROM php:7.4-cli

RUN \
    apt-get update &&\
    apt-get -y install git nano

RUN touch /test.php

WORKDIR /code
