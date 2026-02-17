FROM php:8.2-apache

# Включаем mod_rewrite (нужно для MVC)
RUN a2enmod rewrite

# Устанавливаем расширения PHP
RUN docker-php-ext-install pdo pdo_mysql

# Меняем DocumentRoot на /var/www/html/public
ENV APACHE_DOCUMENT_ROOT=/var/www/html/public

RUN sed -ri 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' \
    /etc/apache2/sites-available/*.conf \
    /etc/apache2/apache2.conf \
    /etc/apache2/conf-available/*.conf

WORKDIR /var/www/html
