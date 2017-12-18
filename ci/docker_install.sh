#!/usr/bin/env bash

# We need to install dependencies only for Docker
[[ ! -e /.dockerenv ]] && exit 0

set -xe

# Install git (the php image doesn't have it) which is required by composer
apt-get update -yqq
apt-get install apt-utils git zlib1g-dev wget -yqq
pecl install xdebug

# Install composer, the tool that we will use for testing
wget https://getcomposer.org/installer -q -O composer-setup.php
php composer-setup.php --install-dir=bin --filename=composer
rm -f composer-setup.php

# Here you can install any other extension that you need
docker-php-ext-configure zip --with-libdir=lib/x86_64-linux-gnu/ && \
docker-php-ext-install zip
docker-php-ext-enable xdebug
