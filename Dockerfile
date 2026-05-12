# ============================================================
# FirstMeta Website — Dockerfile
# PHP 8.2 + Apache, with PostgreSQL (pgsql) PDO extension
# Optimized for Railway deployment
# ============================================================
FROM php:8.2-apache

# Install system dependencies
RUN apt-get update && apt-get install -y \
    libpq-dev \
    libzip-dev \
    zip \
    unzip \
    && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-install \
    pdo \
    pdo_pgsql \
    pgsql \
    zip

# Enable required Apache modules
RUN a2enmod rewrite headers

# Configure Apache to allow .htaccess overrides
RUN echo '<Directory /var/www/html>\n\
    Options Indexes FollowSymLinks\n\
    AllowOverride All\n\
    Require all granted\n\
</Directory>' > /etc/apache2/conf-available/docker-php.conf \
    && a2enconf docker-php

# Railway uses dynamic PORT — configure Apache to listen on $PORT
# Default to 80 if PORT is not set (local development)
RUN sed -i 's/Listen 80/Listen ${PORT}/' /etc/apache2/ports.conf \
    && sed -i 's/<VirtualHost \*:80>/<VirtualHost *:${PORT}>/' /etc/apache2/sites-available/000-default.conf

# Set the default PORT for local development
ENV PORT=80

# Set working directory
WORKDIR /var/www/html

# Copy application files
COPY . .

# Fix permissions for uploaded files directories
RUN mkdir -p /var/www/html/img/posts \
             /var/www/html/img/ads \
             /var/www/html/resumes \
    && chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html \
    && chmod -R 775 /var/www/html/img \
    && chmod -R 775 /var/www/html/resumes

# Expose the dynamic port
EXPOSE ${PORT}

# Start Apache
CMD ["apache2-foreground"]
