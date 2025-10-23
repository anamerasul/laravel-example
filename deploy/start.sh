#!/bin/sh
set -e

# Ensure writable storage and cache directories
mkdir -p storage/logs bootstrap/cache
chown -R www-data:www-data storage bootstrap/cache || true
chmod -R ug+rwX storage bootstrap/cache || true

# Build caches for performance
php artisan package:discover --ansi || true
php artisan config:cache
php artisan route:cache || true
php artisan view:cache
php artisan migrate --force || true

# Template nginx config with PORT only (avoid expanding Nginx $vars)
mkdir -p /etc/nginx/conf.d
envsubst '${PORT}' < /etc/nginx/templates/laravel.conf > /etc/nginx/conf.d/default.conf

# Start php-fpm and nginx
php-fpm -D
nginx -g 'daemon off;'