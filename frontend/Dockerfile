FROM node:alpine

WORKDIR /var/www/html

COPY package.json .
RUN npm install

RUN mkdir node_modules/.cache && chmod -R 777 node_modules/.cache

EXPOSE 3000

COPY . .

CMD ["npm", "run", "dev"]