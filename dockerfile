FROM php:8.1.0alpha3-apache
USER root
WORKDIR /var/www/html
COPY . .
RUN cd /var/www
RUN chmod -R 777 /var/www/
