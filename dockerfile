# Build stage
FROM composer:latest as build
COPY . /app/
RUN composer install --optimize-autoloader --no-dev

# Production stage
FROM php:8.3-rc-apache-bullseye as production

# ENV APP_ENV=production
# ENV APP_DEBUG=false

# Install system dependencies
RUN apt-get update && apt-get install -y \
    curl

RUN useradd -m sail


# Install Node.js using NodeSource repository
RUN curl -fsSL https://deb.nodesource.com/setup_20.x | bash -
RUN apt-get install -y nodejs

# Install Yarn
RUN curl -fsSL https://dl.yarnpkg.com/debian/pubkey.gpg | gpg --dearmor -o /usr/share/keyrings/yarn-archive-keyring.gpg
RUN echo "deb [signed-by=/usr/share/keyrings/yarn-archive-keyring.gpg] https://dl.yarnpkg.com/debian stable main" | tee /etc/apt/sources.list.d/yarn.list
RUN apt-get update && apt-get install -y yarn

RUN docker-php-ext-configure opcache --enable-opcache && \
    docker-php-ext-install pdo pdo_mysql
COPY docker/php/conf.d/opcache.ini /usr/local/etc/php/conf.d/opcache.ini

COPY --from=build /app /var/www/html
COPY docker/000-default.conf /etc/apache2/sites-available/000-default.conf
COPY .env.prod /var/www/html/.env

# Set the working directory
WORKDIR /var/www/html

# Install frontend dependencies and build assets using Yarn
RUN yarn install
RUN yarn add vite@latest --dev
RUN yarn run build

RUN php artisan config:cache && \
    php artisan route:cache && \
    php artisan cache:clear && \
    chmod 777 -R storage/ && \
    chown -R www-data:www-data /var/www/* && \
    a2enmod rewrite



# CMD ["yarn","run","dev"]
CMD ["apache2-foreground"]
