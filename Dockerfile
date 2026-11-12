# 1) Imagen base: PHP 8.3 que ya trae el servidor web Apache
FROM php:8.3-apache

# 2) Instalar las extensiones que PHP necesita para hablar con MySQL
RUN docker-php-ext-install pdo pdo_mysql

# 3) Copiar nuestro código (carpeta src) a la carpeta pública de Apache
COPY src/ /var/www/html/

# 4) Documentar que la app escucha en el puerto 80 (solo informativo)
EXPOSE 80
