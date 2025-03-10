# Usar a imagem oficial do PHP com Apache
FROM php:8.2-apache

# Instalar dependências
RUN apt-get update && apt-get install -y \
    unzip zip git curl libpng-dev libjpeg-dev libfreetype6-dev \
    && docker-php-ext-install pdo pdo_mysql gd

# Instalar Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Definir diretório de trabalho
WORKDIR /var/www/html

# Copiar os arquivos do projeto
COPY . .

# Instalar dependências do Laravel
RUN composer install

# Permissão para storage e cache do Laravel
RUN chmod -R 777 storage bootstrap/cache

# Expor porta 8000
EXPOSE 8000

CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]