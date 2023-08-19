#!/bin/bash

# Navigate to the backend directory
cd ./backend
# Check if the .env file exists
if [ ! -f .env ]; then
    echo "Not found .env in the backend directory. Creating .env from .env.example..."
    cp .env.example .env
fi
# Run docker-compose up for the backend
docker-compose up -d
docker-compose exec php-fpm composer update
docker-compose exec php-fpm php artisan key:generate
docker-compose exec php-fpm php artisan config:cache
# Navigate back to the main directory
cd ..

# Navigate to the frontend directory
cd ./frontend
# Check if the .env file exists
if [ ! -f .env ]; then
    echo "Not found .env in the frontend directory. Creating .env from .env.example..."
    cp .env.example .env  
fi

# Run docker-compose up for the frontend
docker-compose up -d
sleep 1


echo "Set up suscessfully !"


