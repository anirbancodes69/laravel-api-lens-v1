FROM php:8.2-cli

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    zip \
    curl \
    libzip-dev \
    && docker-php-ext-install pdo pdo_mysql

# Install Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /workspace