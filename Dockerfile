# Base Image: Use an optimized PHP 8.3 image
FROM serversideup/php:beta-8.3-fpm-nginx

WORKDIR /var/www/html/

ENV AUTORUN_ENABLED=true
ENV DB_CONNECTION=sqlite
ENV SESSION_DRIVER=cookie

COPY . .
COPY .env.example .env

RUN composer install --no-dev --no-interaction --optimize-autoloader
RUN php artisan key:generate
RUN curl -fsSL https://bun.sh/install | bash
RUN ~/.bun/bin/bun install
RUN  ~/.bun/bin/bun vite build
