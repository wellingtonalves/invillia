#!/bin/bash

composer install &&
cp .env.example .env &&
php artisan key:generate &&
php artisan migrate &&
php artisan passport:install &&
php artisan db:seed &&

echo "########################################################" &&
echo " Usuario: invillia@invillia.com.br - Senha: password    " &&
echo "########################################################" &&

php artisan serve --host=0.0.0.0 --port=8000
