#!/bin/sh
set -e

# Build caches for performance
php artisan package:discover --ansi || true
php artisan config:cache
php artisan route:cache || true
php artisan view:cache

# Template nginx config with PORT
mkdir -p /etc/nginx/conf.d
envsubst < /etc/nginx/templates/laravel.conf > /etc/nginx/conf.d/default.conf

# Start php-fpm and nginx
php-fpm -D
nginx -g 'daemon off;'