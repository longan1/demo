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
docker-compose up 





