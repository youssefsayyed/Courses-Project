FROM php:8.2-apache
RUN apt-get update && apt-get install -y git unzip libpq-dev libzip-dev \
 && docker-php-ext-install pdo_pgsql pdo_mysql zip \
 && a2enmod rewrite
ENV APACHE_DOCUMENT_ROOT=/var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' \
  /etc/apache2/sites-available/*.conf /etc/apache2/apache2.conf
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer
WORKDIR /var/www/html
COPY . .
RUN composer install --no-dev --optimize-autoloader \
 && chown -R www-data:www-data storage bootstrap/cache
EXPOSE 80
CMD ["sh", "-c", "php artisan migrate --force && apache2-foreground"]