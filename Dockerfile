# Made with <3 by mahdyar.me
FROM php:7
RUN apt-get update -y && apt-get install -y openssl zip unzip git
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN docker-php-ext-install pdo pdo_mysql
WORKDIR /app
COPY . /app
RUN composer install
COPY ./run.sh /tmp
RUN ["chmod", "+x", "/tmp/run.sh"]
ENTRYPOINT ["/tmp/run.sh"]    
EXPOSE 80
