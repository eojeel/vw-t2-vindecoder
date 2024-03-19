# Base Image: Use an optimized PHP 8.3 image
FROM serversideup/php:beta-8.3-fpm-nginx

WORKDIR /var/www/html/

ENV AUTORUN_ENABLED=true

COPY . .

RUN composer install --no-dev --no-interaction --optimize-autoloader
RUN curl -fsSL https://bun.sh/install | bash && ~/.bun/bin/bun install && ~/.bun/bin/bun vite build
