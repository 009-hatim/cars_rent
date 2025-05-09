FROM node:18 AS node_modules
WORKDIR /app
COPY package*.json ./
RUN npm install

FROM php:8.2-fpm

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git curl libpng-dev libonig-dev libxml2-dev zip unzip libzip-dev mariadb-client \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www

# Copy source code
COPY . .

# Copy node modules and build assets
COPY --from=node_modules /app/node_modules ./node_modules
RUN npm run build

# Install PHP dependencies
RUN composer install --no-dev --optimize-autoloader

# Fix permissions
RUN chown -R www-data:www-data /var/www && chmod -R 755 /var/www

EXPOSE 10000

CMD php artisan config:cache && php artisan migrate --force && php artisan serve --host=0.0.0.0 --port=10000
