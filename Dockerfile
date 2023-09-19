# Use a base image for PHP 8.2 and Apache
FROM php:8.2-apache

# Set environment variable to allow Composer to run as superuser
ENV COMPOSER_ALLOW_SUPERUSER=1

# Install git, unzip, zip, and other dependencies
RUN apt-get update -y && apt-get install -y git libpng-dev libjpeg-dev libfreetype6-dev unzip zip

# Disable host key checking (not recommended for production)
RUN mkdir -p ~/.ssh && ssh-keyscan -t rsa github.com >> ~/.ssh/known_hosts

# Enable Apache mod_rewrite
RUN a2enmod rewrite

# Install PHP extensions
RUN docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd pdo pdo_mysql

# Set working directory in the container
WORKDIR /var/www

# Clone the Laravel project from GitHub into /var/www/Blackhawk
RUN git clone https://github.com/chawker21/Blackhawk_Auto /var/www/Blackhawk_Auto

# Change working directory to Laravel project
WORKDIR /var/www/Blackhawk_Auto

# Copy Apache config
COPY ./000-default.conf /etc/apache2/sites-available/000-default.conf

# Install Composer globally
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Run Composer to install dependencies
RUN composer install --no-scripts --no-interaction

# Expose port 80
EXPOSE 80
