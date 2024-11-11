FROM php:7.2-apache
COPY src/ /var/www/html/
COPY ports.conf /etc/apache2/ports.conf
COPY custom-domain.conf /etc/apache2/site-enabled/ports.conf
EXPOSE 8081
