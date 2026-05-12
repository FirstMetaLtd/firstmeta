#!/bin/bash
# Configure Apache to listen on Railway's dynamic PORT at runtime
PORT="${PORT:-80}"

# Update Apache port configuration
sed -i "s/Listen 80/Listen ${PORT}/" /etc/apache2/ports.conf
sed -i "s/<VirtualHost \*:80>/<VirtualHost *:${PORT}>/" /etc/apache2/sites-available/000-default.conf

echo "Starting Apache on port ${PORT}..."
exec apache2-foreground
