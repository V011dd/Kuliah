#!/bin/bash
echo "=== Starting Container ==="
echo "PORT: $PORT"

echo "=== Updating nginx port ==="
sed -i "s/listen 8000/listen $PORT/" /etc/nginx/sites-available/default

echo "=== Starting PHP-FPM ==="
service php8.3-fpm start

echo "=== Starting nginx ==="
nginx -g 'daemon off;'