#!/bin/sh

sudo apt update -y
WPFILE="${PWD}/wordpress.conf"
sudo apt remove apache2 -y
#sudo apt upgrade -y
sudo apt install nginx php php-fpm php-curl php-mysql php-gd php-mbstring php-xml php-imagick php-zip php-xmlrpc mariadb-client -y
sudo service nginx restart
sudo service php8.1-fpm restart
cd /var/www/html && sudo wget https://wordpress.org/latest.tar.gz && sudo tar -xf latest.tar.gz
sudo chmod -R 775 /var/www/html/wordpress/ && sudo chown -R $USER:www-data /var/www/html/wordpress/

echo "Copying nginx config file for  wordpress from ${WPFILE} to /etc/nginx/sites/available"
sudo cp $WPFILE /etc/nginx/sites-available/
echo "Creating a symlink for '/etc/nginx/sites-available/wordpress.conf' at '/etc/nginx/sites-enabled/'"
sudo ln -sf /etc/nginx/sites-available/wordpress.conf /etc/nginx/sites-enabled/
sudo rm -f /etc/nginx/sites-enabled/default
sudo service nginx restart
