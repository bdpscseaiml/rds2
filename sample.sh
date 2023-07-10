#!/bin/sh

INDEXFILE="${PWD}/index.php"

sudo cp "${INDEXFILE}" /var/www/html/index.php
sudo mkdir /var/www/html/blog && sudo tar -xf blog.tar.xz -C /var/www/html/blog