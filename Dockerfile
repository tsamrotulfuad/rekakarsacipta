FROM php:8.5-fpm

# Install system dependencies required for PHP extensions on Debian
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    libzip-dev \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# Install native extensions needed for Laravel 13
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip

# Grab the latest global Composer binary
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Configure deployment working directory
WORKDIR /var/www

# Copy application directories into the container filesystem
COPY . /var/www

# Set user permissions for core runtime paths
RUN chown -R www-data:www-data /var/webapp/storage /var/webapp/bootstrap/cache \
    && chmod -R 775 /var/webapp/storage /var/webapp/bootstrap/cache

EXPOSE 9000
CMD ["php-fpm"]