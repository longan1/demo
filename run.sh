#!/bin/bash

# Navigate to the backend directory
cd ./backend
docker-compose exec php-fpm bash -c "cd ./client && npm run dev"




