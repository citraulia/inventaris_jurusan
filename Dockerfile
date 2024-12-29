FROM php:8.1-apache

# Instalasi ekstensi PHP yang dibutuhkan
RUN apt-get update && apt-get install -y \
    libicu-dev \
    libpng-dev \
    libzip-dev \
    libpq-dev \
    git \
    unzip \
    && docker-php-ext-install mysqli pdo pdo_pgsql pgsql intl gd zip

# Instal Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Atur working directory di dalam container
WORKDIR /var/www/html

# Salin semua file project ke dalam container
COPY . .

# Atur kepemilikan file agar kompatibel dengan Apache
RUN chown -R www-data:www-data /var/www/html

# Instal dependensi menggunakan Composer
RUN composer install

# Salin file konfigurasi Apache
COPY 000-default.conf /etc/apache2/sites-available/000-default.conf

# Aktifkan konfigurasi Apache dan mod_rewrite
RUN a2ensite 000-default.conf
RUN a2enmod rewrite

# Expose port untuk Apache
EXPOSE 80

# Jalankan Apache
CMD ["apache2-foreground"]
