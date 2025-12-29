FROM php:8.2-apache

COPY salada.php /var/www


RUN sed -ri -e 's!/var/www/!/var/www/html!g' /etc/apache2/apache2.conf




