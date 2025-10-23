# ---- Build vendor dependencies ----
FROM composer:2 AS vendor
WORKDIR /app
COPY composer.json composer.lock /app/
RUN composer install --no-dev --prefer-dist --no-progress --no-interaction --optimize-autoloader

# ---- Production image: php-fpm + nginx ----
FROM php:8.2-fpm
WORKDIR /app

# Install system packages, nginx, and PHP extensions needed for Laravel + Neon
RUN apt-get update && apt-get install -y --no-install-recommends \
    nginx libpq-dev git unzip \
 && rm -rf /var/lib/apt/lists/* \
 && docker-php-ext-install pdo_pgsql pgsql

# Copy application code and vendor
COPY . /app
COPY --from=vendor /app/vendor /app/vendor

# Configure nginx
# We will template nginx config at runtime to use Render's PORT env
RUN rm -f /etc/nginx/sites-enabled/default && mkdir -p /etc/nginx/conf.d

# Ensure writable directories for Laravel
RUN chmod -R 0777 storage bootstrap/cache

# Expose the PORT for Render; default to 8080 for local
ENV PORT=8080

# Start script runs caches, templates nginx to PORT, then starts php-fpm + nginx
COPY deploy/start.sh /usr/local/bin/start.sh
RUN chmod +x /usr/local/bin/start.sh

# Nginx config template (PORT will be substituted by start script)
COPY deploy/nginx.conf /etc/nginx/templates/laravel.conf

CMD ["/usr/local/bin/start.sh"]