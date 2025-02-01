FROM php:8.4-cli

WORKDIR /var/www

RUN apt update && apt install -y unzip curl libpq-dev libonig-dev libzip-dev libmariadb-dev && \
    docker-php-ext-install pdo pdo_mysql


COPY . .

CMD ["php", "artisan", "serve", "--host=127.0.0.1", "--port=8000"]
