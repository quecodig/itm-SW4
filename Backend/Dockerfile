FROM php:8.3-fpm-alpine

RUN echo "error_log = /dev/stderr" >> /usr/local/etc/php/conf.d/docker-php-errors.ini \
# Instala dependencias mínimas y extensiones PHP
&& apk add --no-cache nginx \
    && docker-php-ext-install pdo pdo_mysql

# Instala Composer
COPY --from=composer:2.7 /usr/bin/composer /usr/bin/composer

# Copia configuración de Nginx
COPY nginx.conf /etc/nginx/nginx.conf

# Copia el código fuente
COPY . /var/www/html/

WORKDIR /var/www/html
# Instala dependencias de Composer
RUN composer install --no-dev --optimize-autoloader \
# Configura permisos
&& chown -R www-data:www-data /var/www/html

EXPOSE 80

CMD ["sh", "-c", "php-fpm -D && nginx -g 'daemon off;'"]