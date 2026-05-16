#!/bin/bash
echo "=== Starting Container ==="
echo "PORT: $PORT"

echo "=== Running Migration ==="
php artisan migrate --force

echo "=== Starting PHP-FPM ==="
service php8.3-fpm start
echo "PHP-FPM status: $?"

echo "=== Updating nginx port ==="
sed -i "s/listen 8000/listen $PORT/" /etc/nginx/sites-available/default
cat /etc/nginx/sites-available/default

echo "=== Starting nginx ==="
nginx -t
nginx -g 'daemon off;'