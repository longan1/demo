# Use the official Node.js image
FROM node:16

# Set working directory
WORKDIR /usr/src/app

# Copy Nuxt.js frontend files
COPY . .

# Install dependencies
RUN npm install



# Expose port 3000 and start Nuxt.js server
EXPOSE 3000
CMD [ "npm", "run", "dev" ]