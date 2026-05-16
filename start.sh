#!/bin/bash
php artisan migrate --force
service php8.3-fpm start
nginx -g 'daemon off;'