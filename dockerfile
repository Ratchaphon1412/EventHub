FROM php:8.3-rc-zts-alpine
WORKDIR /var/www/html

RUN apk update 
RUN curl -s https://getcomposer.org/installer | php
RUN mv composer.phar /usr/local/bin/composer

COPY . .
RUN composer update

CMD ["php","artisan","serve","--host=0.0.0.0"]