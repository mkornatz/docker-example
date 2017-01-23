# Example taken from https://github.com/lysender/docker-php7-apache

FROM ubuntu:xenial

RUN apt-get update && apt-get install -y \
  git \
  curl \
  apache2 \
  libapache2-mod-php \
  php \
  php-mysqlnd \
  php-dev \
  php-mbstring \
  php-mcrypt \
  php-curl \
  php-imagick \
  && apt-get clean && rm -rf /var/lib/apt/lists/*

RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf

RUN a2enmod rewrite
RUN a2enmod headers
RUN a2enmod deflate
RUN a2enmod env
RUN a2enmod expires

ENV APACHE_RUN_USER www-data
ENV APACHE_RUN_GROUP www-data
ENV APACHE_LOG_DIR /var/log/apache2
ENV APACHE_LOCK_DIR /var/run/apache.lock
ENV APACHE_PID_FILE /var/run/apache.pid

VOLUME ["/var/www/html", "/var/log/apache2"]

ADD ./start.sh /start.sh
RUN chmod 755 /*.sh

ADD config/vhost.conf /etc/apache2/sites-available/000-default.conf
ADD config/php.ini /etc/php/7.0/apache2/php.ini


CMD ["/bin/bash", "/start.sh"]

EXPOSE 80
