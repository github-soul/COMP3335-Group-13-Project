FROM php:7.3-apache 
RUN docker-php-ext-install mysqli pdo_mysql
RUN apt-get update \
    && apt-get install -y libzip-dev \
    && apt-get install -y zlib1g-dev \
    && rm -rf /var/lib/apt/lists/* \
    && docker-php-ext-install zip
FROM php:7.4-cli
COPY ./local /usr/src/dst_folder
WORKDIR /usr/src/dst_folder
RUN docker-php-ext-install pdo pdo_mysql
