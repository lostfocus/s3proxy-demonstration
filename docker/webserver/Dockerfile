FROM php:8.0-apache-bullseye

RUN apt-get update --fix-missing

# Install Basic-Packages.
RUN apt-get -y install sudo &&\
    apt-get -y install curl &&\
    apt-get -y install git &&\
    apt-get -y install zip unzip &&\
    apt-get -y install vim && \
    apt-get -y install libxml2-dev && \
    apt-get -y install libicu-dev && \
    apt-get -y install libcurl4-openssl-dev

RUN docker-php-ext-configure intl

RUN docker-php-ext-install pdo pdo_mysql mysqli intl bcmath curl

RUN curl -sS https://getcomposer.org/installer | php && chmod +x composer.phar && mv composer.phar /usr/local/bin/composer

RUN a2enmod rewrite

RUN echo "ServerName example" | sudo tee /etc/apache2/conf-available/servername.conf && a2enconf servername

COPY ./000-default.conf /etc/apache2/sites-enabled/000-default.conf

ARG PATH_PHP_INI="$PHP_INI_DIR/php.ini"
RUN set -eux; \
    echo 'memory_limit = -1' >> ${PATH_PHP_INI}; \
    echo 'short_open_tag = Off' >> ${PATH_PHP_INI}; \
    echo 'post_max_size = 50M' >> ${PATH_PHP_INI}; \
    echo 'upload_max_filesize = 50M' >> ${PATH_PHP_INI}; \
    echo 'max_execution_time = 60' >> ${PATH_PHP_INI};