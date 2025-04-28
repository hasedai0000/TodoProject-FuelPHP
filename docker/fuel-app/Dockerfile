FROM php:7.2-alpine

# Install PDO MySQL driver and other required extensions
RUN docker-php-ext-install pdo pdo_mysql

COPY --from=composer:2.2 /usr/bin/composer /usr/bin/composer
