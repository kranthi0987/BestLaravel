FROM library/ubuntu:16.04
RUN apt-get update

#RUN apt-get update && apt-get install -y libmcrypt-dev \
#    mysql-client libmagickwand-dev --no-install-recommends \
#    && pecl install imagick \
#    && docker-php-ext-enable imagick \
#    && docker-php-ext-install mcrypt php-dso_mysql
RUN  apt-get install -yq --fix-missing apt-utils
RUN  apt-get install -yq --fix-missing language-pack-en-base
ENV LC_ALL=en_US.UTF-8
RUN  apt-get install -yq --fix-missing openssl
RUN apt-get install -yq --fix-missing zip unzip
RUN  apt-get install -yq --fix-missing software-properties-common curl
RUN add-apt-repository ppa:ondrej/php
RUN sed -i'' 's/archive\.ubuntu\.com/us\.archive\.ubuntu\.com/' /etc/apt/sources.list
RUN apt-get update
RUN apt-get upgrade -yq
RUN apt-get update && apt-get install -yq --fix-missing libgd-tools
# Install PHP
RUN apt-get update && apt-get install -yq --fix-missing \
    php7.2 \
    php7.2-bcmath \
    php7.2-bz2  \
    php7.2-cli \
    php7.2-common \
    php7.2-curl \
    php7.2-fpm \
    php7.2-gd \
    php7.2-gmp \
    php7.2-imap \
    php7.2-interbase \
    php7.2-intl \
    php7.2-json \
    php7.2-ldap \
    php7.2-mbstring \
    php7.2-mysql \
    php7.2-opcache \
    php7.2-pgsql \
    php7.2-phpdbg \
    php7.2-pspell \
    php7.2-readline \
    php7.2-recode \
    php7.2-snmp \
    php7.2-soap \
    php7.2-sqlite3 \
    php7.2-sybase \
    php7.2-tidy \
    php7.2-xml \
    php7.2-xmlrpc \
    php7.2-zip \
    php7.2-xsl \
    php-geoip \
    php-mongodb\
    php-redis \
    php-ssh2 \
    php-uuid \
    php-zmq \
    php-radius \
    php-http \
    php-uploadprogress \
    php-yaml \
    php-memcached \
    php-memcache \
    php-tideways \
    php-mailparse \
    php-raphf \
    php-stomp \
    php-ds \
    php-sass \
    php-lua \
   # php-geos \
    php-xdebug php-imagick imagemagick nginx

RUN update-alternatives --set php /usr/bin/php7.2
RUN update-alternatives --set phar /usr/bin/phar7.2
RUN update-alternatives --set phar.phar /usr/bin/phar.phar7.2
# RUN update-alternatives --set phpize /usr/bin/phpize7.2
# RUN update-alternatives --set php-config /usr/bin/php-config7.2
RUN apt-get update && apt-get install -yq --fix-missing mc lynx mysql-client bzip2 make g++

# Install Redis, Memcached, Beanstalk
RUN apt-get update && apt-get install -yq --fix-missing redis-server memcached beanstalkd

ENV COMPOSER_HOME /usr/local/share/composer
ENV COMPOSER_ALLOW_SUPERUSER 1
ENV PATH "$COMPOSER_HOME:$COMPOSER_HOME/vendor/bin:$PATH"
RUN \
  mkdir -pv $COMPOSER_HOME && chmod -R g+w $COMPOSER_HOME \
  && curl -o /tmp/composer-setup.php https://getcomposer.org/installer \
  && curl -o /tmp/composer-setup.sig https://composer.github.io/installer.sig \
  && php -r "if (hash('SHA384', file_get_contents('/tmp/composer-setup.php')) \
    !== trim(file_get_contents('/tmp/composer-setup.sig'))) { unlink('/tmp/composer-setup.php'); \
    echo 'Invalid installer' . PHP_EOL; exit(1); }" \
  && php /tmp/composer-setup.php --filename=composer --install-dir=$COMPOSER_HOME


RUN apt-get install -y apache2
RUN a2enmod rewrite
RUN apt-get install -y git
#RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN cd /var/www/ && git clone https://github.com/kranthi0987/BestLaravel.git
RUN cd /var/www/BestLaravel/&& \
    composer install --no-interaction 
#RUN composer
#RUN ls
#RUN composer install --no-interaction 
RUN chown -R www-data:www-data \
        /var/www/BestLaravel/storage \
        /var/www/BestLaravel/bootstrap/cache

#RUN cd /var/www/BestLaravel/ && php artisan optimize
CMD cd /var/www/BestLaravel/ php artisan serve --host=0.0.0.0 --port=8000
EXPOSE 8000
EXPOSE 80
EXPOSE 443
