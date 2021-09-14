FROM node:lts-alpine
WORKDIR /app
COPY package.json ./
RUN npm install
RUN npm install -g http-server
EXPOSE 4202
CMD ["npm", "run", "serve"]


RUN \
    docker-php-ext-configure pdo_mysql --with-pdo-mysql=mysqlnd \
    && docker-php-ext-configure mysqli --with-mysqli=mysqlnd \
    && docker-php-ext-install pdo_mysql \
    ...

# FROM node:10
# WORKDIR /vue-unas-db
# COPY ./package*.json ./
# RUN npm install
# RUN npm install -g http-server
# COPY . .
# RUN npm run build
# EXPOSE 8081
# CMD ["npm", "test:dev"]


FROM php:7.4-apache
RUN docker-php-ext-install mysqli