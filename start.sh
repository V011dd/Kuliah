#!/bin/bash
echo "=== Starting Container ==="
echo "PORT: $PORT"

echo "=== Starting PHP-FPM ==="
php-fpm8.3 -D

echo "=== Updating nginx port ==="
sed -i "s/listen 8000/listen $PORT/" /etc/nginx/sites-available/default

echo "=== Starting nginx ==="
nginx -g 'daemon off;'