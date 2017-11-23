FROM php:7.0-apache
COPY src/ /var/www/html/
COPY vendor /var/www/html/vendor