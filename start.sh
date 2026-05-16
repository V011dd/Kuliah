#!/bin/bash
php artisan migrate --force

# Ganti port di nginx config sesuai PORT dari Railway
sed -i "s/listen 8000/listen $PORT/" /etc/nginx/sites-available/default

service php8.3-fpm start
nginx -g 'daemon off;'