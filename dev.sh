#!/bin/bash

# Navigate to the backend directory
cd ./backend
# Check if the .env file exists
if [ ! -f .env ]; then
    echo "Not found .env in the backend directory. Exiting..."
    exit 1
fi
# Run docker-compose up for the backend
docker-compose up -d

# Navigate back to the main directory
cd ..

# Navigate to the frontend directory
cd ./frontend
# Check if the .env file exists
if [ ! -f .env ]; then
    echo "Not found .env in the frontend directory. Exiting..."
    exit 1
fi

# Run docker-compose up for the frontend
docker-compose up -d