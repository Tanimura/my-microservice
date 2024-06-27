FROM php:7.4-fpm

# Instalar extensões necessárias
RUN docker-php-ext-install pdo pdo_mysql

# Configurar o diretório de trabalho
WORKDIR /var/www/html

# Expor a porta do PHP-FPM
EXPOSE 9000