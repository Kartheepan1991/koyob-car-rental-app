FROM php:8.1-apache

RUN apt-get update && apt-get install -y \
    libzip-dev \
    unzip \
    && docker-php-ext-install mysqli \
    && a2enmod rewrite

COPY public/ /var/www/html/
COPY app/ /var/www/app/

WORKDIR /var/www/html

EXPOSE 80
CMD ["apache2-foreground"]
