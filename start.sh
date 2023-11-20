#!/bin/bash

# Wait for MySQL to be available
until php -r "new PDO('mysql:host=db;dbname=chawker21', 'root', 'Blackhawk213!');" > /dev/null 2>&1; do
    echo "Waiting for MySQL..."
    sleep 1
done
# Suppress Apache ServerName warning
echo "ServerName localhost" >> /etc/apache2/apache2.conf


# Your existing commands here
php artisan config:clear
php artisan cache:clear
php artisan key:generate

# Start Apache (in the foreground)
exec apache2-foreground
