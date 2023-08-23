FROM php:8.0.24-zts-alpine3.16
WORKDIR /var/www/html

RUN apk update 
RUN curl -s https://getcomposer.org/installer | php
RUN mv composer.phar /usr/local/bin/composer

COPY . .
RUN composer install

CMD ["php","artisan","serve","--host=0.0.0.0"]