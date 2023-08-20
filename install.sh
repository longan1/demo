#!/bin/bash

# Navigate to the backend directory
cd ./backend
# Check if the .env file exists
docker-compose exec php-fpm composer update
docker-compose exec php-fpm php artisan key:generate
docker-compose exec php-fpm php artisan config:cache
docker-compose exec php-fpm bash -c "cd ./client && npm install"


# Navigate back to the main directory





