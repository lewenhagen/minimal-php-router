FROM debian:buster-slim

RUN apt-get update && \
    apt-get -y install apache2 \
    php7.3 \
    libapache2-mod-php7.3

RUN a2enmod php7.3
RUN a2enmod rewrite
RUN sed -i '/<Directory \/var\/www\/>/,/<\/Directory>/ s/AllowOverride None/AllowOverride All/' /etc/apache2/apache2.conf


CMD apachectl -D FOREGROUND
