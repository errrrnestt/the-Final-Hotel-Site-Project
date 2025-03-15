# Basic PHP Apache image
FROM php:8.2-apache

# Extensions setting
# Тут контейнер устанавливает нужные программы при запуске

RUN docker-php-ext-install mysqli pdo pdo_mysql

# Копирует корневую папку в /var/www/html/  (Вообще-то докер игнорирует это, потому что у нас есть docker-compose.yml, Но ему все равно нужен Dockerfile xD)
COPY ./templates /var/www/html/

# Exposing port :80
EXPOSE 80