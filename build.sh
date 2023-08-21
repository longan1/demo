#!/bin/bash

# Navigate to the backend directory
cd ./backend
# Check if the .env file exists
if [ ! -f .env ]; then
    echo "Not found .env in the backend directory. Creating .env from .env.example..."
    cp .env.example .env
fi
cd ./client

if [ ! -f .env ]; then
    echo "Not found .env in the client directory. Creating .env from .env.example..."
    cp .env.example .env
fi
cd ../
# Run docker-compose up for the backend
docker-compose up -d php-fpm mysql

echo "hihi"

docker-compose exec php-fpm composer update
docker-compose exec php-fpm php artisan key:generate
docker-compose exec php-fpm php artisan config:cache
docker-compose exec php-fpm php artisan migrate
docker-compose exec php-fpm php artisan passport:install --force
docker-compose exec php-fpm php artisan db:seed --class=DumpData
docker-compose exec php-fpm bash -c "cd ./client && npm install"

echo "build done"

# start nginx
docker-compose up -d nginx

# start frontend
docker-compose exec php-fpm bash -c "cd ./client && npm run dev"
